<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInstructorsAvailableTimesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		/**
		 * 이 테이블은 강사들의 가능 시간대를 저장함
		 */
		Schema::create('instructors_available_times', function(Blueprint $table)
		{
			$table->increments('id');

			$table->unsignedInteger('instructor_id');
			$table->foreign('instructor_id')->references('id')->on('instructors');

			$table->time('available_time_start');

			$table->time('available_time_end');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('instructors_available_times');
	}

}
