<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Featured instructors for Our Team page (max 3 active via app logic).
 * Live deploy: run database/sql/add_is_featured_to_users.sql
 */
class AddIsFeaturedToUsersTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('users')) {
            return;
        }

        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'is_featured')) {
                $table->boolean('is_featured')->default(0)->after('total_hours');
            }
        });
    }

    public function down()
    {
        if (!Schema::hasTable('users') || !Schema::hasColumn('users', 'is_featured')) {
            return;
        }

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('is_featured');
        });
    }
}
