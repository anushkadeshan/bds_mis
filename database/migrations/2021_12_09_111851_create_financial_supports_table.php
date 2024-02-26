<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinancialSupportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('financial_supports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('beneficiary_financial')->nullable();
            $table->text('financial_purpose')->nullable();
            $table->float('approved_amount')->nullable();
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
        Schema::dropIfExists('financial_supports');
    }
}
