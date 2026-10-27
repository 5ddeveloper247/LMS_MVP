<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('certification_offering_sessions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('certification_offering_id');
            $table->unsignedBigInteger('certification_offering_option_id')->nullable();
            $table->dateTime('starts_at');
            $table->dateTime('ends_at')->nullable();
            $table->string('title', 255);
            $table->string('subtitle', 255)->nullable();
            $table->string('location', 255)->nullable();
            $table->unsignedInteger('capacity')->nullable();
            $table->unsignedTinyInteger('status')->default(1)->comment('0=inactive, 1=active');
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();

            $table->index(['certification_offering_id', 'status', 'starts_at'], 'cert_sessions_offering_book_idx');
            $table->index('certification_offering_option_id', 'cert_sessions_option_idx');

            $table->foreign('certification_offering_id', 'cert_sessions_offering_fk')
                ->references('id')->on('certification_offerings')
                ->onDelete('cascade');

            $table->foreign('certification_offering_option_id', 'cert_sessions_option_fk')
                ->references('id')->on('certification_offering_options')
                ->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('certification_offering_sessions');
    }
};
