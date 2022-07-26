<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model {
  protected $table = 'chat';
  // データの挿入を許可する
  protected $fillable = ['name', 'message'];
}