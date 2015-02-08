<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLessonsSchooltrips extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('lessons_schooltrips', function(Blueprint $table)
		{
			$table->increments('id');

			$table->integer('schooltrip')->unsigned();
			$table->foreign('schooltrip')->references('id')->on('schooltrips');

			$table->integer('lesson')->unsigned();
			$table->foreign('lesson')->references('id')->on('lessons');

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
		Schema::drop('lessons_schooltrips');
	}

}
