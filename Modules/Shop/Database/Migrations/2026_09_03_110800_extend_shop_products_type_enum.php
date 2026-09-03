<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class ExtendShopProductsTypeEnum extends Migration
{
    /**
     * Run the migrations.
     * 1 = Product, 2 = Book, 3 = Study Guide, 4 = Study Tool
     *
     * @return void
     */
    public function up()
    {
        DB::statement("ALTER TABLE shop_products MODIFY COLUMN type ENUM('1', '2', '3', '4') NOT NULL COMMENT '1 = Product, 2 = Book, 3 = Study Guide, 4 = Study Tool'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Only safe if no rows use type 3 or 4
        DB::statement("ALTER TABLE shop_products MODIFY COLUMN type ENUM('1', '2') NOT NULL COMMENT '1 = Product, 2 = Book'");
    }
}
