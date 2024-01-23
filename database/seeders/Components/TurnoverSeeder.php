<?php

namespace Database\Seeders\Components;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TurnoverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('inventory_turnover')->insert([
            'turnover_info' => 'IT001',
            'turnover_product_name' => 'Product A',
            'turnover_cost_of_goods_sold' => 5000,
            'turnover_inventory_turnover_ratio' => 5,
            'turnover_date' => '2020-01-01',
            'turnover_type' => 'T8',
            'turnover_department' => 1002,
            'turnover_category' => 'IT02',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('inventory_turnover')->insert([
            'turnover_info' => 'IT001',
            'turnover_product_name' => 'Product B',
            'turnover_cost_of_goods_sold' => 10000,
            'turnover_inventory_turnover_ratio' => 5,
            'turnover_date' => '2020-01-01',
            'turnover_type' => 'T8',
            'turnover_department' => 1002,
            'turnover_category' => 'IT04',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('inventory_turnover')->insert([
            'turnover_info' => 'IT001',
            'turnover_product_name' => 'Product C',
            'turnover_cost_of_goods_sold' => 2500,
            'turnover_inventory_turnover_ratio' => 5,
            'turnover_date' => '2020-01-01',
            'turnover_type' => 'T8',
            'turnover_department' => 1002,
            'turnover_category' => 'IT01',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
