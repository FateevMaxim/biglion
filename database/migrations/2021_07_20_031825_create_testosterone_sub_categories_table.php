<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestosteroneSubCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testosterone_sub_categories', function (Blueprint $table) {
            $table->id();
            $table->string('sub_category', 50);
            $table->string('sub_category_img');
            $table->unsignedBigInteger('main_category_link');

            $table->foreign('main_category_link')->references('id')->on('testosterone_main_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('testosterone_sub_categories');
    }
}
