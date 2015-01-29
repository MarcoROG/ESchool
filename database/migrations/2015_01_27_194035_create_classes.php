<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClasses extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('classes', function(Blueprint $table)
		{
			$table->increments('id');
			$table->tinyInteger('academic_year')->nullable();
			$table->char('section',1)->nullable();
			$table->string('name',30)->unique();
			$table->integer('year_id')->unsigned();
			$table->foreign('year_id')->references('id')->on('school_years');
			$table->boolean('open');

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
		Schema::drop('classes');
	}

}
