<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class RemoveColumnsFromStudentsAttendPreCoursesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('students_attend_pre_courses', function(Blueprint $table)
		{
			$table->dropColumn('is_level_test_taken');
            $table->dropColumn('level_test_stopped_at');
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
            $table->tinyInteger('is_level_test_taken');
            $table->tinyInteger('level_test_stopped_at');
		});
	}

}
