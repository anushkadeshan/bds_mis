<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAwarnessCSOSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('awarness_csos', function (Blueprint $table) {
            $table->id();
            $table->string('name',255);
            $table->integer('male')->nullable();
            $table->integer('female')->nullable();
            $table->integer('awarness_id')->nullable();
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
        Schema::dropIfExists('awarness_c_s_o_s');
    }
}
