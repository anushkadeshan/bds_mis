<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIdeaGenerationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('idea_generations', function (Blueprint $table) {
            $table->id();
            $table->string('responsible_officer')->nullable();
            $table->text('log_activity_name')->nullable();
            $table->string('output_code')->nullable();
            $table->string('activity_code')->nullable();
            $table->integer('financial_year')->nullable();
            $table->text('specific_activity_name')->nullable();
            $table->string('disctrict')->nullable();
            $table->integer('dsd_id')->nullable();
            $table->integer('gnd_id')->nullable();
            $table->string('date_of_start')->nullable();
            $table->string('date_of_end')->nullable();
            $table->float('partner_contribution')->nullable();
            $table->float('bds_contribution')->nullable();
            $table->float('totol_planned_cost')->nullable();
            $table->integer('units_completed')->nullable();
            $table->text('lessions_learned')->nullable();
            $table->text('views_of_rp')->nullable();
            $table->text('attendance')->nullable();
            $table->json('family_id')->nullable();
            $table->integer('resourse_person_id');
            $table->integer('added_by');
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
        Schema::dropIfExists('idea_generations');
    }
}
