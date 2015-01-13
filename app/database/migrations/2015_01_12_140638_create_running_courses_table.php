<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRunningCoursesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('running_courses', function(Blueprint $table)
		{
			$table->increments('id');

			$table->unsignedInteger('course_id');
			$table->foreign('course_id')->references('id')->on('courses');

			$table->integer('session_number');

			$table->dateTime('planned_start_datetime');

			$table->dateTime('planned_end_datetime');

			$table->dateTime('actual_start_datetime');

			$table->dateTime('actual_end_datetime');

			/**
			 * 생성된 클래스의 각 세션의 상태를 나타내는 필드로 현재
			 * 미 진행,
			 * 시작 : 교수에 의해 시작 버튼이 눌리고 난 후 15분 동안 시작 페이즈. (출석체크는 이때만 가능)
			 * 진행중 : 시작 상태에서 15분이 경과하면 출석체크가 blocking 됨
			 * 종료 : 교수가 종료 버튼 누르면 바뀜
			 * 취소 : 인사 담당자
			 */
			$table->string('status')->default('미 진행');

			$table->boolean('is_canceled')->default(false);

			$table->dateTime('canceled_datetime')->nullable();

			// sc : same day cancel
			// ad : advanced cancel (until 20:00 on the day before)
			// none
			// will be automatically set by system
			$table->string('cancel_type')->default('none');

			$table->boolean('is_rearranged')->default(false);

			$table->unsignedInteger('rearranged_course_id')->nullable();
			$table->foreign('rearranged_course_id')->references('id')->on('running_courses');

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
		Schema::drop('running_courses');
	}

}
