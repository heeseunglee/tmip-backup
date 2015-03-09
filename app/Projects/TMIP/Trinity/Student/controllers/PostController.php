<?php
/**
 * Created by PhpStorm.
 * User: finallee
 * Date: 15. 2. 6.
 * Time: 오전 11:58
 */

namespace Trinity\Student\controllers;


class PostController extends \BaseController{
    public function firstLoginSignUp() {
        $image_rule = array('profile_image' => 'required|image');
        $validator = \Validator::make(\Input::all(), $image_rule);
        if($validator->fails()) {
            \Flash::error('프로필 사진을 업로드해 주세요');
            return \Redirect::back()->withInput();
        }

        $rules = array('password' => 'required',
                        'confirm_password' => 'required|same:password',
                        'name_eng' => 'required',
                        'phone_number' => 'required',
                        'position' => 'required',
                        'deputy' => 'required');
        $validator = \Validator::make(\Input::all(), $rules);
        if($validator->fails()) {
            \Flash::error('필수 입력값을 확인해 주세요.');
            return \Redirect::back()->withInput();
        }

        if(!\Auth::check()) {
            return \Redirect::route('Trinity.index');
        }
        $user = \Auth::user();
        $student = \Student::find($user->userable_id);
        $student->position = \Input::get('position');
        $student->deputy = \Input::get('deputy');
        $student->save();

        $user->password = \Hash::make(\Input::get('password'));
        $user->name_eng = \Input::get('name_eng');
        $user->phone_number = preg_replace('/(^02.{0}|^01.{1}|[0-9]{3})([0-9]+)([0-9]{4})/',
                                            '$1-$2-$3',
                                            str_replace('_', '', \Input::get('phone_number')));
        $user->is_first_login = false;
        $user->save();

        \Flash::success('개인정보를 성공적으로 업데이트했습니다. 환영합니다!');
        return \Redirect::route('Trinity.index');
    }

    public function testsManagementTakeTestsStartTest($lvl_test_id) {
        if(\Input::get('take_test')) {
            \DB::transaction(function() use ($lvl_test_id)
            {
                \DB::table('students_attend_pre_courses')
                    ->where('lvl_test_id', $lvl_test_id)
                    ->update(array('lvl_test_status' => '진행중',
                                    'lvl_test_started_at' => date("Y-m-d H:i:s")));
            });
            return \Redirect::route('Trinity.Student.testsManagement.takeTests.take', [$lvl_test_id]);
        }

        if(\Input::get('resume_test')) {
            \DB::transaction(function() use ($lvl_test_id) {
                \DB::table('students_attend_pre_courses')
                    ->where('lvl_test_id', $lvl_test_id)
                    ->update(array('lvl_test_status' => '진행중'));
            });
            return \Redirect::route('Trinity.Student.testsManagement.takeTests.take', [$lvl_test_id]);
        }

        if(\Input::get('give_up_test')) {
            \DB::transaction(function() use ($lvl_test_id) {
                \DB::table('students_attend_pre_courses')
                    ->where('lvl_test_id', $lvl_test_id)
                    ->update(array('lvl_test_status' => '완료'));
            });
            return \Redirect::route('Trinity.Student.testsManagement.takeTests.index');
        }
    }

    public function testsManagementTakeTestsTake($lvl_test_id) {
        if(\Input::get('submit')) {
            $lvl_test_time_left = \Input::get('lvl_test_time_left');
            $lvl_test_proceed_step = \DB::table('students_attend_pre_courses')
                                        ->where('lvl_test_id', $lvl_test_id)
                                        ->first()
                                        ->lvl_test_proceed_step;
            \DB::transaction(function() use ($lvl_test_id, $lvl_test_time_left, $lvl_test_proceed_step) {
                \DB::table('students_attend_pre_courses')
                    ->where('lvl_test_id', $lvl_test_id)
                    ->update(array('lvl_test_time_left' => $lvl_test_time_left,
                                    'lvl_test_proceed_step' => $lvl_test_proceed_step + 1));
            });

            if($lvl_test_proceed_step == 0) {
                $answer_1 = \Input::get('answer_1');
                $answer_2 = \Input::get('answer_2');
                $answer_3 = \Input::get('answer_3');
                $answer_4 = \Input::get('answer_4');
                $answer_5 = \Input::get('answer_5');

                $lvl_test = \LvlTest::find($lvl_test_id);
                $lvl_test_mc = \LvlTestMc::find($lvl_test->lvl_test_mc_id);

            }
        }
        if(\Input::get('pause')) {
            $lvl_test_time_left = \Input::get('lvl_test_time_left');
            \DB::transaction(function() use ($lvl_test_id, $lvl_test_time_left) {
                \DB::table('students_attend_pre_courses')
                    ->where('lvl_test_id', $lvl_test_id)
                    ->update(array('lvl_test_time_left' => $lvl_test_time_left,
                                    'lvl_test_status' => '일시정지'));
            });
            return \Redirect::route('Trinity.Student.testsManagement.takeTests.index');
        }
    }
}