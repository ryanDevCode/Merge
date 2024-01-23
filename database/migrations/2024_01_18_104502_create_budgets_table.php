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
        Schema::create('budgets', function (Blueprint $table) {
            $table->id();  // This creates an auto-incrementing primary key named 'id'

            // Budget Info
            $table->string('budget_name')->unique();
            $table->integer('budget_amount');
            $table->text('budget_description');
            $table->date('budget_startDate');
            $table->date('budget_endDate');

            $table->string('budget_category');
            $table->string('budget_type');
            $table->string('budget_department');

            // Approval Status
            $table->string('budget_status');
            $table->string('budget_approvedBy',)->nullable();
            $table->date('budget_approvedDate')->nullable();
            $table->integer('budget_approvedAmount')->nullable();
            $table->text('budget_notes')->nullable();
            $table->timestamps();

            // Foreign Keys
            $table->foreign('budget_category')->references('category_code')->on('categories');
            $table->foreign('budget_type')->references('type_code')->on('types');
            $table->foreign('budget_department')->references('department_code')->on('departments');
            $table->foreign('budget_status')->references('status_code')->on('statuses');
            $table->foreign('budget_approvedBy')->references('username')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('budgets');
    }
};
