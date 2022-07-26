<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactMailsTable extends Migration {
  public function up() {
    Schema::create('contactMails', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->string('name');
      $table->string('email');
      $table->string('tel')->nullable();
      $table->string('gender');
      $table->string('contents');
      $table->timestamp('updated_at')->useCurrent()->nullable();
      $table->timestamp('created_at')->useCurrent()->nullable();
    });
  }
  public function down() {
    Schema::dropIfExists('contactMails');
  }
}
