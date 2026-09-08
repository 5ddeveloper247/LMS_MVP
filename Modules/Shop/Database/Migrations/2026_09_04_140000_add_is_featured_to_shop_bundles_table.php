<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIsFeaturedToShopBundlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('shop_bundles', function (Blueprint $table) {
            $table->boolean('is_featured')->default(0)->after('status')
                ->comment('1 = Best Value badge on frontend');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('shop_bundles', function (Blueprint $table) {
            $table->dropColumn('is_featured');
        });
    }
}
