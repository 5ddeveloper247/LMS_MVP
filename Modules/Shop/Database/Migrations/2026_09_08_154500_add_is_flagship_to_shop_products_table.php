<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIsFlagshipToShopProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('shop_products')) {
            return;
        }

        Schema::table('shop_products', function (Blueprint $table) {
            if (!Schema::hasColumn('shop_products', 'is_flagship')) {
                $table->boolean('is_flagship')->default(0)->after('status')
                    ->comment('1 = Flagship Resource banner on shop (only one product site-wide)');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (!Schema::hasTable('shop_products')) {
            return;
        }

        Schema::table('shop_products', function (Blueprint $table) {
            if (Schema::hasColumn('shop_products', 'is_flagship')) {
                $table->dropColumn('is_flagship');
            }
        });
    }
}
