<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLessonsTests extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('lessons_tests', function(Blueprint $table)
		{
			$table->increments('id');

			$table->integer('test');
			$table->foreign('test')->references('id')->on('tests');

			$table->integer('lesson');
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
		Schema::drop('lessons_tests');
	}

}
