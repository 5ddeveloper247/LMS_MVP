<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddFeaturedToCeLicenseTypesTable extends Migration
{
    public function up()
    {
        if (! Schema::hasTable('ce_license_types')) {
            return;
        }

        if (! Schema::hasColumn('ce_license_types', 'featured')) {
            Schema::table('ce_license_types', function (Blueprint $table) {
                $table->boolean('featured')->default(false)->after('publish');
                $table->index('featured');
            });
        }

        DB::table('ce_license_types')
            ->whereIn('anchor_id', ['rn-lpn-packages', 'aprn-packages'])
            ->update(['featured' => true]);
    }

    public function down()
    {
        if (! Schema::hasTable('ce_license_types') || ! Schema::hasColumn('ce_license_types', 'featured')) {
            return;
        }

        Schema::table('ce_license_types', function (Blueprint $table) {
            $table->dropIndex(['featured']);
            $table->dropColumn('featured');
        });
    }
}
