<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLivelihoodFamiliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('livelihood_families', function (Blueprint $table) {
            $table->id();
            $table->string('district', 100);
            $table->integer('dsd_id');
            $table->integer('gn_id');
            $table->string('village', 255);
            $table->string('date_of_interviewed', 255);
            $table->string('interviewer', 255);
            $table->string('respondent', 255);
            $table->string('res_rela_to_HHH', 255);
            $table->string('hh_address', 500);
            $table->string('family_type', 100)->nullable();
            $table->string('hh_name', 500);
            $table->string('hh_nic', 500);
            $table->string('spouse_nic', 500)->nullable();
            $table->integer('hh_contact')->nullable();
            $table->integer('spouse_contact')->nullable();
            $table->integer('hh_sp_contact')->nullable();
            $table->integer('spouse_sp_contact')->nullable();
            $table->string('hh_ethnicity', 100);
            $table->string('hh_religion', 100);
            $table->string('hh_gender', 100)->nullable();
            $table->string('spouse_gender', 100)->nullable();
            $table->integer('hh_age')->nullable();
            $table->integer('spouse_age')->nullable();
            $table->string('hh_civil_status', 100)->nullable();
            $table->string('hh_education', 100)->nullable();
            $table->string('spouse_education', 100)->nullable();
            $table->string('hh_employment', 100)->nullable();
            $table->string('spouse_employment', 100)->nullable();
            $table->string('hh_health', 100)->nullable();
            $table->string('spouse_health', 100)->nullable();
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
        Schema::dropIfExists('livelihood_families');
    }
}
