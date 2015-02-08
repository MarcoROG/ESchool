<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchooltripsUsers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('schooltrips_user', function(Blueprint $table)
		{
			$table->increments('id');

			$table->integer('tutor')->unsigned();
			$table->foreign('tutor')->references('id')->on('users');

			$table->boolean('paid')->default(false);

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
		Schema::drop('schooltrips_user');
	}

}
