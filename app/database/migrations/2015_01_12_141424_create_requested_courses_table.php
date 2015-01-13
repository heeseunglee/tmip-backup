<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRequestedCoursesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('requested_courses', function(Blueprint $table)
		{
			$table->increments('id');

			/**
			 * 클래스 요청자
			 */
			$table->unsignedInteger('hr_id');
			$table->foreign('hr_id')->references('id')->on('users');

			/**
			 * 담당 컨설턴트
			 */
			$table->unsignedInteger('consultant_id');
			$table->foreign('consultant_id')->references('id')->on('users');

			/**
			 * 클래스 개설 요청 후 컨설턴트는 해당 담당자와 유선 연락 후 클래스 개설을 승인하여야 한다.
			 */
			$table->unsignedInteger('spoken_with')->nullable();
			$table->foreign('spoken_with')->references('id')->on('users');

			$table->datetime('contacted_datetime')->nullable();

			$table->boolean('is_confirmed')->default(false);

			$table->unsignedInteger('confirmed_by')->nullable();
			$table->foreign('confirmed_by')->references('id')->on('users');

			$table->datetime('confirmed_datetime')->nullable();

			$table->string('course_types');

			$table->integer('number_of_students');

			$table->string('shape_of_course');

			$table->string('instructor');

			$table->char('instructor_gender', 1);

			$table->integer('instructor_career');

			$table->string('days');

			$table->date('start_date');

			$table->date('end_date');

			$table->time('start_time');

			$table->time('end_time');

			$table->string('location');

			$table->boolean('lvl_test');

			$table->date('meeting_date');

			$table->string('comment', 2048)->nullable();

			$table->string('registered_students')->default('');

			$table->string('document_number');

			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('requested_courses');
	}

}
