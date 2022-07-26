<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class BlogCategorys extends Model {
  protected $table = 'blog_categorys';
  // データの挿入を許可する
  protected $fillable = ['category_id'];
}