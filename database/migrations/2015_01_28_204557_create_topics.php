<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopics extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('topics', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('description');

			$table->tinyInteger('subject')->unsigned();
			$table->foreign('subject')->references('id')->on('subjects');

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
		Schema::drop('topics');
	}

}
