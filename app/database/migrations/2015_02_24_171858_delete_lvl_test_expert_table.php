<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class DeleteLvlTestExpertTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::drop('lvl_test_expert');
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::create('lvl_test_expert', function(Blueprint $table)
		{
            $table->increments('id');
            $table->integer('session')->nullable();
            $table->string('text', 2048)->nullable();
            $table->string('question')->nullable();
            $table->string('example1')->nullable();
            $table->string('example2')->nullable();
            $table->string('example3')->nullable();
            $table->string('example4')->nullable();
            $table->integer('answer')->nullable();
            $table->string('question2')->nullable();
            $table->string('example5')->nullable();
            $table->string('example6')->nullable();
            $table->string('example7')->nullable();
            $table->string('example8')->nullable();
            $table->integer('answer2')->nullable();
		});
	}

}
