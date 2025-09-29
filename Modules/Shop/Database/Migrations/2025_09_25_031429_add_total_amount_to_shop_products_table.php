<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTotalAmountToShopProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('shop_products', function (Blueprint $table) {
            $table->decimal('total_amount', 10, 2)->default(0)->after('discount')->comment('Exclusive tax and discount');
            $table->decimal('total_tax', 10, 2)->default(0)->after('total_amount');
            $table->decimal('total_discount', 10, 2)->default(0)->after('total_tax');
            $table->unsignedBigInteger('total_inventory')->default(0)->after('total_discount');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('shop_products', function (Blueprint $table) {

        });
    }
}
