<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConstructionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('constructions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type_of_construction')->nullable();
            $table->string('target_group')->nullable();
            $table->string('selected_target_group')->nullable();
            $table->string('individual_id')->nullable();
            $table->string('current_status')->nullable();
            $table->text('remarks')->nullable();
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
        Schema::dropIfExists('constructions');
    }
}
