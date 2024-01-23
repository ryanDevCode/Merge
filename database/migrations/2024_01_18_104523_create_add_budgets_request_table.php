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
        Schema::create('add_budgets_request', function (Blueprint $table) {
            $table->id('request_code');

            // Request Info
            $table->string('request_name')->unique();
            $table->integer('request_amount');
            $table->text('request_description');

            $table->string('request_category');
            $table->string('request_type');
            $table->string('request_department');
            $table->unsignedBigInteger('request_budget_code');
            $table->foreign('request_budget_code')->references('id')->on('budgets');

            // Variance Info
            $table->integer('request_actualSpending');
            $table->integer('request_variance');
            $table->text('request_varianceReason');

            // Approval Status
            $table->string('request_status');
            $table->string('request_approvedBy',)->nullable();
            $table->date('request_approvedDate')->nullable();
            $table->integer('request_approvedAmount')->nullable();
            $table->text('request_notes')->nullable();
            $table->timestamps();

            // Foreign Keys
            $table->foreign('request_category')->references('category_code')->on('categories');
            $table->foreign('request_type')->references('type_code')->on('types');
            $table->foreign('request_department')->references('department_code')->on('departments');
            $table->foreign('request_status')->references('status_code')->on('statuses');
            $table->foreign('request_approvedBy')->references('username')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('add_budgets_request');
    }
};
