<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->bigIncrements('product_id');
            $table->integer('cat_id');
            $table->integer('sup_id');
            $table->string('product_name');
            $table->string('product_code');
            $table->string('product_garage');
            $table->string('product_route');
            $table->string('product_image');
            $table->string('product_buy_date');
            $table->string('product_expire_date');
            $table->string('product_buying_price');
            $table->string('product_selling_price');
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
        Schema::dropIfExists('product');
    }
}
