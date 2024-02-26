<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterialSupportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('material_supports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('beneficiary_meterial')->nullable();
            $table->text('meterial_provided')->nullable();
            $table->integer('meterial_quantity')->nullable();
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
        Schema::dropIfExists('material_supports');
    }
}
