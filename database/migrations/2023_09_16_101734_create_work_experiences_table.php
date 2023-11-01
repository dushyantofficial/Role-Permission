<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_experiences', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('resume_id')->unsigned();
            $table->string('destination');
            $table->string('company_name');
            $table->string('start_date');
            $table->string('end_date');
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
        Schema::dropIfExists('work__experiences');
    }
}
