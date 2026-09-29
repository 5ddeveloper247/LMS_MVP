<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCePurchasesTable extends Migration
{
    public function up()
    {
        if (Schema::hasTable('ce_purchases')) {
            return;
        }

        Schema::create('ce_purchases', function (Blueprint $table) {
            $table->id();
            $table->string('tracking', 50);
            $table->unsignedInteger('checkout_id')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->enum('item_type', ['course', 'bundle']);
            $table->unsignedBigInteger('ce_course_id')->nullable();
            $table->unsignedBigInteger('ce_bundle_id')->nullable();
            $table->string('item_name');
            $table->enum('license_type', ['rn_lpn', 'aprn'])->nullable();
            $table->decimal('contact_hours', 4, 1)->nullable();
            $table->decimal('total_hours', 4, 1)->nullable();
            $table->decimal('elective_hours_allowed', 4, 1)->nullable();
            $table->decimal('unit_price', 10, 2)->default(0);
            $table->decimal('discount_amount', 10, 2)->default(0);
            $table->decimal('total_paid', 10, 2)->default(0);
            $table->string('coupon_code', 50)->nullable();
            $table->enum('payment_status', ['pending', 'paid', 'failed', 'refunded', 'cancelled'])->default('pending');
            $table->string('payment_method', 50)->nullable();
            $table->string('gateway_transaction_id', 100)->nullable();
            $table->unsignedInteger('lms_id')->default(1);
            $table->timestamp('purchased_at')->nullable();
            $table->timestamps();

            $table->index('tracking');
            $table->index('checkout_id');
            $table->index('user_id');
            $table->index('item_type');
            $table->index('payment_status');
            $table->index('ce_course_id');
            $table->index('ce_bundle_id');
            $table->index('lms_id');
            $table->index('purchased_at');

            $table->foreign('ce_course_id')
                ->references('id')
                ->on('ce_courses')
                ->restrictOnDelete();

            $table->foreign('ce_bundle_id')
                ->references('id')
                ->on('ce_bundles')
                ->restrictOnDelete();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ce_purchases');
    }
}
