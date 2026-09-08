<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStudyingForToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'studying_for')) {
                $table->string('studying_for')->nullable()->after('student_type');
            }
            if (!Schema::hasColumn('users', 'student_journey')) {
                $table->string('student_journey')->nullable()->after('studying_for');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'student_journey')) {
                $table->dropColumn('student_journey');
            }
            if (Schema::hasColumn('users', 'studying_for')) {
                $table->dropColumn('studying_for');
            }
        });
    }
}
