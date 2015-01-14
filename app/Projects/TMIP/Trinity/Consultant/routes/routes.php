<?php
/**
 * Created by PhpStorm.
 * User: Heeseung
 * Date: 2015-01-12
 * Time: 오후 3:08
 */

namespace Trinity\Consultant\routes;

/**
 * 주소 프리픽싱
 * tmip.themandarin.co.kr/Consultant/...
 */
\Route::group(array('prefix' => 'Consultant', 'before' => 'auth'), function() {

    \Route::get('/', array('as' => 'Trinity.Consultant.index', function() {
        return \Redirect::route('Trinity.Consultant.coursesManagement');
    }));

    /**
     * 클래스 관리 페이지 시작
     */
    \Route::group(array('prefix' => 'coursesManagement'), function() {

        \Route::get('/', array('as' => 'Trinity.Consultant.coursesManagement', function() {
            return \Redirect::route('Trinity.Consultant.coursesManagement.index');
        }));

        \Route::get('/index', array('as' => 'Trinity.Consultant.coursesManagement.index',
            'uses' => '\Trinity\Consultant\controllers\PagesController@coursesManagementIndex'));

    });

    \Route::group(array('prefix' => 'usersManagement'), function() {

        \Route::get('/', array('as' => 'Trinity.Consultant.usersManagement', function() {
            return \Redirect::route('Trinity.Consultant.usersManagement.index');
        }));

        \Route::get('/index', array('as' => 'Trinity.Consultant.usersManagement.index',
            'uses' => '\Trinity\Consultant\controllers\PagesController@usersManagementIndex'));

        \Route::get('/hrs', array('as' => 'Trinity.Consultant.usersManagement.hrs',
            'uses' => '\Trinity\Consultant\controllers\PagesController@usersManagementHrs'));

        \Route::get('/consultants', array('as' => 'Trinity.Consultant.usersManagement.consultants',
            'uses' => '\Trinity\Consultant\controllers\PagesController@usersManagementConsultants'));

        \Route::get('/students', array('as' => 'Trinity.Consultant.usersManagement.students',
            'uses' => '\Trinity\Consultant\controllers\PagesController@usersManagementStudents'));

        \Route::get('/instructors', array('as' => 'Trinity.Consultant.usersManagement.instructors',
            'uses' => '\Trinity\Consultant\controllers\PagesController@usersManagementInstructors'));

        \Route::get('/usersRegistration', array('as' => 'Trinity.Consultant.usersManagement.usersRegistration',
            'uses' => '\Trinity\Consultant\controllers\PagesController@usersManagementUsersRegistration'));

        \Route::post('/usersRegistration/signUpStudentsManually',
            array('as' => 'Trinity.Consultant.usersManagement.usersRegistration.signUpStudentsManually',
            'uses' => '\Trinity\Consultant\controllers\PostController@signUpStudentsManually'));

        /**
         * ajax 처리를 위한 라우팅 추가
         */
        \Route::group(array('prefix' => 'ajax'), function() {
            \Route::get('/companyCourseDetail/{consultant_id}/{company_id?}', array('uses' => '\Trinity\Consultant\controllers\AjaxController@companyCourseDetail'));

            \Route::get('/companyList/{consultant_id}', array('uses' => '\Trinity\Consultant\controllers\AjaxController@companyList'));
        });
    });
});