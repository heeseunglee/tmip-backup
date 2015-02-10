<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('BanksTableSeeder');
		//$this->call('CompaniesTableSeeder');
		$this->call('ConsultantsTableSeeder');
		//$this->call('StudentsTableSeeder');
		//$this->call('InstructorsTableSeeder');
		//$this->call('HrsTableSeeder');
		$this->call('PreferAreaGroupsTableSeeder');
		$this->call('PreferAreaListsTableSeeder');
		$this->call('CourseMainTypesTableSeeder');
		$this->call('CourseSubTypesTableSeeder');
	}

}
