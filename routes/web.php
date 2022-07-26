<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\IndexController;
use App\Http\Controllers\Site\BlogsController;
use App\Http\Controllers\Site\ContactMailsController;
use App\Http\Controllers\Site\ContactChatsController;

// use App\Http\Controllers\MstDepartmentsController;
// use App\Http\Controllers\MstEmployeesController;
// use App\Http\Controllers\ChatController;

Route::resource('/', IndexController::class)->only(['index']);

Auth::routes(['verify' => true]);

Route::resource('blogs', BlogsController::class)->only(['index', 'show']);
Route::resource('contactMails', ContactMailsController::class)->only(['index', 'store']);
Route::resource('contactChats', ContactChatsController::class)->only(['index', 'store']);

// Route::resource('mstDepartments', MstDepartmentsController::class)->only([
//   'index', 'show'
// ]);
  
// Route::resource('mstEmployees', MstEmployeesController::class);
  
// Route::resource('chat', ChatController::class)->only([
//   'index', 'store'
// ]);

