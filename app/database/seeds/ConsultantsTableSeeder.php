<?php

class ConsultantsTableSeeder extends Seeder {

	public function run()
	{
		\Consultant::create([
			'is_admin' => true
		])->user()->create([
			'account_email' => 'final.lee@themandarin.co.kr',
			'password' => \Hash::make('Elqnfhd!324'),
			'name_kor' => '이희승',
			'name_eng' => 'Heeseung Lee',
			'private_email' => '1541.hsl@gmail.com',
			'phone_number' => preg_replace('/(^02.{0}|^01.{1}|[0-9]{3})([0-9]+)([0-9]{4})/', '$1-$2-$3', '01063651638'),
		]);;

		\Consultant::create([
			'is_admin' => true
		])->user()->create([
			'account_email' => 'han.w.suh@themandarin.co.kr',
			'password' => \Hash::make('1234'),
			'name_kor' => '서한울',
			'name_eng' => 'Hanwool Suh',
			'phone_number' => preg_replace('/(^02.{0}|^01.{1}|[0-9]{3})([0-9]+)([0-9]{4})/', '$1-$2-$3', '01053229318'),
		]);;

		\Consultant::create([
			'is_admin' => true
		])->user()->create([
			'account_email' => 'gin.song@themandarin.co.kr',
			'password' => \Hash::make('1234'),
			'name_kor' => '송진',
			'name_eng' => 'Gin Song',
			'phone_number' => preg_replace('/(^02.{0}|^01.{1}|[0-9]{3})([0-9]+)([0-9]{4})/', '$1-$2-$3', '01042324278'),
		]);;

		\Consultant::create([
			'is_admin' => true
		])->user()->create([
			'account_email' => 'sh.jo@themandarin.co.kr',
			'password' => \Hash::make('1234'),
			'name_kor' => '조성훈',
			'name_eng' => 'Sunghoon Jo',
			'phone_number' => preg_replace('/(^02.{0}|^01.{1}|[0-9]{3})([0-9]+)([0-9]{4})/', '$1-$2-$3', '01071109949'),
		]);;

		\Consultant::create([
			'is_admin' => false
		])->user()->create([
			'account_email' => 'ye.kwon@themandarin.co.kr',
			'password' => \Hash::make('1234'),
			'name_kor' => '권영은',
			'name_eng' => 'Yeongeun Kwon',
			'phone_number' => preg_replace('/(^02.{0}|^01.{1}|[0-9]{3})([0-9]+)([0-9]{4})/', '$1-$2-$3', '01063627415'),
		]);;
	}
}