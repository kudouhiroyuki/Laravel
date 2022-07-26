<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMstDepartmentsTable extends Migration {
	public function up() {
		Schema::create('mst_departments', function (Blueprint $table) {
			$table->char('department_id', 5)->primary();
			$table->string('department_name', 255)->unique();
			$table->timestamp('updated_at')->useCurrent()->nullable();
      $table->timestamp('created_at')->useCurrent()->nullable();
		});
	}
	public function down() {
		Schema::dropIfExists('mst_departments');
	}
}