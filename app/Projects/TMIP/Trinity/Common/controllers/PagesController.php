<?php

namespace Trinity\Common\controllers;

class PagesController extends \BaseController {

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

	public function showLogin() {
		return \View::make('TrinityCommonView::pages.beforeLogin.login');
	}

	/**
	 * 인덱스 컨트롤러는 사용자가 로그인 한 후
	 * 롤을 판단하여 롤에 해당하는 루팅 테이블로 안내함
	 */
	public function index() {
		$current_user = \Auth::user();
		$user_role = $current_user->userable_type;
		return \Redirect::route('Trinity.'.$user_role.'.index');
	}

	public function jobPoolSignUp() {
		return \View::make('TrinityCommonView::pages.jobPool.signUp')
			->with('prefer_area_groups', \PreferAreaGroup::all());
	}

	public function jobPoolSignUpCreate()
	{
		if (!\Input::hasFile('profile_image')) {
			return \Redirect::back()->withInput();
		}

		$rules = array(
			'profile_image' => 'required|max:2000|mimes:jpg,jpeg,png,gif,bmp',
		);

		$validator = \Validator::make(\Input::all(), $rules);

		if ($validator->fails()) {
			return \Redirect::back()->withInput()->withErrors($validator);
		}

		if (\JobPoolSignUpForm::where('email', \Input::get('email'))->get()->count() > 0) {
			return \View::make('TrinityCommonView::pages.jobPool.signUpFail')
				->with('exist', \JobPoolSignUpForm::where('email', \Input::get('email'))->first());
		}

		$new_jobpool_signup_form = \JobPoolSignUpForm::create([
			'name_kor' => \Input::get('name_kor'),
			'name_eng' => \Input::get('name_eng'),
			'name_chn' => \Input::get('name_chn'),
			'email' => \Input::get('email'),
			'phone_number' => \Input::get('phone_number'),
			'date_of_birth' => \Input::get('date_of_birth'),
			'gender' => \Input::get('gender')[0],
			'visa_type' => \Input::get('visa_type')[0],
			'postcode_1' => \Input::get('postcode_1'),
			'postcode_2' => \Input::get('postcode_2'),
			'address_1' => \Input::get('address_1'),
			'address_2' => \Input::get('address_2'),
			'academic_background' => \Input::get('academic_background'),
			'name_of_last_school' => \Input::get('name_of_last_school'),
			'major' => \Input::get('major'),
			'available_time_morning_start' => \Input::get('available_time_morning_start'),
			'available_time_morning_end' => \Input::get('available_time_morning_end'),
			'available_time_afternoon_start' => \Input::get('available_time_afternoon_start'),
			'available_time_afternoon_end' => \Input::get('available_time_afternoon_end'),
			'available_time_night_start' => \Input::get('available_time_night_start'),
			'available_time_night_end' => \Input::get('available_time_night_end'),
			'study_aboard_background' => \Input::get('study_aboard_background'),
			'career_years' => \Input::get('career_years'),
			'resume' => \Input::get('resume'),
		]);

		$new_jobpool_signup_form_id = $new_jobpool_signup_form->id;

		foreach(\Input::get('prefer_area_lists') as $area_id) {
			$new_jobpool_signup_form->preferedAreas()->attach($area_id);
		}

		for ($i = 1; $i < 11; $i++) {
			if(\Input::get('career_detail_'.$i.'_company_name') != "" ||
				\Input::get('career_detail_'.$i.'_type') != "" ||
				\Input::get('career_detail_'.$i.'_description') != "" ||
				\Input::get('career_detail_'.$i.'_period') != "") {
				\JobPoolCareerDetail::create([
					'jobpool_signup_form_id' => $new_jobpool_signup_form_id,
					'career_detail_company_name' => \Input::get('career_detail_'.$i.'_company_name'),
					'career_detail_type' => \Input::get('career_detail_'.$i.'_type'),
					'career_detail_description' => \Input::get('career_detail_'.$i.'_description'),
					'career_detail_period' => \Input::get('career_detail_'.$i.'_period'),
				]);
			}
		}

		$file = \Input::file('profile_image');
		$profile_image_path = app_path().'/Projects/TMIP/Trinity/Common/resources/jobPool/profileImages/'.$new_jobpool_signup_form_id;

		if(!\File::exists($profile_image_path)) {
			\File::makeDirectory($profile_image_path, 0775, true);
		}

		$fileName = time().'.'.$file->getClientOriginalExtension();

		$file->move($profile_image_path, $fileName);

		$new_jobpool_signup_form->profile_image = $fileName;
		$new_jobpool_signup_form->save();

		return \View::make('TrinityCommonView::pages.jobPool.signUpComplete')->with('jobpool_signup_form', $new_jobpool_signup_form);
	}
}
