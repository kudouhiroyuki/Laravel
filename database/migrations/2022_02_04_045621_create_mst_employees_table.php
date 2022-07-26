<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMstEmployeesTable extends Migration {
	public function up() {
		Schema::create('mst_employees', function (Blueprint $table) {
			$table->increments('id');
			$table->char('department_id', 5);
			$table->string('last_name', 10);
			$table->string('first_name', 10);
			$table->integer('old');
			$table->string('img_path', 255);
			$table->timestamp('updated_at')->useCurrent()->nullable();
			$table->timestamp('created_at')->useCurrent()->nullable();
			$table->foreign('department_id')->references('department_id')->on('mst_departments');
		});
	}
	public function down() {
		Schema::dropIfExists('mst_employees');
	}
}
