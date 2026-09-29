<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCePurchaseColumnsToCartsTable extends Migration
{
    public function up()
    {
        if (! Schema::hasTable('carts')) {
            return;
        }

        Schema::table('carts', function (Blueprint $table) {
            if (! Schema::hasColumn('carts', 'ce_course_id')) {
                $after = Schema::hasColumn('carts', 'shop_bundle_id') ? 'shop_bundle_id' : 'product_id';
                $table->unsignedBigInteger('ce_course_id')->nullable()->after($after);
                $table->index('ce_course_id');
            }

            if (! Schema::hasColumn('carts', 'ce_bundle_id')) {
                $table->unsignedBigInteger('ce_bundle_id')->nullable()->after('ce_course_id');
                $table->index('ce_bundle_id');
            }
        });
    }

    public function down()
    {
        if (! Schema::hasTable('carts')) {
            return;
        }

        Schema::table('carts', function (Blueprint $table) {
            if (Schema::hasColumn('carts', 'ce_bundle_id')) {
                $table->dropColumn('ce_bundle_id');
            }

            if (Schema::hasColumn('carts', 'ce_course_id')) {
                $table->dropColumn('ce_course_id');
            }
        });
    }
}
