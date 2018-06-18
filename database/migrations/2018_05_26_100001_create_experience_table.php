<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExperienceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experience', function (Blueprint $table) {
            $table->increments('id');
            $table->string('exp_name');
            $table->timestamps();
            $table->integer('exp_guide_id');
            $table->string('exp_photo',20);
            $table->string('exp_location',80);
            $table->text('exp_summary');
            $table->integer('exp_min_people');
            $table->integer('exp_max_people');
            $table->integer('exp_duration');
            $table->integer('exp_duration_h');
            $table->decimal('exp_price',10,2);
            $table->integer('exp_category');
            $table->text('exp_private_notes');
        });

        Schema::table('experience', function ($table) {
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('experience');
    }
}