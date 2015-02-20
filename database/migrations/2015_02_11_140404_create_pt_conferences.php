<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePtConferences extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pt_conferences', function(Blueprint $table)
		{
			$table->increments('id');

			$table->integer('teacher')->unsigned()->index();
			$table->foreign('teacher')->references('id')->on('users');

			$table->integer('student')->unsigned()->index();
			$table->foreign('student')->references('id')->on('users');

			$table->integer('classroom')->unsigned();
			$table->foreign('classroom')->references('id')->on('classrooms');

			$table->timestamp('date');
			$table->boolean('last_proposal');
			$table->boolean('confirmed')->default(false);

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
		Schema::drop('pt_conferences');
	}

}
