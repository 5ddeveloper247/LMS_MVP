<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class AddBookFormatToShopProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('shop_products', function (Blueprint $table) {
            $table->enum('book_format', ['soft', 'hard'])->nullable()->after('type');
        });

        DB::table('shop_products')
            ->where('type', 2)
            ->whereNull('book_format')
            ->update([
                'book_format' => DB::raw("CASE WHEN book_pdf IS NOT NULL AND book_pdf != '' THEN 'soft' ELSE 'hard' END"),
            ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('shop_products', function (Blueprint $table) {
            $table->dropColumn('book_format');
        });
    }
}
