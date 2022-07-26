<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class MstEmployees extends Model {
  protected $table = 'mst_employees';
  // データの挿入を許可する
  protected $fillable = ['id', 'department_id', 'last_name', 'first_name', 'old', 'img_path'];
}