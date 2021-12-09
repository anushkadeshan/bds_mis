<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompletionReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('completion_reports', function (Blueprint $table) {
            $table->bigIncrements('id');
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
            $table->string('district')->nullable();
            $table->integer('dsd')->nullable();
            $table->json('gnds')->nullable();
            $table->string('responsible_officer')->nullable();
            $table->string('financial_year')->nullable();
            $table->string('date_of_start')->nullable();
            $table->string('date_of_end')->nullable();
            $table->string('partner_contribution')->nullable();
            $table->string('bds_contribution')->nullable();
            $table->string('totol_planned_cost')->nullable();
            $table->string('totdal_actual_cost')->nullable();
            $table->string('units_completed')->nullable();
            $table->text('lessions_learned')->nullable();
            $table->boolean('isApproved')->default(false);
            $table->unsignedBigInteger('approved_by')->nullable();
            $table->foreign('approved_by')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('added_by');
            $table->foreign('added_by')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('completion_reports');
    }
}
