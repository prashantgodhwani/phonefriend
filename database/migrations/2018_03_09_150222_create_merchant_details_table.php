<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMerchantDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merchant_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('cname');
            $table->string('ckeypersonname');
            $table->text('caddress');
            $table->integer('deliver_cityid');
            $table->string('pincode');
            $table->string('cin');
            $table->string('caadhar');
            $table->string('gstin');
            $table->string('pan');
            $table->string('financial');
            $table->string('period');
            $table->integer('score');
            $table->string('marketedby');
            $table->string('aadharphoto');
            $table->string('mouphoto');
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
        Schema::dropIfExists('merchant_details');
    }
}
