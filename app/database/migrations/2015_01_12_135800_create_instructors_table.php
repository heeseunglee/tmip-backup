<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInstructorsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('instructors', function(Blueprint $table)
		{
			$table->increments('id');

			/**
			 * 강사 등급을 결정하는 숫자로써 15 - 1 까지 존재
			 */
			$table->tinyInteger('rating')->default(6);

			$table->tinyInteger('career_years')->default(0);

			$table->date('end_of_contract_date');

			$table->string('name_chn')->nullable();

			/**
			 * 주민등록번호 저장될 때 자동으로 저장되게 설정함
			 */
			$table->date('date_of_birth');

			/**
			 * 주민등록번호가 암호화되어 저장
			 */
			$table->string('residence_number', 1024);

			$table->unsignedInteger('bank_id')->nullable();
			$table->foreign('bank_id')->references('id')->on('banks');

			/**
			 * 계좌번호가 암호화되어 저장
			 */
			$table->string('bank_account_number', 1024);

			/**
			 * 월급 지급일
			 * 특별한 일이 없다면 25일로 셋팅
			 */
			$table->tinyInteger('payday')->default(25);

			$table->char('gender', 1);

			$table->tinyInteger('age');

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
		Schema::drop('instructors');
	}

}
