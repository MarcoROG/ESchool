<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAbsences extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('absences', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('justifier');
			$table->foreign('justifier')->references('id')->on('users');

			$table->integer('absent');
			$table->foreign('absent')->references('id')->on('users');

			$table->integer('lesson');
			$table->foreign('lesson')->references('id')->on('lessons');

			$table->string('reason')->nullable();
			$table->boolean('accepted');
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
		Schema::drop('absences');
	}

}
