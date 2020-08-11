<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmplyeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emplyee', function (Blueprint $table) {
            $table->bigIncrements('emplyee_id');
            $table->string('name');
            $table->string('email');
            $table->string('n_id');
            $table->string('phone');
            $table->string('experience');
            $table->string('salary');
            $table->string('vacation');
            $table->string('city');
            $table->string('address');
            $table->string('photo');
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
        Schema::dropIfExists('emplyee');
    }
}
