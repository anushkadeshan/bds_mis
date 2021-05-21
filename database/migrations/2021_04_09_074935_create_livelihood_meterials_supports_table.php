<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLivelihoodMeterialsSupportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('livelihood_meterials_supports', function (Blueprint $table) {
            $table->id();
            $table->string('beneficiary_name', 100)->nullable();
            $table->text('meterial')->nullable();
            $table->integer('quantity',)->nullable();
            $table->integer('livelihood_id')->unsigned()->nullable();
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
        Schema::dropIfExists('livelihood_meterials_supports');
    }
}
