<?php
/**
 * Created by PhpStorm.
 * User: finallee
 * Date: 15. 2. 6.
 * Time: 오후 2:18
 */

namespace Trinity\Hr\controllers;

class PagesController extends \BaseController {

    function __construct() {
        $current_user = \Auth::user();
        \View::share('current_user', $current_user);
    }

    /**
     * 클래스 관리 컨트롤러
     */
    public function coursesManagementIndex() {
        return \View::make('TrinityHrView::pages.coursesManagement.index');
    }
    public function coursesManagementAttendance() {
        return \View::make('TrinityHrView::pages.coursesManagement.attendance');
    }
    public function coursesManagementNewCourseRequest() {
        return \View::make('TrinityHrView::pages.coursesManagement.newCourseRequest');
    }
}