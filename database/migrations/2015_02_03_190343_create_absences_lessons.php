<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAbsencesLessons extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absences_lessons', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('absence')->index()->unsigned();
            $table->foreign('absence')->references('id')->on('absences');

            $table->integer('lesson')->index()->unsigned();
            $table->foreign('lesson')->references('id')->on('lessons');

            $table->timestamp('time')->nullable();

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
        Schema::drop('absences_lessons');
    }

}
