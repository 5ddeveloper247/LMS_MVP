<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * CE Professional profile data (linked to users.role_id = CE Professional).
 * Live deploy: also run database/sql/create_ce_professionals_table.sql
 */
class CreateCeProfessionalsTable extends Migration
{
    public function up()
    {
        if (Schema::hasTable('ce_professionals')) {
            return;
        }

        Schema::create('ce_professionals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('fl_license_number', 20);
            $table->string('license_type', 10);
            $table->boolean('aprn_nationally_certified')->nullable();
            $table->boolean('aprn_autonomous')->nullable();
            $table->boolean('consent_license_accurate')->default(false);
            $table->boolean('consent_ce_broker_reporting')->default(false);
            $table->boolean('consent_marketing_email')->default(false);
            $table->date('renewal_date')->nullable();
            $table->timestamp('ce_broker_last_synced_at')->nullable();
            $table->timestamps();

            $table->unique('user_id');
            $table->index('fl_license_number');
            $table->index('license_type');
        });
    }

    public function down()
    {
        Schema::dropIfExists('ce_professionals');
    }
}
