<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestosteronesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testosterones', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('productName', 100);
            $table->unsignedBigInteger('brand');
            $table->string('weight', 20);
            $table->unsignedBigInteger('mainCategory');
            $table->unsignedBigInteger('subCategory');
            $table->integer('priceStore');
            $table->integer('priceShop');
            $table->integer('priceSale')->nullable();
            $table->text('pictures');
            $table->text('avatar');
            $table->text('description');
            $table->integer('available');
            $table->integer('saleCount');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('brand')->references('id')->on('testosterone_brands');
            $table->foreign('mainCategory')->references('id')->on('testosterone_main_categories');
            $table->foreign('subCategory')->references('id')->on('testosterone_sub_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('testosterones');
    }
}
