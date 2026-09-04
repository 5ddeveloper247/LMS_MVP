<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class ChangeShopBundlesShortDescriptionToText extends Migration
{
    /**
     * Allow rich-text HTML for short_description (same editor as products).
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('shop_bundles')) {
            return;
        }

        DB::statement('ALTER TABLE `shop_bundles` MODIFY `short_description` TEXT NULL');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (!Schema::hasTable('shop_bundles')) {
            return;
        }

        DB::statement('ALTER TABLE `shop_bundles` MODIFY `short_description` VARCHAR(500) NULL');
    }
}
