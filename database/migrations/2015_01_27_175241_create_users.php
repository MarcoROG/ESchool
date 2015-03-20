<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsers extends Migration
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

            //Personal data
            $table->string('name', 30);
            $table->string('middle_name', 30)->nullable();
            $table->string('surname', 30)->index();
            $table->timestamp('birth_day');
            $table->string('birth_place');
            $table->boolean('catholic');
            $table->string('gender',1);//M or F

            //Contact information
            $table->string('address');
            $table->string('email')->unique();
            $table->string('telephone');
            $table->string('mobile')->nullable();

            //Account information
            $table->string('password');
            $table->string('token')->nullable()->unique();
            $table->string('remember_token')->nullable();
            $table->boolean('approved')->default(false);
            $table->timestamps();
            $table->softDeletes();
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
