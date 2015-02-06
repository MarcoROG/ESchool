<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTestsUsers extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classes_tests', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('student')->index()->unsigned();
            $table->foreign('student')->references('id')->on('users');

            $table->integer('test')->index()->unsigned();
            $table->foreign('test')->references('id')->on('tests');

            $table->decimal('grade', 3, 1);

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
        Schema::drop('classes_tests');
    }

}
