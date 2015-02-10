<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCourseSubTypesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('course_sub_types', function(Blueprint $table)
		{
			$table->increments('id');

			$table->unsignedInteger('course_main_type_id');
			$table->foreign('course_main_type_id')->references('id')->on('course_main_types');

			$table->string('name');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('course_sub_types');
	}

}
