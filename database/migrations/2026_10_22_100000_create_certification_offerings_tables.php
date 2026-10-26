<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Life-support / certification offerings (admin CMS).
 * Hybrid delivery uses rows in certification_offering_delivery_parts (online + in_person).
 *
 * Live deploy: database/sql/deploy_certification_offerings_live.sql
 */
class CreateCertificationOfferingsTables extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('certification_offerings')) {
            Schema::create('certification_offerings', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('slug')->unique();
                $table->longText('content');
                $table->enum('delivery_mode', ['in_person', 'online', 'hybrid'])->default('in_person');
                $table->string('duration_summary', 150)->nullable()->comment('Optional overall label for admin/list');
                $table->unsignedTinyInteger('status')->default(1)->comment('0=inactive, 1=active');
                $table->unsignedInteger('sort_order')->default(0);
                $table->timestamps();
                $table->softDeletes();

                $table->index(['status', 'sort_order']);
            });
        }

        if (!Schema::hasTable('certification_offering_delivery_parts')) {
            Schema::create('certification_offering_delivery_parts', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('certification_offering_id');
                $table->enum('part_type', ['online', 'in_person']);
                $table->string('duration', 100);
                $table->string('session_label', 255)->nullable();
                $table->text('notes')->nullable();
                $table->unsignedTinyInteger('sort_order')->default(0);
                $table->timestamps();

                $table->foreign('certification_offering_id', 'cert_delivery_parts_offering_fk')
                    ->references('id')
                    ->on('certification_offerings')
                    ->onDelete('cascade');

                $table->index(['certification_offering_id', 'sort_order'], 'cert_delivery_parts_offering_sort_idx');
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('certification_offering_delivery_parts');
        Schema::dropIfExists('certification_offerings');
    }
}
