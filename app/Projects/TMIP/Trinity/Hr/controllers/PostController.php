<?php
/**
 * Created by PhpStorm.
 * User: finallee
 * Date: 15. 2. 6.
 * Time: 오후 4:32
 */

namespace Trinity\Hr\controllers;


class PostController extends \BaseController {
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
            'phone_number' => 'required');
        $validator = \Validator::make(\Input::all(), $rules);
        if($validator->fails()) {
            \Flash::error('필수 입력값을 확인해 주세요.');
            return \Redirect::back()->withInput();
        }

        if(!\Auth::check()) {
            return \Redirect::route('Trinity.index');
        }
        \DB::beginTransaction();
        try {
            $user = \Auth::user();
            $user->password = \Hash::make(\Input::get('password'));
            $user->name_eng = \Input::get('name_eng');
            $user->phone_number = preg_replace('/(^02.{0}|^01.{1}|[0-9]{3})([0-9]+)([0-9]{4})/',
                '$1-$2-$3',
                str_replace('_', '', \Input::get('phone_number')));
            $user->is_first_login = false;
            $user->save();
            \DB::commit();
        }
        catch(\Exception $e) {
            \DB::rollback();
            \Flash::error('죄송합니다 오류가 발생했습니다. 다시 시도해 주세요');
            return \Redirect::back()->withInput();
        }

        \Flash::success('개인정보를 성공적으로 업데이트했습니다. 환영합니다!');
        return \Redirect::route('Trinity.index');
    }

    public function coursesManagementNewCoursesRequest() {
        $rules = array(
            'curriculum' => 'required',
            'number_of_students' => 'required',
            'course_type' => 'required',
            'instructor_type' => 'required',
            'instructor_gender' => 'required',
            'instructor_career' => 'required',
            'running_days' => 'required|array',
            'location' => 'required',
            'level_test' => 'required',
        );

        $validator = \Validator::make(\Input::all(), $rules);

        if ($validator->fails()) {
            \Flash::error('필수 항목을 확인해 주세요!');
            return \Redirect::back()->withInput();
        }

        $datetime_rules = array(
            'start_date' => array('required',
                'regex:/20\d{2}(-|\/)((0[1-9])|(1[0-2]))(-|\/)((0[1-9])|([1-2][0-9])|(3[0-1]))/'),
            'start_time' => array('required',
                'regex:/(([0-1][0-9])|(2[0-3])):([0-5][0-9])/'),
            'end_date' => array('required',
                'regex:/20\d{2}(-|\/)((0[1-9])|(1[0-2]))(-|\/)((0[1-9])|([1-2][0-9])|(3[0-1]))/'),
            'end_time' => array('required',
                'regex:/(([0-1][0-9])|(2[0-3])):([0-5][0-9])/'),
            'meeting_date' => array('required',
                'regex:/20\d{2}(-|\/)((0[1-9])|(1[0-2]))(-|\/)((0[1-9])|([1-2][0-9])|(3[0-1]))/'),
            'meeting_time' => array('required',
                'regex:/(([0-1][0-9])|(2[0-3])):([0-5][0-9])/'),
        );

        $validator = \Validator::make(\Input::all(), $datetime_rules);

        if ($validator->fails()) {
            \Flash::error('시간 / 날짜 형식을 확인해 주세요!');
            return \Redirect::back()->withInput();
        }

        $curriculum_id_array = array();
        $curriculum_array = explode(',', \Input::get('curriculum'));
        foreach($curriculum_array as $curriculum) {
            $find_curriculum = \CourseSubType::where('name', $curriculum)->first();
            if (is_null($find_curriculum)) {
                \Flash::error('희망과정 선택란을 확인해 주세요');
                return \Redirect::back()->withInput();
            }
            $curriculum_id_array[] = $find_curriculum->id;
        }

        $start_datetime = \Input::get('start_date')." ".\Input::get('start_time');
        $end_datetime = \Input::get('end_date')." ".\Input::get('end_time');
        $meeting_datetime = \Input::get('meeting_date')." ".\Input::get('meeting_time');

        \DB::beginTransaction();

        try {
            $current_user = \Auth::user();
            \RequestedCourse::create([
                'hr_id' => $current_user->userable_id,
                'company_id' => $current_user->userable->company->id,
                'curriculum' => implode(',', $curriculum_id_array),
                'number_of_students' => \Input::get('number_of_students'),
                'course_type' => \Input::get('course_type'),
                'instructor_type' => \Input::get('instructor_type'),
                'instructor_gender' => \Input::get('instructor_gender'),
                'instructor_career' => \Input::get('instructor_career'),
                'start_datetime' => $start_datetime,
                'end_datetime' => $end_datetime,
                'running_days' => implode(',', \Input::get('running_days')),
                'location' => \Input::get('location'),
                'level_test' => \Input::get('level_test'),
                'meeting_datetime' => $meeting_datetime,
                'other_requests' => \Input::get('other_requests')
            ]);

            \DB::commit();
        }
        catch(\Exception $e) {

            \DB::rollback();

            return \Flash::error('죄송합니다 오류가 발생했습니다. 다시 시도해 주세요');
            return \Redirect::back()->withInput();
        }

        \Flash::success('요청하신 클래스가 성공적으로 요청되었습니다');
        return \Redirect::back();
    }
}