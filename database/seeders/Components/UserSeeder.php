<?php
namespace Database\Seeders\Components;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('users')->insert([

            'first_name' => 'Rkive',
            'last_name' => 'Developer',
            'email' => 'dev@rkive.com',
            'username' => 'dev',
            'password' => bcrypt('dev'),
            'userpassword' => 'dev',
            'role_code' => '101',
            'department_code' => '1001',
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        DB::table('users')->insert([

            'first_name' => 'John Rey',
            'last_name' => 'Miranda',
            'email' => 'johnrey.miranda@rkive.com',
            'username' => 'johnrey.miranda',
            'password' => bcrypt('admin'),
            'userpassword' => 'admin',
            'role_code' => '102',
            'department_code' => '1002',
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([

            'first_name' => 'Jason Ryan',
            'last_name' => 'Odvina',
            'email' => 'jasonryan.odvina@rkive.com',
            'username' => 'jasonryan.odvina',
            'password' => bcrypt('user'),
            'userpassword' => 'user',
            'role_code' => '103',
            'department_code' => '1003',
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
