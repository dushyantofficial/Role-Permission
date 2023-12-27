<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImageResizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('image_resizes', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->text('image_type');
            $table->string('image_original_width')->nullable();
            $table->string('image_original__width')->nullable();
            $table->string('image_width')->nullable();
            $table->string('image_height')->nullable();
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
        Schema::dropIfExists('image_resizes');
    }
}
