<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MstEmployeesSeeder extends Seeder {
	public function run() {	
		DB::table('mst_employees')->insert([
			[
				'department_id' => 'A0001',
				'last_name' => 'Kudou',
				'first_name' => 'Hiroyuki',
				'old' => 30,
				'img_path' => 'public/デフォルト.png',
			],[
				'department_id' => 'B0001',
				'last_name' => 'Tanaka',
				'first_name' => 'Minami',
				'old' => 28,
				'img_path' => 'public/デフォルト.png',
			]
		]);
	}
}
