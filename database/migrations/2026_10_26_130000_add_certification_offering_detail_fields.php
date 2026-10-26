<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Detail page copy — same idea as courses.outcomes / courses.requirements.
 * Live: database/sql/deploy_certification_offering_detail_fields_live.sql
 */
class AddCertificationOfferingDetailFields extends Migration
{
    public function up()
    {
        if (! Schema::hasTable('certification_offerings')) {
            return;
        }

        Schema::table('certification_offerings', function (Blueprint $table) {
            if (! Schema::hasColumn('certification_offerings', 'outcomes')) {
                $table->longText('outcomes')->nullable()->after('short_description')
                    ->comment('Learning objectives (HTML)');
            }
            if (! Schema::hasColumn('certification_offerings', 'requirements')) {
                $table->longText('requirements')->nullable()->after('outcomes')
                    ->comment('Who this course is for (HTML)');
            }
        });
    }

    public function down()
    {
        if (! Schema::hasTable('certification_offerings')) {
            return;
        }

        Schema::table('certification_offerings', function (Blueprint $table) {
            foreach (['requirements', 'outcomes'] as $col) {
                if (Schema::hasColumn('certification_offerings', $col)) {
                    $table->dropColumn($col);
                }
            }
        });
    }
}
