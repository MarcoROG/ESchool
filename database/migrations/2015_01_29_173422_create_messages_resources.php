<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMessagesResources extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages_resources', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('message')->index()->unsigned();//Id of the message the resource is sent with
            $table->foreign('message')->references('id')->on('messages');

            $table->integer('resource')->index()->unsigned();//Id of the resource sent with the message
            $table->foreign('resource')->references('id')->on('resources');

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
        Schema::drop('messages_resources');
    }

}
