<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCeLicenseTypesTable extends Migration
{
    public function up()
    {
        if (Schema::hasTable('ce_license_types')) {
            return;
        }

        Schema::create('ce_license_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('subtitle')->nullable();
            $table->text('description')->nullable();
            $table->string('component_1');
            $table->string('component_2');
            $table->string('component_3');
            $table->enum('card_style', ['teal', 'terra'])->default('teal');
            $table->string('button_label')->nullable();
            $table->string('button_url')->nullable();
            $table->string('anchor_id', 100)->nullable();
            $table->integer('seq_no')->nullable();
            $table->boolean('status')->default(true);
            $table->boolean('publish')->default(true);
            $table->unsignedInteger('lms_id')->default(1);
            $table->timestamps();

            $table->index('status');
            $table->index('publish');
            $table->index('seq_no');
            $table->index('lms_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('ce_license_types');
    }
}
