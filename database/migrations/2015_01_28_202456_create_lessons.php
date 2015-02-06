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
			$table->timestamp('time');
			$table->string('notes');

			$table->integer('teacher')->unsigned();
			$table->foreign('teacher')->references('id')->on('users');

			$table->smallInteger('classroom')->unsigned();
			$table->foreign('classroom')->references('id')->on('classrooms');

			$table->tinyInteger('type')->unsigned();
			$table->foreign('type')->references('id')->on('lesson_types');

			$table->integer('test')->unsigned()->nullable();
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
