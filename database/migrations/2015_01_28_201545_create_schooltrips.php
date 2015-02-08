<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchooltrips extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('schooltrips', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('destination');
			$table->decimal('price',6,2);
			$table->text('indications');

			$table->timestamp('start_time')->nullable();
			$table->timestamp('end_time')->nullable();

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
		Schema::drop('schooltrips');
	}

}
