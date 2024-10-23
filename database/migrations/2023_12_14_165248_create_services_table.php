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
        Schema::create('max_services', function (Blueprint $table) {
            $table->id();
            $table->json(column: 'title')->nullable(false);
            $table->json(column: 'description')->nullable(false);
            $table->json(column: 'short_description')->nullable(false);
            $table->json(column: 'text')->nullable(false);
            $table->string(column: 'image')->nullable();
            $table->boolean(column: 'status')->default(value: 1);
            $table->string(column: 'slug', length: 255)->unique()->nullable(false);
            $table->boolean(column: 'products_link')->nullable(false)->default(value: 0);
            $table->boolean(column: 'applications_link')->nullable(false)->default(value: 0);
            $table->timestamps();

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('max_services');
    }
};
