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
			$table->boolean('private');

			$table->integer('sender');
			$table->foreign('sender')->references('id')->on('users');
			//Filters
			$table->tinyInteger('academic_year')->nullable();

			$table->char('section',1)->nullable();

			$table->tinyInteger('role')->nullable();
			$table->foreign('role')->references('id')->on('roles');

			$table->integer('target')->nullable();
			$table->foreign('target')->references('id')->on('users');

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
