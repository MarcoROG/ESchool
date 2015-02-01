<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassesLessons extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('classes_lessons', function(Blueprint $table)
		{
			$table->increments('id');

			$table->integer('lesson')->unsigned();
			$table->foreign('lesson')->references('id')->on('lessons');

			$table->integer('class')->unsigned();
			$table->foreign('class')->references('id')->on('classes');

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
		Schema::drop('classes_lessons');
	}

}
