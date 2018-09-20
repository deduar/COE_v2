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
            $table->dateTime('res_date');
            $table->integer('res_exp_id');
            $table->integer('res_user_id');
            $table->integer('res_guide_id');
            $table->enum('status', ['Waiting', 'Rejected', 'Canceled', 'Defered', 'Accepted'])->default('Waiting');
            $table->enum('paid', ['Paid', 'Unpaid'])->default('Unpaid');
            $table->boolean('paid')->default(0);
            $table->string('paymentId',20)->default('NULL');
            $table->string('token',20)->default('NULL');
            $table->string('PayerID',20)->default('NULL');
            $table->string('transactionID',20)->default('NULL');
            $table->decimal('amount',10,2);
            $table->integer('pax');
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
