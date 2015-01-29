<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestsUsers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('classes_tests', function(Blueprint $table)
		{
			$table->increments('id');

			$table->integer('tutor');
			$table->foreign('tutor')->references('id')->on('users');

			$table->integer('test');
			$table->foreign('test')->references('id')->on('tests');

			$table->decimal('grade',2,1);

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
		Schema::drop('classes_tests');
	}

}
