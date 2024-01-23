<?php

namespace Database\Seeders\Components;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecievableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('accounts_recievable')->insert([
            'recievable_info' => 'AR001',
            'recievable_name' => 'ABC Company',
            'recievable_invoice_date' => '2024-01-10',
            'recievable_amount' => 5000,
            'recievable_due_date' => '30',
            'recievable_type' => 'T7',
            'recievable_department' => 1003,
            'recievable_category' => 'AR01',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('accounts_recievable')->insert([
            'recievable_info' => 'AR001',
            'recievable_name' => 'XYZ Company',
            'recievable_invoice_date' => '2024-02-05',
            'recievable_amount' => 2000,
            'recievable_due_date' => '15',
            'recievable_type' => 'T7',
            'recievable_department' => 1003,
            'recievable_category' => 'AR02',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('accounts_recievable')->insert([
            'recievable_info' => 'AR001',
            'recievable_name' => 'DEF Company',
            'recievable_invoice_date' => '2024-03-15',
            'recievable_amount' => 10000,
            'recievable_due_date' => '60',
            'recievable_type' => 'T7',
            'recievable_department' => 1003,
            'recievable_category' => 'AR03',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}

