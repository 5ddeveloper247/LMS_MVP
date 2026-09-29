<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCeBundleCoursesTable extends Migration
{
    public function up()
    {
        if (Schema::hasTable('ce_bundle_courses')) {
            return;
        }

        Schema::create('ce_bundle_courses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ce_bundle_id');
            $table->unsignedBigInteger('ce_course_id');
            $table->enum('course_role', ['mandatory', 'elective'])->default('mandatory');
            $table->integer('sort_order')->default(0);
            $table->timestamps();

            $table->unique(['ce_bundle_id', 'ce_course_id']);
            $table->index('ce_bundle_id');
            $table->index('ce_course_id');
            $table->index('course_role');

            $table->foreign('ce_bundle_id')
                ->references('id')
                ->on('ce_bundles')
                ->onDelete('cascade');

            $table->foreign('ce_course_id')
                ->references('id')
                ->on('ce_courses')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('ce_bundle_courses');
    }
}
