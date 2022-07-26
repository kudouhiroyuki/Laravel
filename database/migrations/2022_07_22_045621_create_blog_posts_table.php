<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogPostsTable extends Migration {
	public function up() {
		Schema::create('blog_posts', function (Blueprint $table) {
			$table->increments('id');
			$table->string('title', 50);
			$table->string('body', 255);
			$table->string('category_id', 5);
			$table->string('main_image', 50);
			$table->timestamp('updated_at')->useCurrent()->nullable();
      $table->timestamp('created_at')->useCurrent()->nullable();
			$table->foreign('category_id')->references('category_id')->on('blog_categorys');
		});
	}
	public function down() {
		Schema::dropIfExists('blog_posts');
	}
}