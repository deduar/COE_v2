<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservation', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->timestamps('res_date');
            $table->integer('res_exp_id');
            $table->integer('res_user_id');
            $table->integer('res_guide_id');
            $table->enum('status', ['Waiting', 'Rejected', 'Canceled', 'Defered'])->default('Waiting');
        });

        Schema::table('reservation', function ($table) {
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('reservation');
    }
}
