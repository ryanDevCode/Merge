<?php

namespace Database\Seeders\Components;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IncomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('income_statement')->insert([
            'income_info' => 'IN001',
            'income_name' => 'Sales Revenue',
            'income_amount' => 150000,
            'income_date' => '2020-01-01',
            'income_type' => 'T4',
            'income_department' => 1002,
            'income_category' => 'INC01',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('income_statement')->insert([
            'income_info' => 'IN001',
            'income_name' => 'Cost of Goods Sold',
            'income_amount' => 75000,
            'income_date' => '2020-01-01',
            'income_type' => 'T4',
            'income_department' => 1002,
            'income_category' => 'INC01',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('income_statement')->insert([
            'income_info' => 'IN001',
            'income_name' => 'Gross Profit',
            'income_amount' => 75000,
            'income_date' => '2020-01-01',
            'income_type' => 'T4',
            'income_department' => 1002,
            'income_category' => 'INC01',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('income_statement')->insert([
            'income_info' => 'IN001',
            'income_name' => 'Salaries and Wages',
            'income_amount' => 40000,
            'income_date' => '2020-01-01',
            'income_type' => 'T4',
            'income_department' => 1002,
            'income_category' => 'INC02',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('income_statement')->insert([
            'income_info' => 'IN001',
            'income_name' => 'Rent Expense',
            'income_amount' => 10000,
            'income_date' => '2020-01-01',
            'income_type' => 'T4',
            'income_department' => 1002,
            'income_category' => 'INC02',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('income_statement')->insert([
            'income_info' => 'IN001',
            'income_name' => 'Marketing expenses',
            'income_amount' => 5000,
            'income_date' => '2020-01-01',
            'income_type' => 'T4',
            'income_department' => 1002,
            'income_category' => 'INC02',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}
