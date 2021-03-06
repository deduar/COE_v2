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
            $table->string('exp_photo',20)->default('default_photo.png');
            $table->string('exp_location',80);
            $table->text('exp_summary');
            $table->integer('exp_min_people');
            $table->integer('exp_max_people');
            $table->integer('exp_duration');
            $table->enum('exp_duration_h', ['Days', 'Hours', 'Minutes']);
            $table->decimal('exp_price',10,2);
            $table->integer('exp_currency');
            $table->integer('exp_category');
            $table->text('exp_private_notes');
            $table->string('exp_video',255);
            $table->enum('exp_status', ['Active', 'Inactive']->default('Active'));
            $table->enum('exp_published', ['Active', 'Inactive']->default('Active'));
            $table->tinyInteger('exp_flat');
            $table->text('exp_paypal');
            $table->text('exp_bank_name');
            $table->text('exp_beneficiary');
            $table->text('exp_account_number');
            $table->integer('exp_document_type');
            $table->text('exp_document_number');
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