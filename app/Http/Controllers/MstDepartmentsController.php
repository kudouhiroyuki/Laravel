<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\MstDepartments;

class MstDepartmentsController extends Controller {
	public function index() {
		$departments = MstDepartments::get();
		return view('mstDepartments.index', [
			'departments' => $departments,
		]);
	}
}