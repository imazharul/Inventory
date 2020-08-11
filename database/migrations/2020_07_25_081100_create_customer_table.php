<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer', function (Blueprint $table) {
            $table->bigIncrements('customer_id');
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('phone');
            $table->string('shopname')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('bank_branch')->nullable();
            $table->string('bank_holder')->nullable();
            $table->string('bank_number')->nullable();
            $table->string('city')->nullable();
            $table->string('address');
            $table->string('photo')->nullable();
            $table->integer('status');
           
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
        Schema::dropIfExists('customer');
    }
}
