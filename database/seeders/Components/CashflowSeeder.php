<?php

namespace Database\Seeders\Components;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CashflowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cashflow_statement')->insert([
            'cashflow_info' => 'CF001',
            'cashflow_name' => 'Adjustments for Non-Cash Items',
            'cashflow_amount' => 5000,
            'cashflow_date' => '2020-01-01',
            'cashflow_type' => 'T3',
            'cashflow_department' => 1003,
            'cashflow_category' => 'CFS01',
            'created_at' => now(),
            'updated_at' => now(),

        ]);

        DB::table('cashflow_statement')->insert([
            'cashflow_info' => 'CF001',
            'cashflow_name' => 'Changes in Working Capital',
            'cashflow_amount' => 3000,
            'cashflow_date' => '2020-01-01',
            'cashflow_type' => 'T3',
            'cashflow_department' => 1003,
            'cashflow_category' => 'CFS01',
            'created_at' => now(),
            'updated_at' => now(),

        ]);

        DB::table('cashflow_statement')->insert([
            'cashflow_info' => 'CF001',
            'cashflow_name' => 'Net Cash Provided by Operating Activities',
            'cashflow_amount' => 28000,
            'cashflow_date' => '2020-01-01',
            'cashflow_type' => 'T3',
            'cashflow_department' => 1003,
            'cashflow_category' => 'CFS01',
            'created_at' => now(),
            'updated_at' => now(),

        ]);

        DB::table('cashflow_statement')->insert([
            'cashflow_info' => 'CF001',
            'cashflow_name' => 'Purchase of Equipment',
            'cashflow_amount' => 10000,
            'cashflow_date' => '2020-01-01',
            'cashflow_type' => 'T3',
            'cashflow_department' => 1003,
            'cashflow_category' => 'CFS02',
            'created_at' => now(),
            'updated_at' => now(),

        ]);

        DB::table('cashflow_statement')->insert([
            'cashflow_info' => 'CF001',
            'cashflow_name' => 'Net Cash Used in Investing Activities',
            'cashflow_amount' => 10000,
            'cashflow_date' => '2020-01-01',
            'cashflow_type' => 'T3',
            'cashflow_department' => 1003,
            'cashflow_category' => 'CFS02',
            'created_at' => now(),
            'updated_at' => now(),

        ]);

        DB::table('cashflow_statement')->insert([
            'cashflow_info' => 'CF001',
            'cashflow_name' => 'Repayment of Loans',
            'cashflow_amount' => 5000,
            'cashflow_date' => '2020-01-01',
            'cashflow_type' => 'T3',
            'cashflow_department' => 1003,
            'cashflow_category' => 'CFS03',
            'created_at' => now(),
            'updated_at' => now(),

        ]);

        DB::table('cashflow_statement')->insert([
            'cashflow_info' => 'CF001',
            'cashflow_name' => 'Net Cash Used in Financing Activities',
            'cashflow_amount' => 5000,
            'cashflow_date' => '2020-01-01',
            'cashflow_type' => 'T3',
            'cashflow_department' => 1003,
            'cashflow_category' => 'CFS03',
            'created_at' => now(),
            'updated_at' => now(),

        ]);

        DB::table('cashflow_statement')->insert([
            'cashflow_info' => 'CF001',
            'cashflow_name' => 'Net Increase in Cash',
            'cashflow_amount' => 13000,
            'cashflow_date' => '2020-01-01',
            'cashflow_type' => 'T3',
            'cashflow_department' => 1003,
            'cashflow_category' => 'CFS03',
            'created_at' => now(),
            'updated_at' => now(),

        ]);

        DB::table('cashflow_statement')->insert([
            'cashflow_info' => 'CF001',
            'cashflow_name' => 'Beginning Cash Balance',
            'cashflow_amount' => 50000,
            'cashflow_date' => '2020-01-01',
            'cashflow_type' => 'T3',
            'cashflow_department' => 1003,
            'cashflow_category' => 'CFS03',
            'created_at' => now(),
            'updated_at' => now(),

        ]);

        DB::table('cashflow_statement')->insert([
            'cashflow_info' => 'CF001',
            'cashflow_name' => 'Ending Cash Balance',
            'cashflow_amount' => 63000,
            'cashflow_date' => '2020-01-01',
            'cashflow_type' => 'T3',
            'cashflow_department' => 1003,
            'cashflow_category' => 'CFS03',
            'created_at' => now(),
            'updated_at' => now(),

        ]);

    }
}
