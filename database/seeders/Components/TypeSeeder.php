<?php

namespace Database\Seeders\Components;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('types')->insert([
            'type_code' => 'T1',
            'type_name' => 'Request Budget Plan ',
        ]);

        DB::table('types')->insert([
            'type_code' => 'T2',
            'type_name' => 'Request Additional Budget',
        ]);

        DB::table('types')->insert([
            'type_code' => 'T3',
            'type_name' => 'Cash Flow Statement',
        ]);

        DB::table('types')->insert([
            'type_code' => 'T4',
            'type_name' => 'Income Statement',
        ]);

        DB::table('types')->insert([
            'type_code' => 'T5',
            'type_name' => 'Balance Sheet',
        ]);

        DB::table('types')->insert([
            'type_code' => 'T6',
            'type_name' => 'Accounts Payable',
        ]);

        DB::table('types')->insert([
            'type_code' => 'T7',
            'type_name' => 'Accounts Receivable',
        ]);

        DB::table('types')->insert([
            'type_code' => 'T8',
            'type_name' => 'Inventory Turnover',
        ]);

        DB::table('types')->insert([
            'type_code' => 'T9',
            'type_name' => 'Sales Statement',
        ]);

    }
}
