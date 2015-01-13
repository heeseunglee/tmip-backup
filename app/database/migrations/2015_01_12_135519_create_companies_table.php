<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCompaniesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('companies', function(Blueprint $table)
		{
			$table->increments('id');

			$table->string('name_kor')->unique();

			$table->string('name_eng')->nullable();

			$table->string('address_kor')->nullable();

			$table->string('address_eng')->nullable();

			$table->string('contact_email')->nullable();

			$table->string('contact_number_1');

			$table->string('contact_number_2')->nullable();

			$table->string('file_location_of_logo_img')->default('no_image');

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
		Schema::drop('companies');
	}

}
