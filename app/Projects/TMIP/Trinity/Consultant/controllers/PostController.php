<?php

namespace Trinity\Consultant\controllers;

class PostController extends \BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function signUpStudentsManually() {
		$number_of_students = \Input::get('number_of_students');
		$company_id = \Input::get('company_select');
		for($i = 1; $i <= $number_of_students; $i++) {
			$student_email = \Input::get('student_email_'.$i);
			$user = \User::where('account_email', $student_email)->get();
			if($user->isEmpty()) {
				$new_student = \Student::create([
					'company_id' => $company_id
				]);
				$new_student->user()->create([
					'account_email' => $student_email,
					'name_kor' => \Input::get('student_name_'.$i),
					'password' => \Hash::make('1234')
				]);
				$result_array[] = array($new_student->id, '등록 성공');
			}
			else {
				$user_id = \User::where('account_email', \Input::get('student_email_'.$i))->first()->id;
				$result_array[] = array(\User::find($user_id)->userable->id, '기등록 학생');
			}
		}
		return \View::make('TrinityConsultantView::pages.usersManagement.studentsRegistrationResult')
			->with('result_array', $result_array);
	}

}
