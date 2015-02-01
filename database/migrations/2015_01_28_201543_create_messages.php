<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessages extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('messages', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('subject');
			$table->text('message');
			$table->tinyInteger('type')->unsigned();
			$table->foreign('type')->references('id')->on('message_types');

			$table->integer('sender')->unsigned();
			$table->foreign('sender')->references('id')->on('users');
			//Filters
			$table->tinyInteger('academic_year')->unsigned()->nullable();

			$table->char('section',1)->nullable();

			$table->tinyInteger('role')->unsigned()->nullable();
			$table->foreign('role')->references('id')->on('roles');

			$table->integer('person')->unsigned()->nullable();
			$table->foreign('person')->references('id')->on('users');

			$table->timestamps();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('messages');
	}

}
