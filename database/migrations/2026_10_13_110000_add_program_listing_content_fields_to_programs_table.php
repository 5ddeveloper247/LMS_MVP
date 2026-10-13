<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProgramListingContentFieldsToProgramsTable extends Migration
{
    public function up()
    {
        Schema::table('programs', function (Blueprint $table) {
            if (!Schema::hasColumn('programs', 'what_its_for')) {
                $table->longText('what_its_for')->nullable()->after('featured_meta_since');
            }
            if (!Schema::hasColumn('programs', 'what_makes_different')) {
                $table->longText('what_makes_different')->nullable()->after('what_its_for');
            }
            if (!Schema::hasColumn('programs', 'what_you_will_learn')) {
                $table->longText('what_you_will_learn')->nullable()->after('what_makes_different');
            }
            if (!Schema::hasColumn('programs', 'signature_features')) {
                $table->longText('signature_features')->nullable()->after('what_you_will_learn');
            }
            if (!Schema::hasColumn('programs', 'programs_page_eyebrow')) {
                $table->string('programs_page_eyebrow', 255)->nullable()->after('signature_features');
            }
        });
    }

    public function down()
    {
        Schema::table('programs', function (Blueprint $table) {
            foreach (['what_its_for', 'what_makes_different', 'what_you_will_learn', 'signature_features', 'programs_page_eyebrow'] as $column) {
                if (Schema::hasColumn('programs', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
}
