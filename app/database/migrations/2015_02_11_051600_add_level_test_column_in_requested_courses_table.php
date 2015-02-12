<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddLevelTestColumnInRequestedCoursesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('requested_courses', function(Blueprint $table)
		{
			$table->boolean('level_test')->after('location')->default(true);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('requested_courses', function(Blueprint $table)
		{
			$table->dropColumn('level_test');
		});
	}

}
