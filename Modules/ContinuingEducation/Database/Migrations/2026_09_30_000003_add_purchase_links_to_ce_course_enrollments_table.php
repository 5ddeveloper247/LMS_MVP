<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPurchaseLinksToCeCourseEnrollmentsTable extends Migration
{
    public function up()
    {
        if (! Schema::hasTable('ce_course_enrollments')) {
            return;
        }

        Schema::table('ce_course_enrollments', function (Blueprint $table) {
            if (! Schema::hasColumn('ce_course_enrollments', 'ce_purchase_id')) {
                $table->unsignedBigInteger('ce_purchase_id')->nullable()->after('ce_course_id');
                $table->index('ce_purchase_id');
            }

            if (! Schema::hasColumn('ce_course_enrollments', 'ce_purchase_item_id')) {
                $table->unsignedBigInteger('ce_purchase_item_id')->nullable()->after('ce_purchase_id');
                $table->index('ce_purchase_item_id');
            }

            if (! Schema::hasColumn('ce_course_enrollments', 'source')) {
                $table->enum('source', ['direct', 'bundle'])->default('direct')->after('ce_purchase_item_id');
            }
        });
    }

    public function down()
    {
        if (! Schema::hasTable('ce_course_enrollments')) {
            return;
        }

        Schema::table('ce_course_enrollments', function (Blueprint $table) {
            if (Schema::hasColumn('ce_course_enrollments', 'source')) {
                $table->dropColumn('source');
            }

            if (Schema::hasColumn('ce_course_enrollments', 'ce_purchase_item_id')) {
                $table->dropColumn('ce_purchase_item_id');
            }

            if (Schema::hasColumn('ce_course_enrollments', 'ce_purchase_id')) {
                $table->dropColumn('ce_purchase_id');
            }
        });
    }
}
