<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEducationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('education', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('resume_id')->unsigned();
            $table->string('degree_name');
            $table->string('college_name');
            $table->string('university_name');
            $table->string('start_date');
            $table->string('end_date');
            $table->string('grade');
            $table->string('city_name');
            $table->text('description')->nullable();
            $table->text('check')->default(0);
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
        Schema::dropIfExists('education');
    }
}
