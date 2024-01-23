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
        Schema::create('income_statement', function (Blueprint $table) {
            $table->id('income_code');

            // Income Info
            $table->string('income_info');
            $table->string('income_name');
            $table->integer('income_amount');
            $table->date('income_date');

            $table->string('income_type');
            $table->string('income_department');
            $table->string('income_category');
            $table->timestamps();

            // Foreign Keys
            $table->foreign('income_department')->references('department_code')->on('departments');
            $table->foreign('income_category')->references('plan_category_code')->on('plan_categories');
            $table->foreign('income_type')->references('type_code')->on('types');

            // Indexes
            $table->index('income_info');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('income_statement');
    }
};
