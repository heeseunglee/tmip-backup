<?php
/**
 * Created by PhpStorm.
 * User: finallee
 * Date: 15. 2. 9.
 * Time: 오후 1:09
 */

namespace Trinity\Hr\controllers;


class AjaxController extends \BaseController {
    public function courseManagementPopUpGetCourseSubTypes($course_main_type_id) {
        if(\Request::ajax()) {
            return \View::make('TrinityHrView::ajax.coursesManagement.getCourseSubTypes')
                ->with('course_main_type', \CourseMainType::find($course_main_type_id));
        }
        return \Response::error('404');
    }
}