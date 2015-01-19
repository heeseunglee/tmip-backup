<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateJobpoolPreferedAreasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('jobpool_prefered_areas', function(Blueprint $table)
		{
			$table->increments('id');

			$table->unsignedInteger('jobpool_signup_form_id');
			$table->foreign('jobpool_signup_form_id')->references('id')->on('jobpool_signup_forms');

			$table->unsignedInteger('prefer_area_list_id');
			$table->foreign('prefer_area_list_id')->references('id')->on('prefer_area_lists');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('jobpool_prefered_areas');
	}

}
