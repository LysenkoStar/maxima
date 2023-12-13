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
        Schema::create('max_product_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger(column: 'product_id');
            $table->string(column: 'image_path');
            $table->string(column: 'description', length: 255);
            $table->unsignedInteger(column: 'sort');
            $table->boolean(column: 'status')->default(value: 1);
            $table->timestamps();

            // Define a foreign key relationship with the products table
            $table
                ->foreign(columns: 'product_id')
                ->references(columns: 'id')
                ->on(table: 'max_products')
                ->onDelete(action: 'cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('max_product_images');
    }
};
