<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
  public function run() {
    $this->call(MstDepartmentsSeeder::class);
    $this->call(MstEmployeesSeeder::class);

    $this->call(BlogSeeder::class);
  }
}
