<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('data_id')->unsigned()->index();
            $table->foreign('data_id')->references('id')->on('data')->onDelete('cascade');
            $table->string('imei1');
            $table->string('imei2')->nullable();
            $table->string('age');
            $table->integer('price');
            $table->string('dp');
            $table->integer('sold')->default(0);
            $table->integer('visibility');
            $table->string('physical_condition');
            $table->text('remarks')->nullable();
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
        Schema::dropIfExists('phones');
    }
}
