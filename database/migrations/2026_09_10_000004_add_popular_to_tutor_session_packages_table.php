<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Most Popular badge flag for tutoring session packages.
 * Live: run database/sql/add_popular_to_tutor_session_packages.sql
 */
class AddPopularToTutorSessionPackagesTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('tutor_session_packages')) {
            return;
        }

        Schema::table('tutor_session_packages', function (Blueprint $table) {
            if (!Schema::hasColumn('tutor_session_packages', 'popular')) {
                $table->boolean('popular')->default(0)->after('is_featured');
            }
        });
    }

    public function down()
    {
        if (!Schema::hasTable('tutor_session_packages') || !Schema::hasColumn('tutor_session_packages', 'popular')) {
            return;
        }

        Schema::table('tutor_session_packages', function (Blueprint $table) {
            $table->dropColumn('popular');
        });
    }
}
