<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactChatsTable extends Migration {
  public function up() {
    Schema::create('contactChats', function (Blueprint $table) {
      $table->increments('id');
      $table->string('username', 190)->unique();
      $table->string('name');
      $table->text('message');
      $table->timestamp('updated_at')->useCurrent()->nullable();
      $table->timestamp('created_at')->useCurrent()->nullable();
      $table->foreign('username')->references('username')->on('admin_users');
    });
  }
  public function down() {
    Schema::dropIfExists('contactChats');
  }
}
