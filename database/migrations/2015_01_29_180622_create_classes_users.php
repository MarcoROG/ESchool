<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassesUsers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('classes_users', function(Blueprint $table)
		{
			$table->increments('id');

			$table->integer('user')->unsigned();
			$table->foreign('user')->references('id')->on('users');

			$table->integer('class')->unsigned();
			$table->foreign('class')->references('id')->on('classes');

			$table->integer('subject')->unsigned()->nullable();
			$table->foreign('subject')->references('id')->on('subjects');

			$table->boolean('coordinator');

			$table->softDeletes();
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
		Schema::drop('classes_users');
	}

}
