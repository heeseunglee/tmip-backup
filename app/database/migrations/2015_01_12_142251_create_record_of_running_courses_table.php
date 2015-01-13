<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRecordOfRunningCoursesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('record_of_running_courses', function(Blueprint $table)
		{
			$table->increments('id');

			$table->unsignedInteger('student_id');
			$table->foreign('student_id')->references('id')->on('users');

			$table->unsignedInteger('running_course_id');
			$table->foreign('running_course_id')->references('id')->on('running_courses');

			$table->string('attendance')->default('결석');

			$table->float('daily_test_result')->nullable();

			$table->string('comment', 1024)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('record_of_running_courses');
	}

}
