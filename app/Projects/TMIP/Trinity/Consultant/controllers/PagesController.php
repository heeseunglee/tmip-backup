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

	public function coursesManagementIndex() {
		return \View::make('TrinityConsultantView::pages.coursesManagement.index');
	}

	public function usersManagementIndex() {
		$consultants = \Consultant::all();
		$hrs = \Hr::all();
		$instructors = \Instructor::all();
		$students = \Student::all();
		return \View::make('TrinityConsultantView::pages.usersManagement.index')
			->with('consultants', $consultants)
			->with('hrs', $hrs)
			->with('instructors', $instructors)
			->with('students', $students);
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
			->with('companies', \Company::all());
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

	public function clientsManagementIndex() {
		return \View::make('TrinityConsultantView::pages.clientsManagement.index')
			->with('companies', \Company::all());
	}

	public function clientsManagementClientRegistration() {
		return \View::make('TrinityConsultantView::pages.clientsManagement.clientRegistration');
	}

}
