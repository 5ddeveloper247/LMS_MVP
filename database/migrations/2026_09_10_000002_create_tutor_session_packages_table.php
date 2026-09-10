<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Session pricing packages for the public Tutoring page.
 * Live deploy: also add matching SQL under database/sql/ (do not rely on migrate on production).
 */
class CreateTutorSessionPackagesTable extends Migration
{
    public function up()
    {
        if (Schema::hasTable('tutor_session_packages')) {
            return;
        }

        Schema::create('tutor_session_packages', function (Blueprint $table) {
            $table->id();
            $table->string('heading', 100);
            $table->string('name', 150);
            $table->text('description')->nullable();
            $table->string('price_note', 255)->nullable();
            $table->string('line_1', 255)->nullable();
            $table->string('line_2', 255)->nullable();
            $table->string('line_3', 255)->nullable();
            $table->string('line_4', 255)->nullable();
            $table->string('line_5', 255)->nullable();
            $table->unsignedInteger('sessions_count');
            $table->decimal('price', 10, 2);
            $table->boolean('is_featured')->default(0);
            $table->integer('sort_order')->default(0);
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tutor_session_packages');
    }
}
