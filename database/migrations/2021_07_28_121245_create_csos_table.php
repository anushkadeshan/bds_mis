<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCsosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('csos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('district');
            $table->integer('dsd_id');
            $table->integer('gn_id');
            $table->string('category');
            $table->string('reg_no');
            $table->softDeletes();
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
        Schema::dropIfExists('csos');
    }
}
