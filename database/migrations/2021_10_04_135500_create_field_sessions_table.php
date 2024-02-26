<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFieldSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('field_sessions', function (Blueprint $table) {
            $table->id();
            $table->string('client');
            $table->string('date');
            $table->text('description');
            $table->text('start_address');
            $table->text('end_address');
            $table->decimal ('start_lat',11,7);
            $table->decimal('end_lat',11,7);
            $table->decimal('start_long',11,7);
            $table->decimal('end_long',11,7);
            $table->string('start_time');
            $table->string('end_time');
            $table->string('user_id');
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
        Schema::dropIfExists('field_sessions');
    }
}
