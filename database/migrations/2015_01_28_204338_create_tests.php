<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTests extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tests', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->tinyInteger('type');
			$table->foreign('type')->references('id')->on('test_types');

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
		Schema::drop('tests');
	}

}
