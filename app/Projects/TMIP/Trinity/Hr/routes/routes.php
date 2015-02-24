<?php
/**
 * Created by PhpStorm.
 * User: Heeseung
 * Date: 2015-01-12
 * Time: 오후 3:08
 */

namespace Trinity\Hr\routes;

\Route::get('Hr/firstLogin', array('as' => 'Trinity.Hr.firstLogin', function() {
    return \View::make('TrinityHrView::pages.firstLogin.firstLogin');
}));

\Route::post('Hr/firstLogin/signUp', array('as' => 'Trinity.Hr.firstLogin.signUp',
    'uses' => '\Trinity\Hr\controllers\PostController@firstLoginSignUp'));

/**
 * 주소 프리픽싱
 * tmip.themandarin.co.kr/Hr/...
 */
\Route::group(array('prefix' => 'Hr', 'before' => array('auth', 'is_first_login')), function() {

    \Route::get('/', array('as' => 'Trinity.Hr.index', function() {
        return \Redirect::route('Trinity.Hr.coursesManagement');
    }));

    /**
     * 클래스 관리 페이지 시작
     */
    \Route::group(array('prefix' => 'coursesManagement'), function() {

        \Route::get('/', array('as' => 'Trinity.Hr.coursesManagement', function() {
            return \Redirect::route('Trinity.Hr.coursesManagement.index');
        }));

        \Route::get('index', array('as' => 'Trinity.Hr.coursesManagement.index',
            'uses' => '\Trinity\Hr\controllers\PagesController@coursesManagementIndex'));

        \Route::get('attendance', array('as' => 'Trinity.Hr.coursesManagement.attendance',
            'uses' => '\Trinity\Hr\controllers\PagesController@coursesManagementAttendance'));

        \Route::group(array('prefix' => 'newCourses'), function() {

            \Route::get('/', array('as' => 'Trinity.Hr.coursesManagement.newCourses',
                function() {
                    return \Route::route('Trinity.Hr.coursesManagement.newCourses.request');
                }));

            \Route::get('request', array('as' => 'Trinity.Hr.coursesManagement.newCourses.request',
                'uses' => '\Trinity\Hr\controllers\PagesController@coursesManagementNewCoursesRequest'));

            \Route::post('request',
                array('uses' => '\Trinity\Hr\controllers\PostController@coursesManagementNewCoursesRequest'));

            \Route::group(array('prefix' => 'popups'), function() {

                \Route::get('curriculum', function() {
                    return \View::make('TrinityHrView::pages.coursesManagement.popups.curriculum')
                        ->with('course_main_types', \CourseMainType::all());
                });

            });

            /**
             * ajax 루틴 처리
             */
            \Route::group(array('prefix' => 'ajax'), function() {

                \Route::get('getCourseSubTypes/{course_main_type_id}',
                    array('uses' => '\Trinity\Hr\controllers\AjaxController@courseManagementPopUpGetCourseSubTypes'));

            });

        });

    });
       
});