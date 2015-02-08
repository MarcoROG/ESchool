<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSchoolYears extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_years', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamp('first_day_first_semester');
            $table->timestamp('last_day_first_semester');

            $table->timestamp('first_day_second_semester');
            $table->timestamp('last_day_second_semester');
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
        Schema::drop('school_years');
    }

}
