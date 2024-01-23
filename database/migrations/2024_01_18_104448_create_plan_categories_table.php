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
        Schema::create('plan_categories', function (Blueprint $table) {
            $table->id();
            $table->string('category_type');
            $table->string('plan_category_code')->unique();
            $table->string('plan_category_name');
            $table->timestamps();

            // Foreign Keys
            $table->foreign('category_type')->references('type_code')->on('types');

            // Indexes
            $table->index('plan_category_code');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plan_categories');
    }
};
