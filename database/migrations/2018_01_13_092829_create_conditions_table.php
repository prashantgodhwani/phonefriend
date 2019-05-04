<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConditionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conditions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('condition');
            $table->timestamps();
        });

        Schema::create('condition_phone', function (Blueprint $table) {
            $table->integer('condition_id')->unsigned()->index();
            $table->foreign('condition_id')->references('id')->on('conditions')->onDelete('cascade');
            $table->integer('phone_id')->unsigned()->index();
            $table->foreign('phone_id')->references('id')->on('phones')->onDelete('cascade');
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
        Schema::dropIfExists('condition_phone');
        Schema::dropIfExists('conditions');
    }
}
