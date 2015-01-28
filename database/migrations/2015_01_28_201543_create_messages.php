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

			//Filters
			$table->tinyInteger('academic_year')->nullable();
			$table->foreign('academic_year')->references('academic_year')->on('classes');

			$table->char('section',1)->nullable();
			$table->foreign('section')->references('section')->on('classes');

			$table->tinyInteger('role')->nullable();
			$table->foreign('role')->references('role')->on('roles');

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
		Schema::drop('messages');
	}

}
