<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCeElectiveCourseIdsToCartsTable extends Migration
{
    public function up()
    {
        if (! Schema::hasTable('carts')) {
            return;
        }

        if (! Schema::hasColumn('carts', 'ce_elective_course_ids')) {
            Schema::table('carts', function (Blueprint $table) {
                $table->text('ce_elective_course_ids')->nullable()->after('ce_bundle_id');
            });
        }
    }

    public function down()
    {
        if (! Schema::hasTable('carts') || ! Schema::hasColumn('carts', 'ce_elective_course_ids')) {
            return;
        }

        Schema::table('carts', function (Blueprint $table) {
            $table->dropColumn('ce_elective_course_ids');
        });
    }
}
