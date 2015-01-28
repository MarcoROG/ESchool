<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLessons extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('lessons', function(Blueprint $table)
		{
			$table->increments('id');
			$table->date('day');
			$table->tinyInteger('hour');
			$table->string('notes');

			$table->tinyInteger('classroom');
			$table->foreign('classroom')->references('id')->on('classrooms');

			$table->tinyInteger('type');
			$table->foreign('type')->references('id')->on('lesson_types');

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
