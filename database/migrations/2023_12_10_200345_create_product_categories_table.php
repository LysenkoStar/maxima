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
        Schema::create('max_product_categories', function (Blueprint $table) {
            $table->id();
            $table->json(column: 'name')->nullable(false);
            $table->json(column: 'description')->nullable();
            $table->string(column: 'image')->nullable();
            $table->boolean(column: 'status')->default(value: 1);
            $table->string(column: 'slug', length: 255)->unique()->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('max_product_categories');
    }
};
