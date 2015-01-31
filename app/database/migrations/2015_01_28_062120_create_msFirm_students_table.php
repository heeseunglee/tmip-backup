<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMsFirmStudentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('msFirm_students', function(Blueprint $table)
		{
			$table->increments('id');

			$table->unsignedInteger('msFirm_company_id');
			$table->foreign('msFirm_company_id')->references('id')->on('msFirm_companies');

			$table->string('name');

			$table->string('deputy');

			$table->string('position');

			$table->string('email');

			$table->string('phone_number');

			$table->char('gender', 1);

			$table->tinyInteger('age');

			$table->string('city');

			$table->tinyInteger('level');

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
		Schema::drop('msFirm_students');
	}

}
