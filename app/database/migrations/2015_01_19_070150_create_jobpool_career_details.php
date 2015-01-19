<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateJobpoolCareerDetails extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('jobpool_career_details', function(Blueprint $table)
		{
			$table->increments('id');

			$table->unsignedInteger('jobpool_signup_form_id');
			$table->foreign('jobpool_signup_form_id')->references('id')->on('jobpool_signup_forms');

			$table->string('career_detail_company_name');
			$table->string('career_detail_type');
			$table->string('career_detail_description');
			$table->string('career_detail_period');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('jobpool_career_details');
	}

}
