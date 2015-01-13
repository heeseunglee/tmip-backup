<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCClassedAsCTypesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('c_classed_as_c_types', function(Blueprint $table)
		{
			$table->increments('id');

			$table->unsignedInteger('course_id');
			$table->foreign('course_id')->references('id')->on('courses')
				->onUpdate('cascade');

			$table->unsignedInteger('course_type_id');
			$table->foreign('course_type_id')->references('id')->on('course_types')
				->onUpdate('cascade');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('c_classed_as_c_types');
	}

}
