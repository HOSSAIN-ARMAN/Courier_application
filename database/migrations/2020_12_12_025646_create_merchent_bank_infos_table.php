<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMerchentBankInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merchent_bank_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('merchent_id');
            $table->string('bank_name');
            $table->string('account_no');
            $table->string('routing_no');
            $table->string('card_no');
            $table->string('branch_name');
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
        Schema::dropIfExists('merchent_bank_infos');
    }
}
