<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePreCoursesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pre_courses', function(Blueprint $table)
		{
			$table->increments('id');

			$table->unsignedInteger('requested_course_id');
			$table->foreign('requested_course_id')->references('id')->on('requested_courses');

			$table->string('status');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pre_courses');
	}

}
