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
        Schema::create('accounts_recievable', function (Blueprint $table) {
            $table->id('recievable_code');

            // Recievable Info
            $table->string('recievable_info');
            $table->string('recievable_name');
            $table->date('recievable_invoice_date');
            $table->integer('recievable_amount');
            $table->integer('recievable_due_date');

            $table->string('recievable_type');
            $table->string('recievable_department');
            $table->string('recievable_category');
            $table->timestamps();

            //Foreign Key
            $table->foreign('recievable_type')->references('type_code')->on('types');
            $table->foreign('recievable_department')->references('department_code')->on('departments');
            $table->foreign('recievable_category')->references('plan_category_code')->on('plan_categories');

            //Indexes
            $table->index('recievable_info');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accounts_recievable');
    }
};
