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

	public function coursesManagementRequestedCoursesConfirm() {
		//dd(\Input::all());
		$datetime_rules = array(
			'start_datetime' => array('required',
									'regex:/20\d{2}(-|\/)((0[1-9])|(1[0-2]))(-|\/)((0[1-9])|([1-2][0-9])|(3[0-1]))(T|\s)(([0-1][0-9])|(2[0-3])):([0-5][0-9]):([0-5][0-9])/'),
			'end_datetime' => array('required',
									'regex:/20\d{2}(-|\/)((0[1-9])|(1[0-2]))(-|\/)((0[1-9])|([1-2][0-9])|(3[0-1]))(T|\s)(([0-1][0-9])|(2[0-3])):([0-5][0-9]):([0-5][0-9])/'),
			'meeting_datetime' => array('required',
									'regex:/20\d{2}(-|\/)((0[1-9])|(1[0-2]))(-|\/)((0[1-9])|([1-2][0-9])|(3[0-1]))(T|\s)(([0-1][0-9])|(2[0-3])):([0-5][0-9]):([0-5][0-9])/'),
		);

		$validator = \Validator::make(\Input::all(), $datetime_rules);

		if($validator->fails()) {
			\Flash::error('날짜 형식을 확인하세요 YYYY-MM-DD hh:mm:ss');
			return \Redirect::back()->withInput();
		}

		$requested_course = \RequestedCourse::find(\Input::get('requested_course_id'));
		$curriculum_array = explode(',', \Input::get('curriculum'));
		$curriculum_id_array = array();
		foreach($curriculum_array as $curriculum_name) {
			try {
				$curriculum_id_array[] = \CourseSubType::where('name', $curriculum_name)->firstOrFail()->id;
			}
			catch(\Exception $e) {
				\Flash::error('희망과정을 확인해 주세요!');
				return \Redirect::back()->withInput();
			}
		}

		$requested_course->curriculum = implode(',', $curriculum_id_array);
		$requested_course->number_of_students = \Input::get('number_of_students');
		$requested_course->course_type = \Input::get('course_type');
		$requested_course->instructor_type = \Input::get('instructor_type');
		$requested_course->instructor_gender = \Input::get('instructor_gender');
		$requested_course->instructor_career = \Input::get('instructor_career');
		$requested_course->start_datetime = \Input::get('start_datetime');
		$requested_course->end_datetime = \Input::get('end_datetime');
		$requested_course->running_days = implode(',', \Input::get('running_days'));
		$requested_course->location = \Input::get('location');
		$requested_course->level_test = \Input::get('level_test');
		$requested_course->meeting_datetime = \Input::get('meeting_datetime');
		$requested_course->other_requests = \Input::get('other_requests');
		$requested_course->is_confirmed = true;
		$requested_course->confirmed_by = \Auth::user()->userable_id;

		$new_pre_course = new \PreCourse();
		$new_pre_course->hr_id = $requested_course->hr_id;
		$new_pre_course->company_id = $requested_course->company_id;
		$new_pre_course->requested_course_id = $requested_course->id;
		$new_pre_course->curriculum = implode(',', $curriculum_id_array);
		$new_pre_course->number_of_students = \Input::get('number_of_students');
		$new_pre_course->course_type = \Input::get('course_type');
		$new_pre_course->instructor_type = \Input::get('instructor_type');
		$new_pre_course->instructor_gender = \Input::get('instructor_gender');
		$new_pre_course->instructor_career = \Input::get('instructor_career');
		$new_pre_course->start_datetime = \Input::get('start_datetime');
		$new_pre_course->end_datetime = \Input::get('end_datetime');
		$new_pre_course->running_days = implode(',', \Input::get('running_days'));
		$new_pre_course->location = \Input::get('location');
		$new_pre_course->level_test = \Input::get('level_test');
		$new_pre_course->meeting_datetime = \Input::get('meeting_datetime');
		$new_pre_course->other_requests = \Input::get('other_requests');
		$new_pre_course->status = '진행 중';

		\DB::beginTransaction();
		try {
			$requested_course->save();
			$new_pre_course->save();
			\DB::commit();
		}
		catch(\Exception $e) {
			\Flash::error('오류가 발생하였습니다. 다시 진행해 주세요');
			\DB::rollback();
			return \Redirect::back()->withInput();
		}

		\Flash::success('성공적으로 승인요청이 진행되었습니다. 학생을 등록해 주세요.');
		return \Redirect::route('Trinity.Consultant.coursesManagement.index');
	}

	public function coursesManagementPreCoursesCreate() {
		$rules = array(
			'company' => 'required',
			'hr' => 'required',
			'curriculum' => 'required',
			'number_of_students' => 'required',
			'course_type' => 'required',
			'instructor_type' => 'required',
			'instructor_gender' => 'required',
			'instructor_career' => 'required',
			'start_datetime' => 'required',
			'end_datetime' => 'required',
			'running_days' => 'required|array',
			'location' => 'required',
			'level_test' => 'required',
			'meeting_datetime' => 'required',
		);

		$validator = \Validator::make(\Input::all(), $rules);

		if ($validator->fails()) {
			\Flash::error('필수 항목을 확인해 주세요!');
			return \Redirect::back()->withInput();
		}

		$curriculum_id_array = array();
		$curriculum_array = explode(',', \Input::get('curriculum'));
		foreach($curriculum_array as $curriculum) {
			$find_curriculum = \CourseSubType::where('name', $curriculum)->first();
			if (is_null($find_curriculum)) {
				\Flash::error('희망과정 선택란을 확인해 주세요');
				return \Redirect::back()->withInput();
			}
			$curriculum_id_array[] = $find_curriculum->id;
		}

		$start_datetime = $this->dateTimeParser(\Input::get('start_datetime'));
		$end_datetime = $this->dateTimeParser(\Input::get('end_datetime'));
		$meeting_datetime = $this->dateTimeParser(\Input::get('meeting_datetime'));

		\DB::beginTransaction();

		try {
			\PreCourse::create([
				'hr_id' => \Input::get('hr'),
				'company_id' => \Input::get('company'),
				'curriculum' => implode(',', $curriculum_id_array),
				'number_of_students' => \Input::get('number_of_students'),
				'course_type' => \Input::get('course_type'),
				'instructor_type' => \Input::get('instructor_type'),
				'instructor_gender' => \Input::get('instructor_gender'),
				'instructor_career' => \Input::get('instructor_career'),
				'start_datetime' => $start_datetime,
				'end_datetime' => $end_datetime,
				'running_days' => implode(',', \Input::get('running_days')),
				'location' => \Input::get('location'),
				'level_test' => \Input::get('level_test'),
				'meeting_datetime' => $meeting_datetime,
				'other_requests' => \Input::get('other_requests'),
				'status' => '진행 중'
			]);

			\DB::commit();
		}
		catch(\Exception $e) {

			\DB::rollback();

			\Flash::error('죄송합니다 오류가 발생했습니다. 다시 시도해 주세요');
			return \Redirect::back()->withInput();
		}

		\Flash::success('요청하신 클래스가 성공적으로 요청되었습니다. 학생을 등록해 주세요.');
		return \Redirect::back();
	}

	public function coursesManagementPreCoursesRegisterStudents($pre_course_id) {

        \DB::beginTransaction();

        $pre_course = \PreCourse::find($pre_course_id);

		if(count(\Input::get('existing_students')) > 0) {
            try{
                $pre_course->students()->attach(\Input::get('existing_students'));
                \DB::commit();
            }
			catch(\Exception $e) {
                \DB::rollback();

                \Flash::error('죄송합니다 오류가 발생했습니다. 다시 시도해 주세요');
                return \Redirect::back()->withInput();
            }
		}

        $number_of_student_name = count(\Input::get('student_name'));
        $number_of_student_email = count(\Input::get('student_email'));

        if($number_of_student_name != $number_of_student_email) {
            \Flash::error('죄송합니다 오류가 발생했습니다. 다시 시도해 주세요');
            return \Redirect::back()->withInput();
        }

        if($number_of_student_name > 0) {
            $company_id = $pre_course->id;
            for($i = 0; $i < $number_of_student_name; $i++) {
                $user = \User::where('account_email', \Input::get('student_email')[$i])->first();
                $random_password = $this->GenerateString(10);
                if(is_null($user)) {
                    try {
                        $new_student = \Student::create([
                            'company_id' => $company_id
                        ]);
                        $new_student->user()->create([
                            'name_kor' => \Input::get('student_name')[$i],
                            'account_email' => \Input::get('student_email')[$i],
                            'password' => \Hash::make($random_password)
                        ]);
                        $pre_course->students()->attach($new_student->id);

                        \Mail::queue('TrinityConsultantView::mails.usersManagement.successfullyRegistered',
                            array('user' => $new_student->user,
                                'random_password' => $random_password),
                            function($message) use ($new_student) {
                                $message->to($new_student->user->account_email,
                                    $new_student->user->name_kor);
                            });
                        \DB::commit();
                    }
                    catch(\Exception $e) {
                        \DB::rollback();

                        \Flash::error('죄송합니다 오류가 발생했습니다. 다시 시도해 주세요');
                        return \Redirect::back()->withInput();
                    }
                }
                else {
                    $pre_course->students()->attach($user->userable_id);
                    \DB::commit();
                }
            }
        }

        \Flash::success('성공적으로 학생을 등록하였습니다.');
        return \Redirect::route('Trinity.Consultant.coursesManagement.preCourses.registerStudents');
	}

    public function coursesManagementPreCoursesModify($pre_course_id) {
        if(count(\Input::get('cancel_registration_ids')) > 0) {
            $pre_course = \PreCourse::find($pre_course_id);
            \DB::beginTransaction();
            try {
                $pre_course->students()->detach(\Input::get('cancel_registration_ids'));
                \DB::commit();
            }
            catch(\Exception $e) {
                \DB::rollback();
                \Flash::error('죄송합니다 오류가 발생했습니다. 다시 시도해 주세요');
                return \Redirect::back()->withInput();
            }

            \Flash::success('Pre 클래스 수정이 완료되었습니다.');
            return \Redirect::route('Trinity.Consultant.coursesManagement.preCourses.registerStudents');
        }
        return \Redirect::route('Trinity.Consultant.coursesManagement.preCourses.registerStudents');
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

	public function dateTimeParser($datetime_string) {
		$first_step = explode(' / ', $datetime_string);
		$date_part = explode(' : ', $first_step[0])[1];
		$time_part = explode(' : ', $first_step[1])[1];
		$time_part = str_replace('시 ', ':', $time_part);
		$time_part = str_replace('분', '', $time_part);
		return "".$date_part." ".$time_part;
	}
}
