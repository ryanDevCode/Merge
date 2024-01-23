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
        Schema::create('accounts_payable', function (Blueprint $table) {
            $table->id('payable_code');

            // Payable Info
            $table->string('payable_info');
            $table->string('payable_name');
            $table->integer('payable_amount');
            $table->date('payable_date');

            $table->string('payable_type');
            $table->string('payable_department');
            $table->string('payable_category');
            $table->timestamps();

            // Foreign Key
            $table->foreign('payable_type')->references('type_code')->on('types');
            $table->foreign('payable_department')->references('department_code')->on('departments');
            $table->foreign('payable_category')->references('plan_category_code')->on('plan_categories');

            // Indexes
            $table->index('payable_info');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accounts_payable');
    }
};
