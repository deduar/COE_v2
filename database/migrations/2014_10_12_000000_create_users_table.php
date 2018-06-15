<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->string('register_code', 255);
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::table('users', function ($table) {
            $table->enum('group', ['User', 'Guide'])->default('User');
            $table->enum('status', ['Active', 'Inactive'])->default('Active');
            $table->boolean('confirmed')->default(false);
            $table->string('lastName')->nullable();
            $table->string('avatar')->default('default_avatar.png');
            $table->integer('age')->nullable();
            $table->string('phone', 12)->nullable();
            $table->string('nationality',25)->nullable();
            $table->string('job',255)->nullable();
            $table->string('address', 255)->nullable();
            $table->integer('postalCode')->nullable();
            $table->string('city',255)->nullable();
            $table->string('country',255)->nullable();
            $table->enum('language',['en','es'])->default('es');
            $table->text('biography')->nullable();
            $table->boolean('admin')->default('false');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
