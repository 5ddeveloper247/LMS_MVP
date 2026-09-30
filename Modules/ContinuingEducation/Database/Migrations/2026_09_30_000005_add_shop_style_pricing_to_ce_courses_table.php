<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\ContinuingEducation\Entities\CeCourse;
use Modules\Shop\Entities\ShopProduct;

class AddShopStylePricingToCeCoursesTable extends Migration
{
    public function up()
    {
        if (! Schema::hasTable('ce_courses')) {
            return;
        }

        Schema::table('ce_courses', function (Blueprint $table) {
            if (! Schema::hasColumn('ce_courses', 'tax_percent')) {
                $table->decimal('tax_percent', 5, 2)->default(0)->after('tax');
            }

            if (! Schema::hasColumn('ce_courses', 'discount_type')) {
                $table->enum('discount_type', ['fixed', 'percent'])->nullable()->after('tax_percent');
            }

            if (! Schema::hasColumn('ce_courses', 'discount')) {
                $table->decimal('discount', 10, 2)->default(0)->after('discount_type');
            }

            if (! Schema::hasColumn('ce_courses', 'total_amount')) {
                $table->decimal('total_amount', 10, 2)->default(0)->after('discount');
            }

            if (! Schema::hasColumn('ce_courses', 'total_tax')) {
                $table->decimal('total_tax', 10, 2)->default(0)->after('total_amount');
            }

            if (! Schema::hasColumn('ce_courses', 'total_discount')) {
                $table->decimal('total_discount', 10, 2)->default(0)->after('total_tax');
            }
        });

        CeCourse::query()->each(function (CeCourse $course) {
            $price = (float) ($course->price ?? 0);
            $taxPercent = (float) ($course->tax ?? 0);

            if ($course->discount_price !== null && (float) $course->discount_price < $price) {
                $totals = ShopProduct::calculatePricing($price, 'fixed', $price - (float) $course->discount_price, $taxPercent);
            } else {
                $totals = ShopProduct::calculatePricing($price, null, 0, $taxPercent);
            }

            $course->tax_percent = $taxPercent;
            $course->total_amount = $totals['total_amount'];
            $course->total_tax = $totals['total_tax'];
            $course->total_discount = $totals['total_discount'];
            $course->saveQuietly();
        });
    }

    public function down()
    {
        if (! Schema::hasTable('ce_courses')) {
            return;
        }

        Schema::table('ce_courses', function (Blueprint $table) {
            foreach (['total_discount', 'total_tax', 'total_amount', 'discount', 'discount_type', 'tax_percent'] as $column) {
                if (Schema::hasColumn('ce_courses', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
}
