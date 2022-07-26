<?php

// logger($request->input('limit'));
// logger($request->limit);
// logger($request->query('limit'));
// logger($request->only(['limit', 'offset']));
// logger($request->all());
// $items = MstEmployees::where('id', '=', 3);
// logger($items->toSql(), $items->getBindings());
// return response($items);
// curl -X GET http://localhost:8000/api/mstEmployees
// curl -X GET http://localhost:8000/api/mstEmployees?limit=1 -v

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\BoardCreateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\MstEmployees;
use App\Models\MstDepartments;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;


class MstEmployeesController extends Controller {
  /**
  * GET	mstEmployees 一覧
  * @param {Number} id
  * @param {String} department_id
  * @param {Number} limit
  */
  public function index(Request $request) {
    $id = $request->input('id');
    $department_id = $request->input('department_id');
    $full_name = $request->input('full_name');
    $page_number = $request->input('page_number') ? $request->input('page_number') : 1;
    $limit = $request->input('limit') ? $request->input('limit') : 5;
    $offset = ($page_number * $limit) - $limit;
    $departments = MstDepartments::select('department_id')->distinct()->get();
    $employees = MstEmployees::query()
      ->select('id', 'department_id', DB::raw('CONCAT(last_name, first_name) as full_name'))
      ->when(!empty($id), function($employees) use ($id) {
        return $employees->where('id', $id);
      })
      ->when(!empty($department_id), function($employees) use ($department_id) {
        return $employees->where('department_id', $department_id);
      })
      ->when(!empty($full_name), function($employees) use ($full_name) {
        return $employees->where(DB::raw('CONCAT(last_name, first_name)'), 'like', '%'.$full_name.'%');
      });
    return view('mstEmployees.index', [
      'total_record' => $employees->count(),
      'total_page' => ceil($employees->count() / $limit),
      'offset' => $offset,
      'departments' => $departments,
      'employees' => $employees->offset($offset)->limit($limit)->orderByRaw('CAST(id AS SIGNED) ASC')->get(),
    ]);
  }
  
  /**
  * GET	mstEmployees/{mstEmployee} 詳細
  */
  public function show($id) {
    $mstEmployees = MstEmployees::query()
      ->select('id', 'mst_employees.department_id', 'img_path', 'department_name', 'last_name', 'first_name', 'old')
      ->join('mst_departments', 'mst_employees.department_id', '=', 'mst_departments.department_id')
      ->find($id);
    return view('mstEmployees.show', [
      'mstEmployees' => $mstEmployees,
    ]);
  }

  /**
  * GET	mstEmployees/create 新規追加
  */
  public function create() {
    $departments = MstDepartments::select('department_id')->distinct()->get();
    return view('mstEmployees.create', [
      'departments' => $departments
    ]);
  }

  /**
  * POST mstEmployees 新規追加
  */
  public function store(BoardCreateRequest $request) {
    $filename = request()->file('img_path')->getClientOriginalName();
    $path = request('img_path')->storeAs('public', $filename);
    $result = MstEmployees::create([
      'department_id' => $request->input('department_id'),
      'last_name' => self::escapeLike($request->input('last_name')),
      'first_name' => self::escapeLike($request->input('first_name')),
      'old' => $request->input('old'),
      'img_path' => $path,
    ]);
    Mail::send(new SendMail([
      'email' => 'h.kudou@ebacorp.jp',
      'id' => $result['id'],
      'department_id' => $result['department_id'],
      'last_name' => $result['last_name'],
      'first_name' => $result['first_name'],
      'old' => $result['old'],
      'filename' => $filename,
    ]));

    return redirect('mstEmployees');
  }

  /**
  * GET	mstEmployees/{mstEmployee}/edit 編集
  */
  public function edit($id) {
    $departments = MstDepartments::select('department_id')->distinct()->get();
    $employees = MstEmployees::findOrFail($id);
    return view('mstEmployees.edit', compact('departments', 'employees'));
  }
  /**
  * PUT	mstEmployees/{mstEmployee} 編集
  */
  public function update(Request $request, $id) {
    $filename = request()->file('img_path')->getClientOriginalName();
    $path = request('img_path')->storeAs('public', $filename);
    $update = [
      'department_id' => $request->department_id,
      'last_name' => $request->last_name,
      'first_name' => $request->first_name,
      'old' => $request->old,
      'img_path' => $path,
    ];
    MstEmployees::where('id', $id)->update($update);
    return redirect('mstEmployees');
  }

  /**
  * DELETE mstEmployees/{mstEmployee} 削除
  */
  public function destroy($id) {
    MstEmployees::find($id)->delete();
    return redirect('mstEmployees');
  }

  // 半角スペース削除
  public static function escapeLike($str) {
    return str_replace(array(" "), "", $str);
  }
}