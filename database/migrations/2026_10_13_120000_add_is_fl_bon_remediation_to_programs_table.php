<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('programs', function (Blueprint $table) {
            if (!Schema::hasColumn('programs', 'is_fl_bon_remediation')) {
                $table->unsignedTinyInteger('is_fl_bon_remediation')->default(0)->after('featured');
            }
        });

        if (Schema::hasColumn('programs', 'featured') && Schema::hasColumn('programs', 'is_fl_bon_remediation')) {
            \Illuminate\Support\Facades\DB::table('programs')
                ->where('featured', 1)
                ->update(['is_fl_bon_remediation' => 1]);
        }
    }

    public function down(): void
    {
        Schema::table('programs', function (Blueprint $table) {
            if (Schema::hasColumn('programs', 'is_fl_bon_remediation')) {
                $table->dropColumn('is_fl_bon_remediation');
            }
        });
    }
};
