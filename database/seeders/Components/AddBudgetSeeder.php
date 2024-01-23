<?php

namespace Database\Seeders\Components;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AddBudgetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('add_budgets_request')->insert([

            'request_name' => 'test',
            'request_amount' => 123,
            'request_description' => 'test',
            'request_category' => 'test',
            'request_type' => 'test',
            'request_department' => 'test',
            'request_budget_code' => 'test',
            'request_actualSpending' => 123,
            'request_variance' => 123,
            'request_varianceReason' => 'test',
            'request_status' => 'test',
            'request_approvedBy' => 'test',
            'request_approvedDate' => 'test',
            'request_approvedAmount' => 123,
            'request_notes' => 'test',

        ]);
    }
}
