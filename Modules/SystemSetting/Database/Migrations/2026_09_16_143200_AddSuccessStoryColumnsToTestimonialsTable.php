<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSuccessStoryColumnsToTestimonialsTable extends Migration
{
    public function up()
    {
        Schema::table('testimonials', function (Blueprint $table) {
            if (!Schema::hasColumn('testimonials', 'email')) {
                $table->string('email')->nullable()->after('profession');
            }
            if (!Schema::hasColumn('testimonials', 'passing_year')) {
                $table->string('passing_year', 10)->nullable()->after('email');
            }
            if (!Schema::hasColumn('testimonials', 'program_type')) {
                $table->string('program_type', 50)->nullable()->after('passing_year');
            }
            if (!Schema::hasColumn('testimonials', 'source')) {
                $table->string('source', 20)->default('admin')->after('program_type');
            }
            if (!Schema::hasColumn('testimonials', 'featured')) {
                $table->boolean('featured')->default(false)->after('source');
            }
        });
    }

    public function down()
    {
        Schema::table('testimonials', function (Blueprint $table) {
            $columns = ['email', 'passing_year', 'program_type', 'source', 'featured'];
            foreach ($columns as $column) {
                if (Schema::hasColumn('testimonials', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
}
