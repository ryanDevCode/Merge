<?php

namespace Database\Seeders\Components;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlanCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('plan_categories')->insert([
            'category_type' => 'T3',
            'plan_category_code' => 'CFS01',
            'plan_category_name' => 'Operating Activities',
        ]);

        DB::table('plan_categories')->insert([
            'category_type' => 'T3',
            'plan_category_code' => 'CFS02',
            'plan_category_name' => 'Investing Activities',
        ]);

        DB::table('plan_categories')->insert([
            'category_type' => 'T3',
            'plan_category_code' => 'CFS03',
            'plan_category_name' => 'Financing Activities',
        ]);

        DB::table('plan_categories')->insert([
            'category_type' => 'T4',
            'plan_category_code' => 'INC01',
            'plan_category_name' => 'Revenue',
        ]);

        DB::table('plan_categories')->insert([
            'category_type' => 'T4',
            'plan_category_code' => 'INC02',
            'plan_category_name' => 'Operating Costs',
        ]);

        DB::table('plan_categories')->insert([
            'category_type' => 'T5',
            'plan_category_code' => 'BS01',
            'plan_category_name' => 'Assets',
        ]);

        DB::table('plan_categories')->insert([
            'category_type' => 'T5',
            'plan_category_code' => 'BS02',
            'plan_category_name' => 'Liabilities',
        ]);

        DB::table('plan_categories')->insert([
            'category_type' => 'T5',
            'plan_category_code' => 'BS03',
            'plan_category_name' => 'Equity',
        ]);

        DB::table('plan_categories')->insert([
            'category_type' => 'T6',
            'plan_category_code' => 'AP01',
            'plan_category_name' => 'Current',
        ]);

        DB::table('plan_categories')->insert([
            'category_type' => 'T6',
            'plan_category_code' => 'AP02',
            'plan_category_name' => '1-30 Days Past Due',
        ]);

        DB::table('plan_categories')->insert([
            'category_type' => 'T6',
            'plan_category_code' => 'AP03',
            'plan_category_name' => '30-60 Days Past Due',
        ]);

        DB::table('plan_categories')->insert([
            'category_type' => 'T7',
            'plan_category_code' => 'AR01',
            'plan_category_name' => 'Current',
        ]);

        DB::table('plan_categories')->insert([
            'category_type' => 'T7',
            'plan_category_code' => 'AR02',
            'plan_category_name' => '1-30 Days Past Due',
        ]);

        DB::table('plan_categories')->insert([
            'category_type' => 'T7',
            'plan_category_code' => 'AR03',
            'plan_category_name' => '30-60 Days Past Due',
        ]);

        DB::table('plan_categories')->insert([
            'category_type' => 'T8',
            'plan_category_code' => 'IT01',
            'plan_category_name' => '50 Pieces',
        ]);

        DB::table('plan_categories')->insert([
            'category_type' => 'T8',
            'plan_category_code' => 'IT02',
            'plan_category_name' => '100 Pieces',
        ]);

        DB::table('plan_categories')->insert([
            'category_type' => 'T8',
            'plan_category_code' => 'IT03',
            'plan_category_name' => '150 Pieces',
        ]);

        DB::table('plan_categories')->insert([
            'category_type' => 'T8',
            'plan_category_code' => 'IT04',
            'plan_category_name' => '200 Pieces',
        ]);

        DB::table('plan_categories')->insert([
            'category_type' => 'T9',
            'plan_category_code' => 'SR01',
            'plan_category_name' => '50 Pieces',
        ]);

        DB::table('plan_categories')->insert([
            'category_type' => 'T9',
            'plan_category_code' => 'SR02',
            'plan_category_name' => '100 Pieces',
        ]);

        DB::table('plan_categories')->insert([
            'category_type' => 'T9',
            'plan_category_code' => 'SR03',
            'plan_category_name' => '150 Pieces',
        ]);

        DB::table('plan_categories')->insert([
            'category_type' => 'T9',
            'plan_category_code' => 'SR04',
            'plan_category_name' => '200 Pieces',
        ]);

    }
}
