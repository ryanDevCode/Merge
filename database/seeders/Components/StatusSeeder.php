<?php

namespace Database\Seeders\Components;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('statuses')->insert([
            'status_code' => 'S1',
            'status_name' => 'Approved',
        ]);

        DB::table('statuses')->insert([
            'status_code' => 'S2',
            'status_name' => 'Pending',
        ]);

        DB::table('statuses')->insert([
            'status_code' => 'S3',
            'status_name' => 'Rejected',
        ]);

    }
}
