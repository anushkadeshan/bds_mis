<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLivelihoodFamilyMembersTable extends Migration
{
    
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('livelihood_family_members', function (Blueprint $table) {
            $table->id();
            $table->integer('hh_id')->unsigned()->nullable();
            $table->foreign('hh_id')->references('id')->on('livelihood_families')->onDelete('cascade');
            $table->string('relationship_to_hhh', 100);
            $table->integer('age');
            $table->string('gender');
            $table->string('civil_status', 100)->nullable();
            $table->integer('school_grade')->nullable();
            $table->string('education', 100)->nullable();
            $table->string('employment', 100)->nullable();
            $table->string('health', 100)->nullable();
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
        Schema::dropIfExists('livelihood_family_members');
    }
}
