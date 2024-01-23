<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('inventory_turnover', function (Blueprint $table) {
            $table->id('turnover_code');

            // Turnover Info
            $table->string('turnover_info');
            $table->string('turnover_product_name');
            $table->string('turnover_cost_of_goods_sold');
            $table->string('turnover_inventory_turnover_ratio');
            $table->date('turnover_date');

            $table->string('turnover_type');
            $table->string('turnover_department');
            $table->string('turnover_category');
            $table->timestamps();

            //Foreign Key
            $table->foreign('turnover_type')->references('type_code')->on('types');
            $table->foreign('turnover_department')->references('department_code')->on('departments');
            $table->foreign('turnover_category')->references('plan_category_code')->on('plan_categories');

            //Indexes
            $table->index('turnover_info');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory_turnover');
    }
};
