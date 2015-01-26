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
			$random_password = $this->GenerateString(10);
			if($user->isEmpty()) {
				$new_student = \Student::create([
					'company_id' => $company_id
				]);
				$new_student->user()->create([
					'account_email' => $student_email,
					'name_kor' => \Input::get('student_name_'.$i),
					'password' => \Hash::make('1234')
				]);

				\Mail::queue('TrinityConsultantView::mails.usersManagement.successfullyRegistered',
					array('user' => $new_student->user,
						'random_password' => $random_password),
					function($message) use ($new_student) {
						$message->to($new_student->user->account_email,
							$new_student->user->name_kor);
				});

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

	public function signUpInstructorsManually() {
		$number_of_instructors = \Input::get('number_of_instructors');
		for($i = 1; $i <= $number_of_instructors; $i++) {
			$instructor_email = \Input::get('instructor_email_'.$i);
			$user = \User::where('account_email', $instructor_email)->get();
			$random_password = $this->GenerateString(10);
			if($user->isEmpty()) {
				$new_instructor = \Instructor::create([]);
				$new_instructor->user()->create([
					'account_email' => $instructor_email,
					'name_kor' => \Input::get('instructor_name_'.$i),
					'password' => \Hash::make($random_password),
				]);

				\Mail::queue('TrinityConsultantView::mails.usersManagement.successfullyRegistered',
					array('user' => $new_instructor->user,
						'random_password' => $random_password),
					function($message) use ($new_instructor) {
						$message->to($new_instructor->user->account_email,
							$new_instructor->user->name_kor);
				});

				$result_array[] = array($new_instructor->id, '등록 성공');
			}
			else {
				$user_id = \User::where('account_email', \Input::get('instructor_email_'.$i))->first()->id;
				$result_array[] = array(\User::find($user_id)->userable->id, '기등록 교수진');
			}
		}
		return 'TODO';
	}

	function GenerateString($length)
	{
		$characters  = "0123456789";
		$characters .= "abcdefghijklmnopqrstuvwxyz";
		$characters .= "ABCDEFGHIJKLMNOPQRSTUVWXYZ";

		$string_generated = "";

		$nmr_loops = $length;
		while ($nmr_loops--)
		{
			$string_generated .= $characters[mt_rand(0, strlen($characters) - 1)];
		}

		return $string_generated;
	}

}
