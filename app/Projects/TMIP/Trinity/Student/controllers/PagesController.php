<?php

namespace Trinity\Student\controllers;

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
     * --------------------------------------------------------------------------
     * 클래스 관리
     * --------------------------------------------------------------------------
     * @return mixed
     */
	public function coursesManagementIndex() {
		return \View::make('TrinityStudentView::pages.coursesManagement.index');
	}

    /**
     * --------------------------------------------------------------------------
     * 테스트 관리
     * --------------------------------------------------------------------------
     * @return mixed
     */
    public function testsManagementTakeTests() {
        $current_user = \Auth::user();
        return \View::make('TrinityStudentView::pages.testsManagement.takeTests')
            ->with('pre_courses', $current_user->userable->preCourses);
    }

    public function testsManagementPopupsTakeTest($lvl_test_id) {
        return \View::make('TrinityStudentView::pages.testsManagement.popups.takeTest')
            ->with('lvl_test', \LvlTest::find($lvl_test_id));
    }
}
