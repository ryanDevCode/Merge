<?php

namespace Database\Seeders\Components;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SalesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sales_report')->insert([
            'sales_info' => 'SR001',
            'sales_product_name' => 'Product A',
            'sales_revenue' => 5000,
            'sales_date' => '2020-01-01',
            'sales_type' => 'T9',
            'sales_department' => 1002,
            'sales_category' => 'SR02',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sales_report')->insert([
            'sales_info' => 'SR001',
            'sales_product_name' => 'Product B',
            'sales_revenue' => 10000,
            'sales_date' => '2020-01-01',
            'sales_type' => 'T9',
            'sales_department' => 1002,
            'sales_category' => 'SR04',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sales_report')->insert([
            'sales_info' => 'SR001',
            'sales_product_name' => 'Product C',
            'sales_revenue' => 2500,
            'sales_date' => '2020-01-01',
            'sales_type' => 'T9',
            'sales_department' => 1002,
            'sales_category' => 'SR01',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
