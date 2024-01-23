<?php

namespace Database\Seeders\Components;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            'role_code' => '101',
            'role_name' => 'Developer'
        ]);

        DB::table('roles')->insert([
            'role_code' => '102',
            'role_name' => 'Admin'
        ]);

        DB::table('roles')->insert([
            'role_code' => '103',
            'role_name' => 'User'
        ]);

    }
}
