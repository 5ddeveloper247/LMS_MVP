<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Modules\Shop\Entities\ShopProduct;

class AddLicenseFkAndShopPricingToCeBundlesTable extends Migration
{
    public function up()
    {
        if (! Schema::hasTable('ce_bundles')) {
            return;
        }

        Schema::table('ce_bundles', function (Blueprint $table) {
            if (! Schema::hasColumn('ce_bundles', 'ce_license_type_id')) {
                $table->unsignedBigInteger('ce_license_type_id')->nullable()->after('compare_at_price');
            }

            if (! Schema::hasColumn('ce_bundles', 'tax_percent')) {
                $table->decimal('tax_percent', 5, 2)->default(0)->after('price');
            }

            if (! Schema::hasColumn('ce_bundles', 'discount_type')) {
                $table->enum('discount_type', ['fixed', 'percent'])->nullable()->after('tax_percent');
            }

            if (! Schema::hasColumn('ce_bundles', 'discount')) {
                $table->decimal('discount', 10, 2)->default(0)->after('discount_type');
            }

            if (! Schema::hasColumn('ce_bundles', 'total_amount')) {
                $table->decimal('total_amount', 10, 2)->default(0)->after('discount');
            }

            if (! Schema::hasColumn('ce_bundles', 'total_tax')) {
                $table->decimal('total_tax', 10, 2)->default(0)->after('total_amount');
            }

            if (! Schema::hasColumn('ce_bundles', 'total_discount')) {
                $table->decimal('total_discount', 10, 2)->default(0)->after('total_tax');
            }
        });

        // Allow CNA on legacy license_type column (still synced from license card_style).
        DB::statement("ALTER TABLE `ce_bundles` MODIFY `license_type` ENUM('rn_lpn','aprn','cna') NOT NULL DEFAULT 'rn_lpn'");

        if (Schema::hasTable('ce_license_types') && Schema::hasColumn('ce_bundles', 'ce_license_type_id')) {
            $styleMap = [
                'rn_lpn' => 'teal',
                'aprn' => 'terra',
                'cna' => 'cna',
            ];

            $bundles = DB::table('ce_bundles')->select('id', 'license_type', 'lms_id', 'price', 'compare_at_price')->get();

            foreach ($bundles as $bundle) {
                $cardStyle = $styleMap[$bundle->license_type] ?? 'teal';
                $licenseId = DB::table('ce_license_types')
                    ->where('lms_id', $bundle->lms_id)
                    ->where('status', 1)
                    ->where('card_style', $cardStyle)
                    ->orderByRaw('COALESCE(seq_no, 999999) ASC')
                    ->value('id');

                $price = (float) ($bundle->price ?? 0);
                $totals = ShopProduct::calculatePricing($price, null, 0, 0);

                DB::table('ce_bundles')->where('id', $bundle->id)->update([
                    'ce_license_type_id' => $licenseId,
                    'tax_percent' => 0,
                    'discount_type' => null,
                    'discount' => 0,
                    'total_amount' => $totals['total_amount'],
                    'total_tax' => $totals['total_tax'],
                    'total_discount' => $totals['total_discount'],
                ]);
            }
        }
    }

    public function down()
    {
        if (! Schema::hasTable('ce_bundles')) {
            return;
        }

        Schema::table('ce_bundles', function (Blueprint $table) {
            foreach (['total_discount', 'total_tax', 'total_amount', 'discount', 'discount_type', 'tax_percent', 'ce_license_type_id'] as $column) {
                if (Schema::hasColumn('ce_bundles', $column)) {
                    $table->dropColumn($column);
                }
            }
        });

        DB::statement("ALTER TABLE `ce_bundles` MODIFY `license_type` ENUM('rn_lpn','aprn') NOT NULL DEFAULT 'rn_lpn'");
    }
}
