<?php

class CourseTypesTableSeeder extends Seeder {

	public function run()
	{
		/*
         * 1st categories
         */
		CourseType::create([
			'name' => '주재원',
		]);
		CourseType::create([
			'name' => '이그제큐티브',
		]);
		CourseType::create([
			'name' => '직무특화 만다린 스킬',
			'has_sub_types' => true,
			'can_select_multiple' => true,
		]);
		CourseType::create([
			'name' => '비즈니스 만다린 스킬',
			'has_sub_types' => true,
			'can_select_multiple' => true,
		]);
		CourseType::create([
			'name' => '일반 만다린 스킬',
			'has_sub_types' => true,
		]);


		/*
         * 2nd categories
         */
		// children of 직무특화 만다린 스킬
		$parent = CourseType::where('name', '=', '직무특화 만다린 스킬')->firstOrFail();
		$parent_id = $parent->id;
		$id_string = '';
		$temp = CourseType::create([
			'name' => '금융',
			'parent_id' => $parent_id,
		])->id;
		$id_string = $id_string.$temp.';';
		$temp = CourseType::create([
			'name' => '호텔',
			'parent_id' => $parent_id,
		])->id;
		$id_string = $id_string.$temp.';';
		$temp = CourseType::create([
			'name' => '백화점',
			'parent_id' => $parent_id,
		])->id;
		$id_string = $id_string.$temp.';';
		$temp = CourseType::create([
			'name' => '식품업',
			'parent_id' => $parent_id,
		])->id;
		$id_string = $id_string.$temp.';';
		$temp = CourseType::create([
			'name' => '항공',
			'parent_id' => $parent_id,
		])->id;
		$id_string = $id_string.$temp.';';
		$temp = CourseType::create([
			'name' => '무역',
			'parent_id' => $parent_id,
		])->id;
		$id_string = $id_string.$temp.';';
		$temp = CourseType::create([
			'name' => '은행',
			'parent_id' => $parent_id,
		])->id;
		$id_string = $id_string.$temp.';';
		$temp = CourseType::create([
			'name' => 'IT',
			'parent_id' => $parent_id,
		])->id;
		$id_string = $id_string.$temp.';';
		$parent->child_id = $id_string;
		$parent->save();
		$id_string = '';

		// children of 비즈니스 만다린 스킬
		$parent = CourseType::where('name', '=', '비즈니스 만다린 스킬')->firstOrFail();
		$parent_id = $parent->id;
		$temp = CourseType::create([
			'name' => '프레젠테이션',
			'parent_id' => $parent_id,
		])->id;
		$id_string = $id_string.$temp.';';
		$temp = CourseType::create([
			'name' => '쓰기',
			'parent_id' => $parent_id,
		])->id;
		$id_string = $id_string.$temp.';';
		$temp = CourseType::create([
			'name' => '협상',
			'parent_id' => $parent_id,
		])->id;
		$id_string = $id_string.$temp.';';
		$temp = CourseType::create([
			'name' => '미팅',
			'parent_id' => $parent_id,
		])->id;
		$id_string = $id_string.$temp.';';
		$temp = CourseType::create([
			'name' => '비즈니스 회화',
			'parent_id' => $parent_id,
		])->id;
		$id_string = $id_string.$temp.';';
		$parent->child_id = $id_string;
		$parent->save();
		$id_string = '';

		// children of 일반 만다린 스킬
		$parent = CourseType::where('name', '=', '일반 만다린 스킬')->firstOrFail();
		$parent_id = $parent->id;
		$temp = CourseType::create([
			'name' => '일반 회화',
			'parent_id' => $parent_id,
		])->id;
		$id_string = $id_string.$temp.';';
		$parent->child_id = $id_string;
		$parent->save();
		$id_string = '';

	}

}