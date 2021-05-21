<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLivelihoodPartnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('livelihood_partners', function (Blueprint $table) {
            $table->id();
            $table->string('organization', 255)->nullable();
            $table->string('type_of_contribution', 255)->nullable();
            $table->float('financial_contribution', 11)->nullable();
            $table->integer('livelihood_id')->unsigned()->nullable();
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
        Schema::dropIfExists('livelihood_partners');
    }
}
