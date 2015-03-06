<?php
/**
 * Created by PhpStorm.
 * User: finallee
 * Date: 15. 3. 6.
 * Time: 오후 12:44
 */

namespace Trinity\Student\controllers;


class AjaxController extends \BaseController {

    public function testsManagementTakeTestsStartTest($lvl_test_id) {
        if(\Request::ajax()) {
            $lvl_test_pivot = \DB::table('students_attend_pre_courses')
                                ->where('lvl_test_id', $lvl_test_id)
                                ->first();
            $lvl_test_status = $lvl_test_pivot->lvl_test_status;
            $lvl_test_started_at = strtotime($lvl_test_pivot->lvl_test_started_at);
            $now = strtotime("now");
            $result = ($now - $lvl_test_started_at) * 1000;

            if($lvl_test_status == "일시정지") {
                return \View::make('TrinityStudentView::ajax.testsManagement.takeTests.resumeTest')
                    ->with('lvl_test_id', $lvl_test_id);
            }

            if($lvl_test_status == "진행중") {

                if($result > 1200000) {
                    \DB::transaction(function() use ($lvl_test_id) {
                        \DB::table('students_attend_pre_courses')
                            ->where('lvl_test_id', $lvl_test_id)
                            ->update(array('lvl_test_status' => '완료'));
                    });
                    return \View::make('TrinityStudentView::ajax.testsManagement.takeTests.testFinished')
                        ->with('lvl_test_id', $lvl_test_id);
                }

                \DB::transaction(function() use ($lvl_test_id, $result) {
                    \DB::table('students_attend_pre_courses')
                        ->where('lvl_test_id', $lvl_test_id)
                        ->update(array('lvl_test_time_left' => 1200000 - $result));
                });

                return \View::make('TrinityStudentView::ajax.testsManagement.takeTests.resumeTest')
                    ->with('lvl_test_id', $lvl_test_id);
            }
            return \View::make('TrinityStudentView::ajax.testsManagement.takeTests.startTest')
                ->with('lvl_test_id', $lvl_test_id);
        }
        return \Response::error('404');
    }

    public function testsManagementTakeTest($lvl_test_id) {
        if(\Request::ajax()) {
            \DB::transaction(function() use($lvl_test_id) {
                \DB::table('students_attend_pre_courses')
                    ->where('lvl_test_id', $lvl_test_id)
                    ->update(array('lvl_test_status' => '진행중',
                                    'lvl_test_started_at' => date("Y-m-d H:i:s")));
            });
            return \View::make('TrinityStudentView::ajax.testsManagement.takeTest')
                ->with('lvl_test', \LvlTest::find($lvl_test_id));
        }
        return \Response::error('404');
    }

    public function testsManagementPauseTest($lvl_test_id, $lvl_test_time_left) {
        if(\Request::ajax()) {
            \DB::transaction(function() use ($lvl_test_id, $lvl_test_time_left) {
                \DB::table('students_attend_pre_courses')
                    ->where('lvl_test_id', $lvl_test_id)
                    ->update(array('lvl_test_status' => '일시정지',
                                    'lvl_test_time_left' => $lvl_test_time_left));
            });
        }
        return \Response::error('404');
    }

}