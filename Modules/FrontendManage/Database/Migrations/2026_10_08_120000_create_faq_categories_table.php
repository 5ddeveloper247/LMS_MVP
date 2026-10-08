<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFaqCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('faq_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->index();
            $table->string('eyebrow')->nullable();
            $table->string('section_title')->nullable();
            $table->integer('status')->default(1);
            $table->integer('order')->default(9999999);
            $table->timestamps();
        });

        Schema::table('home_page_faqs', function (Blueprint $table) {
            $table->unsignedBigInteger('faq_category_id')->nullable()->after('id');
            $table->foreign('faq_category_id')->references('id')->on('faq_categories')->nullOnDelete();
        });
    }

    public function down()
    {
        Schema::table('home_page_faqs', function (Blueprint $table) {
            $table->dropForeign(['faq_category_id']);
            $table->dropColumn('faq_category_id');
        });

        Schema::dropIfExists('faq_categories');
    }
}
