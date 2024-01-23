<?php

namespace Database\Seeders\Components;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PayableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('accounts_payable')->insert([
            'payable_info' => 'AP001',
            'payable_name' => 'Supplier A',
            'payable_amount' => 3000,
            'payable_date' => '2024-01-15',
            'payable_type' => 'T6',
            'payable_department' => 1004,
            'payable_category' => 'AP01',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('accounts_payable')->insert([
            'payable_info' => 'AP001',
            'payable_name' => 'Supplier B',
            'payable_amount' => 5000,
            'payable_date' => '2023-12-20',
            'payable_type' => 'T6',
            'payable_department' => 1004,
            'payable_category' => 'AP02',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('accounts_payable')->insert([
            'payable_info' => 'AP001',
            'payable_name' => 'Supplier C',
            'payable_amount' => 8000,
            'payable_date' => '2023-11-28',
            'payable_type' => 'T6',
            'payable_department' => 1004,
            'payable_category' => 'AP03',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}
