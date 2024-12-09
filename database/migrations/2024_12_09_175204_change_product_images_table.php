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
        if ( Schema::hasTable(table: 'max_product_images') ) {
            Schema::table(table: 'max_product_images', callback: function (Blueprint $table) {
                if (Schema::hasColumn('max_product_images', 'description')) {
                    $table->renameColumn('description', 'original_name');
                }
            });


            Schema::table(table: 'max_product_images', callback: function (Blueprint $table) {
                $table->string(column: 'description', length: 255)
                    ->nullable()
                    ->after('original_name');
                $table->string(column: 'mime_type', length: 255)
                    ->nullable()
                    ->after('description');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if ( Schema::hasTable(table: 'max_product_images') ) {
            Schema::table('max_product_images', function (Blueprint $table) {
                $table->dropColumn(['mime_type', 'description']);
                $table->renameColumn(from: 'original_name', to: 'description');
            });
        }
    }
};
