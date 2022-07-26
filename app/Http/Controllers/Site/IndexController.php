<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\BlogCategorys;
use App\Models\BlogPosts;

class IndexController extends Controller {
  public function index() {
    $blog_posts = BlogPosts::join('blog_categorys', 'blog_posts.category_id', '=', 'blog_categorys.category_id')->get();
    return view('site.index', [
      'blog_posts' => $blog_posts,
    ]);
  }
}
