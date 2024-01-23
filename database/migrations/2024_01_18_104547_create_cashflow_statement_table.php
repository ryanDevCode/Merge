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
        Schema::create('cashflow_statement', function (Blueprint $table) {
            $table->id('cashflow_code');

            // Cashflow Info
            $table->string('cashflow_info');
            $table->string('cashflow_name');
            $table->integer('cashflow_amount');
            $table->date('cashflow_date');

            $table->string('cashflow_type');
            $table->string('cashflow_department');
            $table->string('cashflow_category');
            $table->timestamps();

            // Foreign Keys
            $table->foreign('cashflow_type')->references('type_code')->on('types');
            $table->foreign('cashflow_department')->references('department_code')->on('departments');
            $table->foreign('cashflow_category')->references('plan_category_code')->on('plan_categories');

            // Indexes
            $table->index('cashflow_info');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cashflow_statement');
    }
};
