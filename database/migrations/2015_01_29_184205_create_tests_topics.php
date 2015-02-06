<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTestsTopics extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tests_topics', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('test')->index()->unsigned();
            $table->foreign('test')->references('id')->on('tests');

            $table->integer('topic')->index()->unsigned();
            $table->foreign('topic')->references('id')->on('topics');

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
        Schema::drop('tests_topics');
    }

}
