<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\BlogPosts;

class BlogsController extends Controller {
  // public function __construct() {
  //   $this->middleware('auth');
  // }
  public function index() {
    $blog_posts = BlogPosts::get();
    return view('site.blogs.index', [
      'blog_posts' => $blog_posts,
    ]);
  }
  public function show($id) {
    $blog_posts = BlogPosts::find($id);
    return view('site.blogs.show', [
      'blog_posts' => $blog_posts,
    ]);
  }
}
