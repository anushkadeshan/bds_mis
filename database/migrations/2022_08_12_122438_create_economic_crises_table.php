<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEconomicCrisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('economic_crises', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('livelihood_family_id')->nullable();
            $table->foreign('livelihood_family_id')->references('id')->on('livelihood_families')->onDelete('cascade');
            $table->string('money_order_scanned_copy')->nullable();
            $table->string('money_order_offer_picture')->nullable();
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
        Schema::dropIfExists('economic_crises');
    }
}
