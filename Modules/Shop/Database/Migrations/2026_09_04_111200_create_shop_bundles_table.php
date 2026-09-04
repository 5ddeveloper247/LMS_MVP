<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopBundlesTable extends Migration
{
    /**
     * Run the migrations.
     * Savings & Bundles under Shop Products module.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_bundles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('short_description', 500)->nullable();

            $table->string('component_1')->nullable();
            $table->string('component_2')->nullable();
            $table->string('component_3')->nullable();
            $table->string('component_4')->nullable();

            $table->decimal('price', 10, 2)->default(0);
            $table->decimal('tax_percent', 5, 2)->default(0);
            $table->enum('discount_type', ['fixed', 'percent'])->nullable();
            $table->decimal('discount', 10, 2)->nullable();

            $table->decimal('total_amount', 10, 2)->default(0);
            $table->decimal('total_tax', 10, 2)->default(0);
            $table->decimal('total_discount', 10, 2)->default(0);

            $table->boolean('status')->default(1)->comment('1 = active, 0 = inactive');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_bundles');
    }
}
