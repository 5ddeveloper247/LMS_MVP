<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSlogansToLoginPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('login_pages', function (Blueprint $table) {
            $table->text('slogans4')->default(null)->after('slogans3');
            $table->text('slogans5')->default(null)->after('slogans4');

            $table->text('reg_slogans4')->default(null)->after('reg_slogans3');
            $table->text('reg_slogans5')->default(null)->after('reg_slogans4');

            $table->text('forget_slogans4')->default(null)->after('forget_slogans3');
            $table->text('forget_slogans5')->default(null)->after('forget_slogans4');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('login_pages', function (Blueprint $table) {

        });
    }
}
