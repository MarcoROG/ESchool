<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClasses extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classes', function (Blueprint $table) {
            $table->increments('id');

            $table->tinyInteger('academic_year')->unsigned()->nullable();//1° 2° 3° 4° ecc


            $table->char('section', 1)->nullable();
            $table->string('name', 30)->unique();

            $table->integer('schoolyear')->index()->unsigned();
            $table->foreign('schoolyear')->references('id')->on('school_years');

            $table->boolean('open');

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
        Schema::drop('classes');
    }

}
