<?php

namespace Database\Seeders\Components;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BalanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('balance_sheet')->insert([
            'balance_info' => 'BS001',
            'balance_name' => 'Cash',
            'balance_amount' => 100000,
            'balance_date' => '2020-01-01',
            'balance_type' => 'T5',
            'balance_department' => 1003,
            'balance_category' => 'BS01',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('balance_sheet')->insert([
            'balance_info' => 'BS001',
            'balance_name' => 'Accounts Receivable',
            'balance_amount' => 50000,
            'balance_date' => '2020-01-01',
            'balance_type' => 'T5',
            'balance_department' => 1003,
            'balance_category' => 'BS01',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('balance_sheet')->insert([
            'balance_info' => 'BS001',
            'balance_name' => 'Inventory',
            'balance_amount' => 25000,
            'balance_date' => '2020-01-01',
            'balance_type' => 'T5',
            'balance_department' => 1003,
            'balance_category' => 'BS01',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('balance_sheet')->insert([
            'balance_info' => 'BS001',
            'balance_name' => 'Fixed Assets',
            'balance_amount' => 75000,
            'balance_date' => '2020-01-01',
            'balance_type' => 'T5',
            'balance_department' => 1003,
            'balance_category' => 'BS01',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('balance_sheet')->insert([
            'balance_info' => 'BS001',
            'balance_name' => 'Total Assets',
            'balance_amount' => 250000,
            'balance_date' => '2020-01-01',
            'balance_type' => 'T5',
            'balance_department' => 1003,
            'balance_category' => 'BS01',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('balance_sheet')->insert([
            'balance_info' => 'BS001',
            'balance_name' => 'Total Liabilities',
            'balance_amount' => 250000,
            'balance_date' => '2020-01-01',
            'balance_type' => 'T5',
            'balance_department' => 1003,
            'balance_category' => 'BS02',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('balance_sheet')->insert([
            'balance_info' => 'BS001',
            'balance_name' => 'Shareholder\'s Equity',
            'balance_amount' => 180000,
            'balance_date' => '2020-01-01',
            'balance_type' => 'T5',
            'balance_department' => 1003,
            'balance_category' => 'BS03',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('balance_sheet')->insert([
            'balance_info' => 'BS001',
            'balance_name' => 'Total Equity',
            'balance_amount' => 180000,
            'balance_date' => '2020-01-01',
            'balance_type' => 'T5',
            'balance_department' => 1003,
            'balance_category' => 'BS03',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('balance_sheet')->insert([
            'balance_info' => 'BS001',
            'balance_name' => 'Total Liabilities and Equity',
            'balance_amount' => 250000,
            'balance_date' => '2020-01-01',
            'balance_type' => 'T5',
            'balance_department' => 1003,
            'balance_category' => 'BS03',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
