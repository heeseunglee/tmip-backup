<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLvlTestMcPoolExpertTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('lvl_test_mc_pool_expert', function(Blueprint $table)
		{
            $table->increments('id');
            $table->integer('session')->nullable();
            $table->string('text', 2048)->nullable();
            $table->string('question', 2048)->nullable();
            $table->string('example_1')->nullable();
            $table->string('example_2')->nullable();
            $table->string('example_3')->nullable();
            $table->string('example_4')->nullable();
            $table->integer('answer')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('lvl_test_mc_pool_expert');
	}

}
