<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParcelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parcels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('merchent_id');
            $table->unsignedBigInteger('parcel_type_id');
            $table->unsignedBigInteger('delivery_type_id')->nullable();
            $table->unsignedBigInteger('pick_up_zone_id');
            $table->integer('weight');
            $table->float('price');
            $table->integer('delivery_fee');
            $table->float('amount');
            $table->string('cod_charge');
            $table->string('pickup_number');
            $table->string('pick_up_address');
            $table->tinyInteger('status');
            $table->string('invoice_no');
            $table->timestamps();
        });
        Schema::table('parcels', function (Blueprint $table) {
            $table->foreign('merchent_id')->references('id')->on('merchents')->onDelete('cascade');
            $table->foreign('parcel_type_id')->references('id')->on('parcel_types')->onDelete('cascade');
            $table->foreign('delivery_type_id')->references('id')->on('delivery_zones')->onDelete('cascade');
            $table->foreign('pick_up_zone_id')->references('id')->on('pick_up_zones')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parcels');
    }
}
