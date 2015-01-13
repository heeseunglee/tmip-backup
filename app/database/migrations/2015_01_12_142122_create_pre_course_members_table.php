<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePreCourseMembersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pre_course_members', function(Blueprint $table)
		{
			$table->increments('id');

			$table->unsignedInteger('student_id');
			$table->foreign('student_id')->references('id')->on('students');

			$table->unsignedInteger('pre_course_id');
			$table->foreign('pre_course_id')->references('id')->on('pre_courses');

			$table->boolean('lvl_test_registered')->default(true);

			$table->boolean('lvl_test_finished')->default(false);

			$table->float('lvl_test_result')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pre_course_members');
	}

}
