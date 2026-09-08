<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddShopBundleIdToCartsTable extends Migration
{
    /**
     * Run the migrations.
     * Additive: nullable shop_bundle_id for Savings & Bundles cart lines.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasColumn('carts', 'shop_bundle_id')) {
            Schema::table('carts', function (Blueprint $table) {
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
        if (Schema::hasColumn('carts', 'shop_bundle_id')) {
            Schema::table('carts', function (Blueprint $table) {
                $table->dropColumn('shop_bundle_id');
            });
        }
    }
}
