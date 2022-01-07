<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgressTrackingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('progress_trackings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('action')->nullable();
            $table->unsignedBigInteger('action_by');
            $table->foreign('action_by')->references('id')->on('users')->onDelete('cascade');
            $table->string('action_date')->nullable();
            $table->unsignedBigInteger('progress_id');
            $table->foreign('progress_id')->references('id')->on('progress')->onDelete('cascade');
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
        Schema::dropIfExists('progress_trackings');
    }
}
