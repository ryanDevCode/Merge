<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([

            \Database\Seeders\Components\RoleSeeder::class,
            \Database\Seeders\Components\DepartmentSeeder::class,
            \Database\Seeders\Components\UserSeeder::class,

            \Database\Seeders\Components\CategorySeeder::class,
            \Database\Seeders\Components\TypeSeeder::class,
            \Database\Seeders\Components\StatusSeeder::class,
            \Database\Seeders\Components\PlanCategorySeeder::class,

            \Database\Seeders\Components\BudgetSeeder::class,
            \Database\Seeders\Components\CashflowSeeder::class,
            \Database\Seeders\Components\BalanceSeeder::class,
            \Database\Seeders\Components\IncomeSeeder::class,
            \Database\Seeders\Components\PayableSeeder::class,
            \Database\Seeders\Components\RecievableSeeder::class,
            \Database\Seeders\Components\TurnoverSeeder::class,
            \Database\Seeders\Components\SalesSeeder::class,
        ]);
    }
}
