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
			$table->integer('tutor')->unsigned();
			$table->foreign('tutor')->references('id')->on('users');

			$table->integer('absent')->unsigned();
			$table->foreign('absent')->references('id')->on('users');

			$table->string('reason')->nullable();
			$table->boolean('accepted')->default(false);
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
