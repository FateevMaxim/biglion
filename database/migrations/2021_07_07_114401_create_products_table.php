<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('categoryName', 100);
            $table->unsignedBigInteger('brand');
            $table->string('weight', 20);
            $table->unsignedBigInteger('taste');
            $table->integer('priceStore');
            $table->integer('priceShop');
            $table->integer('priceSale')->nullable();
            $table->unsignedBigInteger('categoryNutrition');
            $table->unsignedBigInteger('purpose');
            $table->text('pictures');
            $table->text('avatar');
            $table->text('description');
            $table->integer('available');
            $table->integer('saleCount');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('brand')->references('id')->on('products_brands');
            $table->foreign('taste')->references('id')->on('products_tastes');
            $table->foreign('categoryNutrition')->references('id')->on('products_categories');
            $table->foreign('purpose')->references('id')->on('products_purposes');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
