<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSentSmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sent_sms', function (Blueprint $table) {
            $table->id();
            $table->string('receiver', 100)->nullable();
            $table->string('designation', 100)->nullable();
            $table->string('epf', 100)->nullable();
            $table->string('company', 100)->nullable();
            $table->string('branch', 100)->nullable();
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
        Schema::dropIfExists('sent_sms');
    }
}
