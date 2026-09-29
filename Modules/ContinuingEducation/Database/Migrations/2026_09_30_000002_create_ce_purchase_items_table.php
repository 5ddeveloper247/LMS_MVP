<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCePurchaseItemsTable extends Migration
{
    public function up()
    {
        if (Schema::hasTable('ce_purchase_items')) {
            return;
        }

        Schema::create('ce_purchase_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ce_purchase_id');
            $table->unsignedBigInteger('ce_course_id');
            $table->string('course_title');
            $table->decimal('contact_hours', 4, 1)->default(0);
            $table->enum('course_role', ['mandatory', 'elective'])->default('mandatory');
            $table->integer('sort_order')->default(0);
            $table->unsignedBigInteger('ce_course_enrollment_id')->nullable();
            $table->timestamps();

            $table->index('ce_purchase_id');
            $table->index('ce_course_id');
            $table->index('ce_course_enrollment_id');

            $table->foreign('ce_purchase_id')
                ->references('id')
                ->on('ce_purchases')
                ->cascadeOnDelete();

            $table->foreign('ce_course_id')
                ->references('id')
                ->on('ce_courses')
                ->restrictOnDelete();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ce_purchase_items');
    }
}
