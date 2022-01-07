<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('progress', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('activity_code',100);
            $table->unsignedBigInteger('project_id')->nullable();
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->unsignedBigInteger('pre_condition_id')->nullable();
            $table->foreign('pre_condition_id')->references('id')->on('pre_conditions')->onDelete('cascade');
            $table->unsignedBigInteger('outcome_id')->nullable();
            $table->foreign('outcome_id')->references('id')->on('outcomes')->onDelete('cascade');
            $table->unsignedBigInteger('output_id')->nullable();
            $table->foreign('output_id')->references('id')->on('outputs')->onDelete('cascade');
            $table->unsignedBigInteger('activity_id')->nullable();
            $table->foreign('activity_id')->references('id')->on('activities')->onDelete('cascade');
            $table->unsignedBigInteger('completion_report_id')->nullable();
            $table->foreign('completion_report_id')->references('id')->on('completion_reports')->onDelete('cascade');
            $table->integer('financial_year');
            $table->integer('no_of_units');
            $table->float('cost_per_unit');
            $table->string('completed_date',100);
            $table->integer('added_by')->nullable();
            $table->boolean('approved')->nullable();
            $table->integer('approved_by')->nullable();
            $table->string('approved_on')->nullable();
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
        Schema::dropIfExists('progress');
    }
}
