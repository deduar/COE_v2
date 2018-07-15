<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('document_type', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('documentType_name');
            $table->enum('documentType_status',['Active','Inactive'])->default('Active');
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