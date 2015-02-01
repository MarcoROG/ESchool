<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLessonsTopics extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('lessons_topics', function(Blueprint $table)
		{
			$table->increments('id');

			$table->integer('lesson')->unsigned();
			$table->foreign('lesson')->references('id')->on('lessons');

			$table->integer('topic')->unsigned();
			$table->foreign('topic')->references('id')->on('topics');

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
		Schema::drop('lessons_topics');
	}

}
