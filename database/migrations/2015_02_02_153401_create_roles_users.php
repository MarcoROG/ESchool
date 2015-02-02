<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesUsers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('roles_users', function(Blueprint $table)
		{
			$table->increments('id');

			$table->integer('user')->unsigned();
			$table->foreign('user')->references('id')->on('users');

			$table->tinyInteger('role')->unsigned();
			$table->foreign('role')->references('id')->on('roles');

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
		Schema::drop('roles_users');
	}

}
