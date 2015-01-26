<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInstructorsPreferredAreasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('instructors_preferred_areas', function(Blueprint $table)
		{
			$table->increments('id');

			$table->unsignedInteger('instructor_id');
			$table->foreign('instructor_id')->references('id')->on('instructors');

			$table->unsignedInteger('preferred_area_id');
			$table->foreign('preferred_area_id')->references('id')->on('prefer_area_lists');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('instructors_preferred_areas');
	}

}
