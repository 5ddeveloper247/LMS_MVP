<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddResourceFileFieldsToResourceTabsTable extends Migration
{
    public function up()
    {
        Schema::table('resource_tabs', function (Blueprint $table) {
            if (!Schema::hasColumn('resource_tabs', 'short_description')) {
                $table->text('short_description')->nullable()->after('name');
            }
            if (!Schema::hasColumn('resource_tabs', 'category')) {
                $table->string('category', 32)->default('student')->after('short_description');
            }
            if (!Schema::hasColumn('resource_tabs', 'file_path')) {
                $table->string('file_path')->nullable()->after('category');
            }
            if (!Schema::hasColumn('resource_tabs', 'is_featured')) {
                $table->boolean('is_featured')->default(false)->after('file_path');
            }
        });
    }

    public function down()
    {
        Schema::table('resource_tabs', function (Blueprint $table) {
            $columns = ['short_description', 'category', 'file_path', 'is_featured'];
            foreach ($columns as $column) {
                if (Schema::hasColumn('resource_tabs', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
}
