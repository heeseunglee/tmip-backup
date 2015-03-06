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
    public function testsManagementTakeTestsIndex() {
        $current_user = \Auth::user();
        return \View::make('TrinityStudentView::pages.testsManagement.takeTests.index')
            ->with('pre_courses', $current_user->userable->preCourses);
    }

    public function testsManagementTakeTestsTake($lvl_test_id) {
        $lvl_test_pivot = \DB::table('students_attend_pre_courses')
                                ->where('lvl_test_id', $lvl_test_id)
                                ->first();
        if($lvl_test_pivot->lvl_test_proceed_step == 0) {
            return \View::make('TrinityStudentView::pages.testsManagement.takeTests.takeBeginnerTest');
        }
        if($lvl_test_pivot->lvl_test_proceed_step == 1) {

        }
        if($lvl_test_pivot->lvl_test_proceed_step == 2) {

        }
        if($lvl_test_pivot->lvl_test_proceed_step == 3) {

        }
    }
}
