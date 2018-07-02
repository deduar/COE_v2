<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExperiencePhotoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experience_photos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('exp_id');
            $table->string('exp_photo',255);
            $table->timestamps();
        });

        Schema::table('experience_photos', function ($table) {
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('experience_photos');
    }
}