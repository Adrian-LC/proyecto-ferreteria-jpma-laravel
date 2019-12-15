<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedDecimal('price_o', 8, 2)->nullable();
            $table->unsignedInteger('quantity');
            $table->unsignedBigInteger('user_id_o');
            $table->unsignedBigInteger('order_number_id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('sale_id')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
