<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProgramsPageFieldsToProgramsTable extends Migration
{
    public function up()
    {
        Schema::table('programs', function (Blueprint $table) {
            if (!Schema::hasColumn('programs', 'short_description')) {
                $table->text('short_description')->nullable()->after('subtitle');
            }
            if (!Schema::hasColumn('programs', 'featured_eyebrow')) {
                $table->string('featured_eyebrow', 255)->nullable()->after('short_description');
            }
            if (!Schema::hasColumn('programs', 'featured_headline')) {
                $table->string('featured_headline', 500)->nullable()->after('featured_eyebrow');
            }
            if (!Schema::hasColumn('programs', 'featured_meta_specialty')) {
                $table->string('featured_meta_specialty', 255)->nullable()->after('featured_headline');
            }
            if (!Schema::hasColumn('programs', 'featured_meta_format')) {
                $table->string('featured_meta_format', 255)->nullable()->after('featured_meta_specialty');
            }
            if (!Schema::hasColumn('programs', 'featured_meta_since')) {
                $table->string('featured_meta_since', 255)->nullable()->after('featured_meta_format');
            }
        });
    }

    public function down()
    {
        Schema::table('programs', function (Blueprint $table) {
            $columns = [
                'short_description',
                'featured_eyebrow',
                'featured_headline',
                'featured_meta_specialty',
                'featured_meta_format',
                'featured_meta_since',
            ];
            foreach ($columns as $column) {
                if (Schema::hasColumn('programs', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
}
