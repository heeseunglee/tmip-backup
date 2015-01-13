<?php

namespace Trinity\Common\controllers;

class SessionController extends \BaseController {

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

	public function attemptLogin() {
		if(\Auth::attempt(\Input::only('account_email', 'password'))) {
			return \Redirect::route('Trinity.index');
		}
		\Flash::error('이메일 / 암호를 확인해 주세요');
		return \Redirect::back()->withInput();
	}

}
