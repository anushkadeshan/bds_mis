<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBudgetTrackingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('budget_trackings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('action')->nullable();
            $table->unsignedBigInteger('action_by');
            $table->foreign('action_by')->references('id')->on('users')->onDelete('cascade');
            $table->string('action_date')->nullable();
            $table->unsignedBigInteger('budget_id');
            $table->foreign('budget_id')->references('id')->on('budgets')->onDelete('cascade');
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
        Schema::dropIfExists('budget_trackings');
    }
}
