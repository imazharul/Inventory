<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setting', function (Blueprint $table) {
            $table->bigIncrements('setting_id');
            $table->string('company_name');
            $table->string('company_address');
            $table->string('company_email');
            $table->string('company_phone');
            $table->string('company_logo');
            $table->string('company_mobile');
            $table->string('company_city');
            $table->string('company_country');
            $table->string('company_zipcode');
            
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
        Schema::dropIfExists('setting');
    }
}
