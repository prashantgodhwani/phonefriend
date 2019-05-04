<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('tracking_id')->nullable();
            $table->string('bank_ref_no')->nullable();
            $table->text('card_name')->nullable();
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('amount')->unsigned();
            $table->integer('nop')->unsigned();
            $table->string('deliver_fname');
            $table->string('deliver_lname');
            $table->string('deliver_phone');
            $table->text('deliver_add1');
            $table->text('deliver_add2');
            $table->integer('deliver_cityid');
            $table->text('postcode');
            $table->text('payment_mode');
            $table->string('order_status');
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
