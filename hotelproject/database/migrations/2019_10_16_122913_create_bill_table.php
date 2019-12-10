<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bill', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('servicedetail_id');
            $table->unsignedBigInteger('booking_id');
            $table->bigInteger('price_room');
            $table->bigInteger('price_service');
            $table->timestamps();

            $table->foreign('servicedetail_id')->references('id')->on('servicedetail')->onDelete('cascade');
            $table->foreign('booking_id')->references('id')->on('booking')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bill');
    }
}
