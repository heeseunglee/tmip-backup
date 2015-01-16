<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePreferAreaListsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('prefer_area_lists', function(Blueprint $table)
		{
			$table->increments('id');

			$table->unsignedInteger('prefer_area_group_id');
			$table->foreign('prefer_area_group_id')->references('id')->on('prefer_area_groups');

			$table->string('name');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('prefer_area_lists');
	}

}
