<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCourseMembersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('course_members', function(Blueprint $table)
		{
			$table->increments('id');

			$table->unsignedInteger('student_id');
			$table->foreign('student_id')->references('id')->on('users');

			$table->unsignedInteger('course_id');
			$table->foreign('course_id')->references('id')->on('courses');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('course_members');
	}

}
