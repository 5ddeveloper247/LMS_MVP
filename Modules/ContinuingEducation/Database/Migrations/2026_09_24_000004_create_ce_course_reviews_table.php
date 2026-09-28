<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * CE course reviews — mirrors course_reveiws for ce_courses.
 * Live deploy: also run database/sql/create_ce_courses_tables.sql
 */
class CreateCeCourseReviewsTable extends Migration
{
    public function up()
    {
        if (Schema::hasTable('ce_course_reviews')) {
            return;
        }

        Schema::create('ce_course_reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ce_course_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('instructor_id')->nullable();
            $table->decimal('star', 2, 1)->default(5.0);
            $table->text('comment');
            $table->boolean('status')->default(true);
            $table->timestamps();

            $table->index('ce_course_id');
            $table->index('user_id');
            $table->unique(['ce_course_id', 'user_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('ce_course_reviews');
    }
}
