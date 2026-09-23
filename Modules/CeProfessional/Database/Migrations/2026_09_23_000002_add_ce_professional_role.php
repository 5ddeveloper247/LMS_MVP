<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

/**
 * CE Professional system role for login/register redirect.
 * Live deploy: also run database/sql/create_ce_professionals_table.sql (includes role insert).
 */
class AddCeProfessionalRole extends Migration
{
    public function up()
    {
        if (DB::table('roles')->where('id', 10)->exists()) {
            return;
        }

        if (DB::table('roles')->where('name', 'CE Professional')->exists()) {
            return;
        }

        DB::table('roles')->insert([
            'id' => 10,
            'name' => 'CE Professional',
            'type' => 'System',
            'details' => 'Florida CE portal users',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    public function down()
    {
        DB::table('roles')->where('id', 10)->delete();
    }
}
