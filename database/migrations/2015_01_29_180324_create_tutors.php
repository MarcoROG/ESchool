<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTutors extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tutors', function(Blueprint $table)
		{
			$table->increments('id');

			$table->integer('tutor');
			$table->foreign('tutor')->references('id')->on('users');

			$table->integer('tutored');
			$table->foreign('tutored')->references('id')->on('users');

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
		Schema::drop('tutors');
	}

}
