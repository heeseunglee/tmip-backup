<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class RemoveIsLvlTestPausedColumnFromStudentsAttendPreCoursesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('students_attend_pre_courses', function(Blueprint $table)
		{
			$table->dropColumn('is_lvl_test_paused');
            $table->dropColumn('lvl_test_paused_at');
            $table->dropColumn('lvl_test_finished_at');
            $table->dropColumn('lvl_test_started_at');
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
            $table->boolean('is_lvl_test_paused')->default(false);
            $table->unsignedInteger('lvl_test_started_at');
            $table->unsignedInteger('lvl_test_paused_at');
            $table->unsignedInteger('lvl_test_finished_at');
		});
	}

}
