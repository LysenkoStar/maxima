<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (Schema::hasTable('max_product_images')) {
            Schema::table('max_product_images', function (Blueprint $table) {
                $table->string('original_name')->nullable()->after('description');
            });

            DB::statement('UPDATE max_product_images SET original_name = description');

            Schema::table('max_product_images', function (Blueprint $table) {
                $table->dropColumn('description');
            });

            Schema::table('max_product_images', function (Blueprint $table) {
                $table->string('description', 255)->nullable()->after('original_name');
                $table->string('mime_type', 255)->nullable()->after('description');
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
