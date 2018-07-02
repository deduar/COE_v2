<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExperienceScheduleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experience_schedules', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('exp_id');
            $table->timestamp('exp_begin_date');
            $table->timestamp('exp_end_date');
            $table->enum('exp_schedule_type',['Unavaible','InstanBook']);
        });

        Schema::table('experience_schedules', function ($table) {
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('experience_schedules');
    }
}