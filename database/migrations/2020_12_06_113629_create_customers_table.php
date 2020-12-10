<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('merchent_id');
            $table->unsignedBigInteger('delivery_zone_id');
            $table->unsignedBigInteger('parcel_id');
            $table->string('customer_name');
            $table->string('customer_contact');
            $table->string('customer_address');
            $table->string('customer_comments');
            $table->timestamps();
        });
        Schema::table('customers', function (Blueprint $table) {
            $table->foreign('merchent_id')->references('id')->on('merchents')->onDelete('cascade');
            $table->foreign('delivery_zone_id')->references('id')->on('delivery_zones')->onDelete('cascade');
            $table->foreign('parcel_id')->references('id')->on('parcels')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
