<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddShopBundleIdToShopOrdersTable extends Migration
{
    /**
     * Run the migrations.
     * Additive: nullable shop_bundle_id so My Orders can list Savings & Bundles purchases.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasColumn('shop_orders', 'shop_bundle_id')) {
            Schema::table('shop_orders', function (Blueprint $table) {
                $table->unsignedBigInteger('shop_bundle_id')->nullable()->after('product_id');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('shop_orders', 'shop_bundle_id')) {
            Schema::table('shop_orders', function (Blueprint $table) {
                $table->dropColumn('shop_bundle_id');
            });
        }
    }
}
