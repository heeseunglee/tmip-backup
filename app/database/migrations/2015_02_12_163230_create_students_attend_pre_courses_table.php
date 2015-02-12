<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStudentsAttendPreCoursesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('students_attend_pre_courses', function(Blueprint $table)
		{
			$table->increments('id');

			$table->unsignedInteger('pre_course_id');
			$table->foreign('pre_course_id')->references('id')->on('pre_courses');

			$table->unsignedInteger('student_id');
			$table->foreign('student_id')->references('id')->on('students');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('students_attend_pre_courses');
	}

}
