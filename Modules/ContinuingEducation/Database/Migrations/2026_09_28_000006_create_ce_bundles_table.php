<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCeBundlesTable extends Migration
{
    public function up()
    {
        if (Schema::hasTable('ce_bundles')) {
            return;
        }

        Schema::create('ce_bundles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('subtitle')->nullable();
            $table->string('slug')->nullable()->unique();
            $table->string('component_1');
            $table->string('component_2');
            $table->string('component_3');
            $table->string('component_4');
            $table->string('component_5');
            $table->string('component_6');
            $table->decimal('total_hours', 4, 1)->default(0);
            $table->decimal('elective_hours_allowed', 4, 1)->default(0);
            $table->decimal('price', 10, 2)->default(0);
            $table->decimal('compare_at_price', 10, 2)->nullable();
            $table->enum('license_type', ['rn_lpn', 'aprn'])->default('rn_lpn');
            $table->enum('card_style', ['primary', 'secondary'])->default('primary');
            $table->boolean('is_best_seller')->default(false);
            $table->integer('seq_no')->nullable();
            $table->boolean('status')->default(true);
            $table->boolean('publish')->default(true);
            $table->boolean('featured')->default(false);
            $table->unsignedInteger('lms_id')->default(1);
            $table->timestamps();

            $table->index('license_type');
            $table->index('card_style');
            $table->index('is_best_seller');
            $table->index('status');
            $table->index('publish');
            $table->index('featured');
            $table->index('seq_no');
            $table->index('lms_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('ce_bundles');
    }
}
