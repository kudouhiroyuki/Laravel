<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class ContactMails extends Model {
  protected $table = 'contactMails';
  // データの挿入を許可する
  protected $fillable = [
  	'name',
  	'email',
  	'tel',
  	'gender',
  	'contents'
	];
}