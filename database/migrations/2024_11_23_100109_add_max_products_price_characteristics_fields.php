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
        if ( Schema::hasTable(table: 'max_products') ) {
            Schema::table(table: 'max_products', callback: function (Blueprint $table) {
                $table->json(column: 'full_info')->nullable()->after('description');
                $table->decimal(column: 'price', total: 10, places: 2, unsigned: true)->nullable()->default(value: 0.00);
                $table->boolean(column: 'show_price')->nullable()->default(value: 0);
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if ( Schema::hasTable(table: 'max_products') ) {
            Schema::table('max_products', function (Blueprint $table) {
                $table->dropColumn(['full_info', 'price', 'show_price']);
            });
        }
    }
};
