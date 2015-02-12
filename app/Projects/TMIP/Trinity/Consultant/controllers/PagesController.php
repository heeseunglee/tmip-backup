<?php

namespace Trinity\Consultant\controllers;

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

	function __construct() {
		$current_user = \Auth::user();
		\View::share('current_user', $current_user);
	}

	/**
	 * @return mixed
	 *
	 * 클래스 관리
	 */
	public function coursesManagementIndex() {
		//dd(\Session::all());
		return \View::make('TrinityConsultantView::pages.coursesManagement.index');
	}

	public function coursesManagementRequestedCoursesIndex() {
		return \View::make('TrinityConsultantView::pages.coursesManagement.requestedCourses.index')
			->with('requested_courses', \RequestedCourse::all());
	}

	public function coursesManagementRequestedCoursesConfirm($requested_course_id) {
		return \View::make('TrinityConsultantView::pages.coursesManagement.requestedCourses.confirm')
			->with('requested_course', \RequestedCourse::find($requested_course_id));
	}

	public function coursesManagementPreCoursesIndex() {
		return \View::make('TrinityConsultantView::pages.coursesManagement.preCourses.index');
	}

	public function coursesManagementPreCoursesCreate() {
		return \View::make('TrinityConsultantView::pages.coursesManagement.preCourses.create');
	}

	public function coursesManagementPreCoursesShow($pre_course_id) {
		return \View::make('TrinityConsultantView::pages.coursesManagement.preCourses.show')
			->with('pre_course', \PreCourse::find($pre_course_id));
	}

	public function coursesManagementPreCoursesRegisterStudents($pre_course_id = null) {
		if(is_null($pre_course_id))
			return \View::make('TrinityConsultantView::pages.coursesManagement.preCourses.registerStudents')
				->with('pre_courses', \PreCourse::where('status', '학생 등록')->get());

		return \View::make('TrinityConsultantView::pages.coursesManagement.preCourses.registerStudentsDirectly')
			->with('pre_course', \PreCourse::find($pre_course_id));
	}

	/**
	 * @return mixed
	 *
	 * 사용자 관리
	 */
	public function usersManagementIndex() {
		return \View::make('TrinityConsultantView::pages.usersManagement.index')
			->with('consultants', \Consultant::all())
			->with('hrs', \Hr::all())
			->with('instructors', \Instructor::all())
			->with('students', \Student::all());
	}

	public function usersManagementHrs() {
		return \View::make('TrinityConsultantView::pages.usersManagement.hrs');
	}

	public function usersManagementInstructors() {
		return \View::make('TrinityConsultantView::pages.usersManagement.instructors');
	}

	public function usersManagementStudents() {
		return \View::make('TrinityConsultantView::pages.usersManagement.students');
	}

	public function usersManagementConsultants() {
		return \View::make('TrinityConsultantView::pages.usersManagement.consultants');
	}

	public function usersManagementUsersRegistration() {
		return \View::make('TrinityConsultantView::pages.usersManagement.usersRegistration')
			->with('companies', \Company::all())
			->with('consultants', \Consultant::all());
	}

	public function jobPoolSignUpForm($form_id = null) {
		if($form_id != null) {
			return \View::make('TrinityConsultantView::pages.usersManagement.jobPoolSignUpFormDetail')
				->with('form', \JobPoolSignUpForm::find($form_id));
		}
		return \View::make('TrinityConsultantView::pages.usersManagement.jobPoolSignUpForm')
			->with('signup_forms', \JobPoolSignUpForm::all());
	}

	public function msFirmSignUpForm($form_id = null) {
		if($form_id != null) {
			$company = \MsFirmCompany::find($form_id);
			return \View::make('TrinityConsultantView::pages.usersManagement.msFirmSignUpFormDetail')
				->with('company', $company);
		}
		$companies = \MsFirmCompany::all();
			return \View::make('TrinityConsultantView::pages.usersManagement.msFirmSignUpForm')
				->with('companies', $companies);
	}

	/**
	 * @return mixed
	 *
	 * 고객사 관리
	 */
	public function clientsManagementIndex() {
		return \View::make('TrinityConsultantView::pages.clientsManagement.index')
			->with('companies', \Company::all());
	}

	public function clientsManagementRegistration() {
		return \View::make('TrinityConsultantView::pages.clientsManagement.Registration');
	}

}
