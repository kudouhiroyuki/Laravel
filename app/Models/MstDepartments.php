<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class MstDepartments extends Model {
  protected $table = 'mst_departments';
  // データの挿入を許可する
  protected $fillable = ['department_id', 'department_name'];
}