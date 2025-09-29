<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_products', function (Blueprint $table) {
            $table->id();
            $table->enum('type', [1, 2])->comment('1 = Product, 2 = Book');
            $table->string('title');
            $table->string('sub_title')->nullable();
            $table->string('short_description', 500);
            $table->text('description')->nullable();

            $table->decimal('price', 10, 2)->default(0);
            $table->decimal('tax_percent', 5, 2)->default(0);
            $table->enum('discount_type', ['fixed', 'percent'])->nullable();
            $table->decimal('discount', 10, 2)->nullable();

            // Book specific fields
            $table->string('author')->nullable();
            $table->string('publisher')->nullable();
            $table->date('publication_date')->nullable();
            $table->string('book_pdf')->nullable();

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
        Schema::dropIfExists('shop_products');
    }
}
