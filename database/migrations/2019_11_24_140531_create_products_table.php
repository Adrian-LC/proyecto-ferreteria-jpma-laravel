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
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name_p');
            $table->unsignedDecimal('price_p', 8, 2);
            $table->unsignedInteger('offer');
            $table->text('detail');
            $table->string('poster');
            $table->unsignedInteger('stock');
            $table->tinyInteger('new');
            $table->tinyInteger('state_p');
            $table->unsignedInteger('total_purchased');
            $table->unsignedBigInteger('product_category_id');
            $table->timestamps();
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
