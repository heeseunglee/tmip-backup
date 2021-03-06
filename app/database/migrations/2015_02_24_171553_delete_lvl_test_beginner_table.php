<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class DeleteLvlTestBeginnerTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::drop('lvl_test_beginner');
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::create('lvl_test_beginner', function(Blueprint $table)
		{
            $table->increments('id');
            $table->integer('session')->nullable();
            $table->string('question')->nullable();
            $table->string('example1')->nullable();
            $table->string('example2')->nullable();
            $table->string('example3')->nullable();
            $table->integer('answer')->nullable();
		});
	}

}
