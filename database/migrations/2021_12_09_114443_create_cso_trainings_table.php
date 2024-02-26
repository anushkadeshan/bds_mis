<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCsoTrainingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cso_trainings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cso_name')->nullable();
            $table->integer('cso_male')->nullable();
            $table->integer('cso_female')->nullable();
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
        Schema::dropIfExists('cso_trainings');
    }
}
