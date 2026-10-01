<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddCnaCardStyleToCeLicenseTypesTable extends Migration
{
    public function up()
    {
        if (! Schema::hasTable('ce_license_types')) {
            return;
        }

        // Expand enum so CNA can be selected as a licence category (stored as card_style).
        DB::statement("ALTER TABLE `ce_license_types` MODIFY `card_style` ENUM('teal','terra','cna') NOT NULL DEFAULT 'teal'");
    }

    public function down()
    {
        if (! Schema::hasTable('ce_license_types')) {
            return;
        }

        DB::table('ce_license_types')
            ->where('card_style', 'cna')
            ->update(['card_style' => 'teal']);

        DB::statement("ALTER TABLE `ce_license_types` MODIFY `card_style` ENUM('teal','terra') NOT NULL DEFAULT 'teal'");
    }
}
