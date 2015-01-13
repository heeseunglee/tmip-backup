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
		return \View::make('TrinityCommonView::pages.before_login.login');
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

}
