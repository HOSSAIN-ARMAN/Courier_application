<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMerchentMobileBankInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merchent_mobile_bank_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('merchent_id');
            $table->string('mobile_bank_name');
            $table->string('account_no');
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
        Schema::dropIfExists('merchent_mobile_bank_infos');
    }
}
