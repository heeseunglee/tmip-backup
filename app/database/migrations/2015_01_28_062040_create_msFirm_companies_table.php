<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMsFirmCompaniesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('msFirm_companies', function(Blueprint $table)
		{
			$table->increments('id');

			$table->string('name');

			$table->integer('postcode_1');

			$table->integer('postcode_2');

			$table->string('address_1');

			$table->string('address_2');

			$table->string('applicant_name');

			$table->string('applicant_deputy');

			$table->string('applicant_position');

			$table->string('applicant_work_contact');

			$table->string('applicant_private_contact');

			$table->string('applicant_email');

			$table->tinyInteger('heard_from');

			$table->tinyInteger('reason');

			$table->text('additional_request')->nullable();

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
		Schema::drop('msFirm_companies');
	}

}
