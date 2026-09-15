<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Student purchases of tutor session packages (credits + payment tracking).
 * Live: also run database/sql/create_tutor_session_package_purchases.sql
 */
class CreateTutorSessionPackagePurchasesTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('tutor_session_package_purchases')) {
            Schema::create('tutor_session_package_purchases', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('user_id');
                $table->unsignedBigInteger('package_id');
                $table->string('package_name', 150)->nullable();
                $table->unsignedInteger('sessions_allowed');
                $table->unsignedInteger('sessions_used')->default(0);
                $table->decimal('price', 10, 2);
                $table->string('tracking_id', 191)->nullable();
                $table->string('payment_method', 50)->default('authorizeNet');
                $table->boolean('status')->default(1);
                $table->json('selected_sessions')->nullable();
                $table->timestamps();

                $table->index(['user_id', 'status']);
                $table->index('package_id');
                $table->index('tracking_id');
            });
        }

        if (Schema::hasTable('tutor_hirings') && !Schema::hasColumn('tutor_hirings', 'package_purchase_id')) {
            Schema::table('tutor_hirings', function (Blueprint $table) {
                $table->unsignedBigInteger('package_purchase_id')->nullable()->after('tracking_id');
                $table->index('package_purchase_id');
            });
        }
    }

    public function down()
    {
        if (Schema::hasTable('tutor_hirings') && Schema::hasColumn('tutor_hirings', 'package_purchase_id')) {
            Schema::table('tutor_hirings', function (Blueprint $table) {
                $table->dropIndex(['package_purchase_id']);
                $table->dropColumn('package_purchase_id');
            });
        }

        Schema::dropIfExists('tutor_session_package_purchases');
    }
}
