<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBankingToMerchantDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('merchant_details', function($table) {
            $table->string('account');
            $table->string('bank');
            $table->string('ifsc');
            $table->string('beneficiary');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('merchant_details', function($table) {
            $table->dropColumn('account');
            $table->dropColumn('bank');
            $table->dropColumn('ifsc');
            $table->dropColumn('beneficiary');
        });
    }
}
