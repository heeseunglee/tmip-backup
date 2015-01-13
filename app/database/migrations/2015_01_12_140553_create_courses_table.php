<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCoursesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('courses', function(Blueprint $table)
		{
			$table->increments('id');

			$table->string('name');

			$table->unsignedInteger('instructor_id');
			$table->foreign('instructor_id')->references('id')->on('users');

			$table->unsignedInteger('company_id');
			$table->foreign('company_id')->references('id')->on('companies');

			$table->dateTime('start_datetime');

			$table->dateTime('end_datetime');

			// represents day(s), when the course will be run
			// format : 1,2,3,4,5
			// means that course will run on mon tue wed thur fri
			$table->string('running_days')->default(',');

			// will be calculated automatically (by observer??)
			$table->integer('total_number_of_sessions');

			/**
			 * 생성된 클래스의 상태를 나타내는 필드로
			 * 진행중, 완료, 미 진행 으로 표기
			 */
			$table->string('status')->default('미 진행');

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
		Schema::drop('courses');
	}

}
