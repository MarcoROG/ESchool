<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestsTopics extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tests_topics', function(Blueprint $table)
		{
			$table->increments('id');

			$table->integer('test');
			$table->foreign('test')->references('id')->on('tests');

			$table->integer('topic');
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
		Schema::drop('tests_topics');
	}

}
