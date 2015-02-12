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

			$table->unsignedInteger('requested_course_id')->nullable();
			$table->foreign('requested_course_id')->references('id')->on('requested_courses');

			$table->unsignedInteger('hr_id');
			$table->foreign('hr_id')->references('id')->on('hrs');

			$table->unsignedInteger('company_id');
			$table->foreign('company_id')->references('id')->on('companies');

			$table->string('curriculum');

			$table->integer('number_of_students');

			$table->string('course_type');

			$table->string('instructor_type');

			$table->char('instructor_gender', 1);

			$table->integer('instructor_career');

			$table->dateTime('start_datetime');

			$table->dateTime('end_datetime');

			$table->string('running_days');

			$table->string('location');

			$table->boolean('level_test')->default(true);

			$table->dateTime('meeting_datetime');

			$table->text('other_requests')->nullable();

			$table->string('status');

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
		Schema::drop('pre_courses');
	}

}
