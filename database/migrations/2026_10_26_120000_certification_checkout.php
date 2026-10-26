<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Certification enroll → shared carts / checkouts flow.
 * Live deploy: database/sql/deploy_certification_checkout_live.sql
 */
class CertificationCheckout extends Migration
{
    public function up()
    {
        if (Schema::hasTable('carts')) {
            Schema::table('carts', function (Blueprint $table) {
                if (! Schema::hasColumn('carts', 'certification_offering_id')) {
                    $table->unsignedBigInteger('certification_offering_id')->nullable()->after('ce_elective_course_ids');
                    $table->index('certification_offering_id', 'carts_cert_offering_idx');
                }
                if (! Schema::hasColumn('carts', 'certification_offering_option_id')) {
                    $table->unsignedBigInteger('certification_offering_option_id')->nullable()->after('certification_offering_id');
                    $table->index('certification_offering_option_id', 'carts_cert_option_idx');
                }
                if (! Schema::hasColumn('carts', 'certification_enrollment_data')) {
                    $table->json('certification_enrollment_data')->nullable()->after('certification_offering_option_id');
                }
            });
        }

        if (! Schema::hasTable('certification_enrollments')) {
            Schema::create('certification_enrollments', function (Blueprint $table) {
                $table->id();
                $table->string('tracking', 64)->index();
                $table->unsignedBigInteger('checkout_id')->nullable()->index();
                $table->unsignedBigInteger('user_id')->index();
                $table->unsignedBigInteger('certification_offering_id')->index();
                $table->unsignedBigInteger('certification_offering_option_id')->index();
                $table->string('option_title', 150);
                $table->decimal('unit_price', 10, 2)->default(0);
                $table->decimal('discount_amount', 10, 2)->default(0);
                $table->decimal('total_paid', 10, 2)->default(0);
                $table->string('payment_status', 32)->default('pending');
                $table->string('payment_method', 64)->nullable();
                $table->string('gateway_transaction_id', 191)->nullable();
                $table->json('enrollment_data')->nullable();
                $table->unsignedTinyInteger('status')->default(0)->comment('0=pending, 1=confirmed');
                $table->timestamps();

                $table->foreign('certification_offering_id', 'cert_enroll_offering_fk')
                    ->references('id')
                    ->on('certification_offerings')
                    ->onDelete('restrict');
                $table->foreign('certification_offering_option_id', 'cert_enroll_option_fk')
                    ->references('id')
                    ->on('certification_offering_options')
                    ->onDelete('restrict');
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('certification_enrollments');

        if (Schema::hasTable('carts')) {
            Schema::table('carts', function (Blueprint $table) {
                foreach (['certification_enrollment_data', 'certification_offering_option_id', 'certification_offering_id'] as $col) {
                    if (Schema::hasColumn('carts', $col)) {
                        $table->dropColumn($col);
                    }
                }
            });
        }
    }
}
