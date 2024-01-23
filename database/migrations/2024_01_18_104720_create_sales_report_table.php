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
        Schema::create('sales_report', function (Blueprint $table) {
            $table->id('sales_code');

            // Sales Info
            $table->string('sales_info');
            $table->string('sales_product_name');
            $table->string('sales_revenue');
            $table->date('sales_date');

            $table->string('sales_type');
            $table->string('sales_department');
            $table->string('sales_category');
            $table->timestamps();

            // Foreign Key
            $table->foreign('sales_type')->references('type_code')->on('types');
            $table->foreign('sales_department')->references('department_code')->on('departments');
            $table->foreign('sales_category')->references('plan_category_code')->on('plan_categories');

            // Indexes
            $table->index('sales_info');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales_report');
    }
};
