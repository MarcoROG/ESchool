<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRolesUsers extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles_users', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('user')->index()->unsigned();
            $table->foreign('user')->references('id')->on('users');

            $table->integer('role')->index()->unsigned();
            $table->foreign('role')->references('id')->on('roles');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('roles_users');
    }

}
