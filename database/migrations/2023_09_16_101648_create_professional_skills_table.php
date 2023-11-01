<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfessionalSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professional_skills', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('resume_id')->unsigned();
            $table->string('professional_skills');
            $table->integer('professional_per');
            $table->string('color');
            $table->string('status');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('resume_id')->references('id')->on('resumes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('professional__skills');
    }
}
