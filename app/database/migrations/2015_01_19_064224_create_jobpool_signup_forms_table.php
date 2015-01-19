<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateJobpoolSignupFormsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('jobpool_signup_forms', function(Blueprint $table)
		{
			$table->increments('id');

			$table->string('name_kor');

			$table->string('name_eng');

			$table->string('name_chn')->nullable();

			$table->string('email');

			$table->string('phone_number');

			$table->date('date_of_birth');

			$table->char('gender', 1);

			$table->string('visa_type');

			$table->string('postcode_1');

			$table->string('postcode_2');

			$table->string('address_1');

			$table->string('address_2');

			$table->string('academic_background');

			$table->string('name_of_last_school');

			$table->string('major');

			$table->integer('study_aboard_background');

			$table->integer('career_years');

			$table->time('available_time_morning_start')->nullable();

			$table->time('available_time_morning_end')->nullable();

			$table->time('available_time_afternoon_start')->nullable();

			$table->time('available_time_afternoon_end')->nullable();

			$table->time('available_time_night_start')->nullable();

			$table->time('available_time_night_end')->nullable();

			$table->text('resume');

			$table->string('profile_image');

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
		Schema::drop('jobpool_signup_forms');
	}

}
