<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public string $tableName = 'max_products';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
       if ( Schema::hasTable(table: $this->tableName) ) {
           // Удаляем уникальный индекс
           Schema::table(table: $this->tableName, callback: function (Blueprint $table) {
               $table->dropIndex('max_products_slug_unique');
           });

           // Создаем новый уникальный индекс на столбцы 'slug' и 'deleted_at'
           Schema::table(table: $this->tableName, callback: function (Blueprint $table) {
               $table->unique(columns: ['slug', 'deleted_at'], name: 'max_products_slug_deleted_at_unique');
           });
       }

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Удаляем новый индекс
        Schema::table(table: $this->tableName, callback: function (Blueprint $table) {
            $table->dropIndex(index: 'max_products_slug_deleted_at_unique');
        });

        Schema::table(table: $this->tableName, callback: function (Blueprint $table) {
            $table->unique(columns: 'slug');
        });
    }
};
