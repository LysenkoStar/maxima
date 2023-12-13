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
            $table->string(column: 'name');
            $table->text(column: 'description')->nullable();
            $table->decimal(column: 'price', total: 8, places: 2);
            $table->string(column: 'slug', length: 255)->unique()->nullable(false);
            $table->unsignedBigInteger(column: 'stock');
            $table->unsignedBigInteger(column: 'product_category_id');
            $table->boolean(column: 'status')->default(value: 1);
            $table->timestamps();
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
