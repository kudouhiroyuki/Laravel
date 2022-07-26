<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MstDepartmentsController;
use App\Http\Controllers\MstEmployeesController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
  return $request->user();
});

// Route::resource('/mstDepartments', MstDepartmentsController::class);
// Route::resource('/mstEmployees', MstEmployeesController::class);

