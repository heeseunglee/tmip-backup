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
					'password' => \Hash::make($random_password)
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
		return \View::make('TrinityConsultantView::pages.usersManagement.registrationResult')
			->with('result_array', $result_array)
			->with('role', 'Student');
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
		return \View::make('TrinityConsultantView::pages.usersManagement.registrationResult')
			->with('result_array', $result_array)
			->with('role', 'Instructor');
	}

	public function signUpHrsManually() {
		$hr_email = \Input::get('hr_email');
		$company_id = \Input::get('company_select');
		$user = \User::where('account_email', $hr_email)->get();
		$random_password = $this->GenerateString(10);
		if(!$user->isEmpty()) {
			\Flash::error('해당 담당자는 이미 존재합니다. 확인이 필요합니다.');
			return \Redirect::back()->withInput();
		}
		$new_hr = \Hr::create([
			'company_id' => $company_id,
			'consultant_id' => \Input::get('consultant_select')
		]);
		$new_hr->user()->create([
			'account_email' => $hr_email,
			'name_kor' => \Input::get('hr_name'),
			'password' => \Hash::make($random_password)
		]);

		\Mail::queue('TrinityConsultantView::mails.usersManagement.successfullyRegistered',
			array('user' => $new_hr->user,
				'random_password' => $random_password),
			function($message) use ($new_hr) {
				$message->to($new_hr->user->account_email,
					$new_hr->user->name_kor);
		});

		\Flash::success($new_hr->user->name_kor.' 님이 성공적으로 추가되었습니다.');
		return \Redirect::back();
	}

	public function clientsManagementRegistration() {
		$rules_logo_image = array('logo_image' => 'required|image|image_size:500,500');
		$logo_image = array('logo_image' => \Input::file('logo_image'));
		$validator = \Validator::make($logo_image, $rules_logo_image);

		if($validator->fails()) {
			\Flash::error('로고 이미지를 확인해 주세요');
			return \Redirect::back()->withInput();
		}

		$rules = array('name' => 'required',
						'postcode_1' => 'required',
						'postcode_2' => 'required',
						'address_1' => 'required',
						'address_2' => 'required',
						'email' => 'required|email',
						'contact_1'  => 'required');

		$validator = \Validator::make(\Input::all(), $rules);

		if($validator->fails()) {
			\Flash::error('필수 항목을 확인해 주세요');
			return \Redirect::back()->withInput();
		}

		$company_name = \Input::get('name');
		$company = \Company::where('name', $company_name)->get();
		if($company->count() != null) {
			\Flash::error('이미 등록된 고객사입니다.');
			return \Redirect::back();
		}

		$new_company = \Company::create([
			'name' => $company_name,
			'postcode_1' => \Input::get('postcode_1'),
			'postcode_2' => \Input::get('postcode_2'),
			'address_1' => \Input::get('address_1'),
			'address_2' => \Input::get('address_2'),
			'contact_email' => \Input::get('email'),
			'contact_number_1' => preg_replace('/(^02.{0}|^01.{1}|[0-9]{3})([0-9]+)([0-9]{4})/',
												'$1-$2-$3',
												str_replace('_', '', \Input::get('contact_1'))),

		]);

		if (\Input::get('contact_2') != null) {
			$new_company->contact_number_2 = preg_replace('/(^02.{0}|^01.{1}|[0-9]{3})([0-9]+)([0-9]{4})/',
														'$1-$2-$3',
														str_replace('_', '', \Input::get('contact_2')));
			$new_company->save();
		}

		$logo_image_path = app_path().'/Projects/TMIP/Trinity/Common/resources/images/clients/logos';

		if(!\File::exists($logo_image_path)) {
			\File::makeDirectory($logo_image_path, 0775, true);
		}

		$file = \Input::file('logo_image');

		$fileName = $new_company->id.'_logo_'.time().'.'.$file->getClientOriginalExtension();

		$file->move($logo_image_path, $fileName);

		$new_company->logo_image = $fileName;
		$new_company->save();

		\Flash::success('성공적으로 고객사를 추가하였습니다.');
		return \Redirect::back();
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
