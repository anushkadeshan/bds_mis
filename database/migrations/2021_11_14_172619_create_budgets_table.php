<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBudgetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('budgets', function (Blueprint $table) {
            $table->id();
            $table->string('activity_code',100);
            $table->integer('year');
            $table->integer('no_of_units');
            $table->float('cost_per_unit');
            $table->string('budget_valid_from',100);
            $table->string('budget_valid_to',100);
            $table->integer('added_by');
            $table->boolean('approved');
            $table->integer('approved_by');
            $table->string('approved_on');
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
        Schema::dropIfExists('budgets');
    }
}
