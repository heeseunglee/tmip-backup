<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddLvlTestStatusColumnToStudentsAttendPreCoursesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('students_attend_pre_courses', function(Blueprint $table)
		{
			$table->string('lvl_test_status')->default('대기')->after('lvl_test_id');
            $table->boolean('is_lvl_test_paused')->default(false);
            $table->unsignedInteger('lvl_test_started_at');
            $table->unsignedInteger('lvl_test_paused_at');
            $table->unsignedInteger('lvl_test_finished_at');
            $table->tinyInteger('lvl_test_proceed_step');
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
            $table->dropColumn('lvl_test_status');
            $table->dropColumn('is_lvl_test_paused');
            $table->dropColumn('lvl_test_started_at');
            $table->dropColumn('lvl_test_paused_at');
            $table->dropColumn('lvl_test_finished_at');
            $table->dropColumn('lvl_test_proceed_step');
		});
	}

}
