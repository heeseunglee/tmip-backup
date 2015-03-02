<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLvlTestsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('lvl_tests', function(Blueprint $table)
		{
			$table->increments('id');

            $table->unsignedInteger('lvl_test_mc_id');
            $table->foreign('lvl_test_mc_id')->references('id')->on('lvl_test_mcs');

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
		Schema::drop('lvl_tests');
	}

}
