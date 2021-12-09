<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('age')->nullable();
            $table->integer('gender_male')->nullable();
            $table->integer('gender_female')->nullable();
            $table->integer('disability_male')->nullable();
            $table->integer('disability_female')->nullable();
            $table->integer('sinhala')->nullable();
            $table->integer('tamil')->nullable();
            $table->integer('muslim')->nullable();
            $table->integer('other_ethnicity')->nullable();
            $table->unsignedBigInteger('completion_report_id')->nullable();
            $table->foreign('completion_report_id')->references('id')->on('completion_reports')->onDelete('cascade');
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
        Schema::dropIfExists('participants');
    }
}
