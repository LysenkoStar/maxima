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
        Schema::create('max_products', function (Blueprint $table) {
            $table->id();
            $table->json(column: 'name')->nullable(false);
            $table->json(column: 'description')->nullable();
            $table->string(column: 'slug', length: 255)->unique()->nullable(false);
            $table->unsignedBigInteger(column: 'product_category_id')->nullable();
            $table->boolean(column: 'status')->default(value: 1);
            $table->timestamps();

            $table->softDeletes();

            // Define a foreign key relationship with the product categories table
            $table
                ->foreign(columns: 'product_category_id')
                ->references(columns: 'id')
                ->on(table: 'max_product_categories')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('max_products');
    }
};
