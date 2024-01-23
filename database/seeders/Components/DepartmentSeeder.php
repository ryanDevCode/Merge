<?php

namespace Database\Seeders\Components;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('departments')->insert([
            'department_code' => '1001',
            'department_name' => 'Creators',
        ]);

        DB::table('departments')->insert([
            'department_code' => '1002',
            'department_name' => 'Admin',
        ]);

        DB::table('departments')->insert([
            'department_code' => '1003',
            'department_name' => 'Logistics',
        ]);

        DB::table('departments')->insert([
            'department_code' => '1004',
            'department_name' => 'Finance',
        ]);

    }
}
