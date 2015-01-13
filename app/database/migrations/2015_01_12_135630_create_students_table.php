<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStudentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('students', function(Blueprint $table)
		{
			$table->increments('id');

			// foreign key to companies.id
			// student must be an employee of some company
			$table->unsignedInteger('company_id');
			$table->foreign('company_id')->references('id')->on('companies')
				->onDelete('cascade')->onUpdate('cascade');

			$table->string('position')->nullable();

			$table->string('deputy')->nullable();

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
		Schema::drop('students');
	}

}
