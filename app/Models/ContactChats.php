<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactChats extends Model {
  protected $table = 'contactChats';
  // データの挿入を許可する
  protected $fillable = [
    'id',
    'username',
    'name',
    'message',
    
  ];
}