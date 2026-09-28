<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * CE user enrollments — progress, completion, certificates, CE Broker reporting.
 * Live deploy: also run database/sql/create_ce_courses_tables.sql
 */
class CreateCeCourseEnrollmentsTable extends Migration
{
    public function up()
    {
        if (Schema::hasTable('ce_course_enrollments')) {
            return;
        }

        Schema::create('ce_course_enrollments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('ce_course_id');
            $table->unsignedTinyInteger('progress')->default(0);
            $table->enum('status', ['not_started', 'in_progress', 'completed'])->default('not_started');
            $table->decimal('purchase_price', 10, 2)->nullable();
            $table->timestamp('completed_at')->nullable();
            $table->string('certificate_path')->nullable();
            $table->timestamp('ce_broker_reported_at')->nullable();
            $table->timestamps();

            $table->unique(['user_id', 'ce_course_id']);
            $table->index('ce_course_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('ce_course_enrollments');
    }
}
