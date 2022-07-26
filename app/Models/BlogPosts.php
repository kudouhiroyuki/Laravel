<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class BlogPosts extends Model {
  protected $table = 'blog_posts';
  // データの挿入を許可する
  protected $fillable = ['title', 'body', 'category_id', 'main_image'];
}