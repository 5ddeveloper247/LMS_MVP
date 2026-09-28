<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * CE courses catalog — prep-course parity + Florida CE fields.
 * Live deploy: also run database/sql/create_ce_courses_tables.sql
 */
class CreateCeCoursesTable extends Migration
{
    public function up()
    {
        if (Schema::hasTable('ce_courses')) {
            return;
        }

        Schema::create('ce_courses', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->string('slug')->unique();
            $table->longText('about')->nullable();
            $table->longText('outcomes')->nullable();
            $table->longText('requirements')->nullable();
            $table->string('course_code', 100)->nullable()->unique();

            $table->unsignedBigInteger('user_id');
            $table->text('assistant_instructors')->nullable();

            $table->unsignedInteger('category_id')->nullable();
            $table->unsignedInteger('lang_id')->nullable()->default(19);

            $table->string('image')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('trailer_link')->nullable();
            $table->string('duration', 100)->nullable();

            $table->decimal('price', 10, 2)->default(0);
            $table->decimal('discount_price', 10, 2)->nullable();
            $table->decimal('tax', 10, 2)->nullable()->default(0);

            $table->text('what_learn1')->nullable();
            $table->text('what_learn2')->nullable();

            $table->unsignedTinyInteger('level')->nullable()->default(4);
            $table->string('meta_keywords')->nullable();
            $table->text('meta_description')->nullable();

            $table->unsignedInteger('total_enrolled')->default(0);
            $table->decimal('review_avg', 3, 2)->default(0);
            $table->unsignedInteger('view_count')->default(0);

            $table->boolean('status')->default(true);
            $table->boolean('publish')->default(true);
            $table->boolean('is_featured')->default(false);
            $table->integer('seq_no')->nullable();

            $table->decimal('contact_hours', 4, 1)->default(0);
            $table->enum('course_type', ['mandatory', 'elective'])->default('elective');
            $table->json('audience')->nullable();
            $table->string('compliance_topic', 150)->nullable();
            $table->string('ce_broker_course_id', 50)->nullable();

            $table->unsignedInteger('course_id')->nullable()->comment('Optional FK → courses.id for chapters/lessons');

            $table->unsignedInteger('lms_id')->default(1);
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();

            $table->timestamps();

            $table->index('user_id');
            $table->index('category_id');
            $table->index('course_type');
            $table->index('status');
            $table->index('course_id');
            $table->index('contact_hours');
        });
    }

    public function down()
    {
        Schema::dropIfExists('ce_courses');
    }
}
