<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLessons extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamp('time');
            $table->string('notes');

            $table->integer('teacher')->unsigned();
            $table->foreign('teacher')->references('id')->on('users');

            $table->integer('classroom')->index()->unsigned();
            $table->foreign('classroom')->references('id')->on('classrooms');

            $table->integer('type')->index()->unsigned();
            $table->foreign('type')->references('id')->on('lesson_types');

            $table->integer('test')->index()->unsigned()->nullable();
            $table->foreign('test')->references('id')->on('tests');

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
        Schema::drop('lessons');
    }

}
