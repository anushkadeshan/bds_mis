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
            $table->id();
            $table->string('activity_code',100);
            $table->integer('year');
            $table->integer('no_of_units');
            $table->float('cost_per_unit');
            $table->string('completed_date',100);
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
        Schema::dropIfExists('progress');
    }
}
