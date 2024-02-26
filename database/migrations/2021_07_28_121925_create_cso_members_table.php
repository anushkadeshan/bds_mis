<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCsoMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cso_members', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('nic')->nullable();
            $table->string('mobile')->nullable();
            $table->integer('hh_id')->nullable();
            $table->integer('cso_id');
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
        Schema::dropIfExists('cso_members');
    }
}
