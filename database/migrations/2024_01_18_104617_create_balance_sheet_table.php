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
        Schema::create('balance_sheet', function (Blueprint $table) {
            $table->id('balance_code');

            // Balance Info
            $table->string('balance_info');
            $table->string('balance_name');
            $table->integer('balance_amount');
            $table->date('balance_date');

            $table->string('balance_type');
            $table->string('balance_department');
            $table->string('balance_category');
            $table->timestamps();

            // Foreign Key
            $table->foreign('balance_type')->references('type_code')->on('types');
            $table->foreign('balance_department')->references('department_code')->on('departments');
            $table->foreign('balance_category')->references('plan_category_code')->on('plan_categories');

            // Indexes
            $table->index('balance_info');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('balance_sheet');
    }
};
