<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddLvlTestTimeLeftColumnToStudentsAttendPreCoursesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('students_attend_pre_courses', function(Blueprint $table)
		{
			$table->unsignedInteger('lvl_test_time_left')->default(300000 * 4); // 20 minutes
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('students_attend_pre_courses', function(Blueprint $table)
		{
			$table->dropColumn('lvl_test_time_left');
		});
	}

}
