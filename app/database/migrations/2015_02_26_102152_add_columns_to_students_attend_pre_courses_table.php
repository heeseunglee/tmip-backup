<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddColumnsToStudentsAttendPreCoursesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('students_attend_pre_courses', function(Blueprint $table)
		{
			$table->unsignedInteger('lvl_test_id');
            $table->foreign('lvl_test_id')->references('id')->on('lvl_tests');
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
			$table->dropForeign('students_attend_pre_courses_lvl_test_id_foreign');
            $table->dropColumn('lvl_test_id');
		});
	}

}
