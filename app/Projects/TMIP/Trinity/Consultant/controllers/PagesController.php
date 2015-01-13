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
		return \View::make('TrinityConsultantView::pages.usersManagement.index')
			->with('consultants', $consultants);
	}

}
