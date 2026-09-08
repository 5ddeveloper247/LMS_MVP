<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopBundleProductsTable extends Migration
{
    /**
     * Run the migrations.
     * Links a bundle to many shop products (Books, Guides, Tools, Merchandise).
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_bundle_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bundle_id');
            $table->unsignedBigInteger('product_id');
            $table->timestamps();

            $table->foreign('bundle_id')
                ->references('id')
                ->on('shop_bundles')
                ->onDelete('cascade');

            $table->foreign('product_id')
                ->references('id')
                ->on('shop_products')
                ->onDelete('cascade');

            $table->unique(['bundle_id', 'product_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_bundle_products');
    }
}
