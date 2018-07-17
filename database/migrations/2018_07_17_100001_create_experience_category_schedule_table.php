<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExperienceCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experience_category', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('category_name');
            $table->enum('category_status',['Active','Inactive'])->default('Active');
        });

        Schema::table('id_type', function ($table) {
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('id_type');
    }
}