<?php

namespace Trinity\Consultant\controllers;

class AjaxController extends \BaseController {

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

	public function companyCourseDetail($consultant_id, $company_id = null) {
		if(\Request::ajax()) {
			if($company_id != null) {
				return \View::make('TrinityConsultantView::pages.usersManagement.ajax.companyCourseDetail')
					->with('consultant', \Consultant::find($consultant_id))
					->with('company', \Company::find($company_id));
			}
			return \View::make('TrinityConsultantView::pages.usersManagement.ajax.companyCourseDetail')
				->with('consultant', \Consultant::find($consultant_id))
				->with('company', null);
		}
		return \Response::error('404');
	}

	public function companyList($consultant_id) {
		if(\Request::ajax()) {
			return \View::make('TrinityConsultantView::pages.usersManagement.ajax.companyList')
				->with('consultant', \Consultant::find($consultant_id));
		}
		return \Response::error('404');
	}

}
