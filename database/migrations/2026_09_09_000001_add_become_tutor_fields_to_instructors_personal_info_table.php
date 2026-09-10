<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * New Become a Tutor form fields (nullable — no impact on old instructor rows).
 * Live deploy: run database/sql/add_become_tutor_columns_instructors_personal_info.sql
 * (do not rely on php artisan migrate on production).
 */
class AddBecomeTutorFieldsToInstructorsPersonalInfoTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('instructors_personal_info')) {
            return;
        }

        Schema::table('instructors_personal_info', function (Blueprint $table) {
            if (!Schema::hasColumn('instructors_personal_info', 'nursing_credential')) {
                $table->string('nursing_credential', 100)->nullable()->after('address');
            }
            if (!Schema::hasColumn('instructors_personal_info', 'years_experience')) {
                $table->string('years_experience', 50)->nullable()->after('nursing_credential');
            }
            if (!Schema::hasColumn('instructors_personal_info', 'specialties')) {
                $table->text('specialties')->nullable()->after('years_experience');
            }
            if (!Schema::hasColumn('instructors_personal_info', 'taught_before')) {
                $table->string('taught_before', 150)->nullable()->after('specialties');
            }
            if (!Schema::hasColumn('instructors_personal_info', 'availability')) {
                $table->text('availability')->nullable()->after('taught_before');
            }
        });
    }

    public function down()
    {
        if (!Schema::hasTable('instructors_personal_info')) {
            return;
        }

        Schema::table('instructors_personal_info', function (Blueprint $table) {
            $cols = [];
            foreach (['nursing_credential', 'years_experience', 'specialties', 'taught_before', 'availability'] as $col) {
                if (Schema::hasColumn('instructors_personal_info', $col)) {
                    $cols[] = $col;
                }
            }
            if (!empty($cols)) {
                $table->dropColumn($cols);
            }
        });
    }
}
