<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MstDepartmentsSeeder extends Seeder {
	public function run() {
		DB::table('mst_departments')->insert([
			['department_id' => 'A0001', 'department_name' => 'アプリケーション'],
			['department_id' => 'B0001', 'department_name' => 'デザイン'],
		]);
	}
}
