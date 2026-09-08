<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstructorsSchoolInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instructors_school_info', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('high_school', 255)->nullable();
            $table->date('school_years_attended')->nullable();
            $table->string('school_year_graduate', 255)->nullable();
            $table->string('school_degree', 255)->nullable();
            $table->string('college', 255)->nullable();
            $table->string('email', 255)->nullable();
            $table->string('college_graduate', 255)->nullable();
            $table->string('trade_school', 255)->nullable();
            $table->string('trade_degree', 255)->nullable();
            $table->string('trade_years_attended', 255)->nullable();
            $table->string('trade_year_graduate', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('instructors_school_info');
    }
}
