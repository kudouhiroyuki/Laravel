<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogCategorysTable extends Migration {
  public function up() {
    Schema::create('blog_categorys', function (Blueprint $table) {
      $table->char('category_id', 5)->primary();
			$table->string('category_name', 255);
			$table->timestamp('updated_at')->useCurrent()->nullable();
      $table->timestamp('created_at')->useCurrent()->nullable();
    });
  }
  public function down() {
    Schema::dropIfExists('blog_categorys');
  }
}