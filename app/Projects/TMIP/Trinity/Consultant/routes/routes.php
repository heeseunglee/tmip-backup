<?php
/**
 * Created by PhpStorm.
 * User: Heeseung
 * Date: 2015-01-12
 * Time: 오후 3:08
 */

namespace Trinity\Consultant\routes;



\Route::get('Consultant/firstLogin', array('as' => 'Trinity.Consultant.firstLogin', function() {
    return \View::make('TrinityConsultantView::pages.firstLogin.firstLogin');
}));

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

        \Route::get('/index',
            array('as' => 'Trinity.Consultant.usersManagement.index',
                'uses' => '\Trinity\Consultant\controllers\PagesController@usersManagementIndex'));

        \Route::get('/hrs',
            array('as' => 'Trinity.Consultant.usersManagement.hrs',
                'uses' => '\Trinity\Consultant\controllers\PagesController@usersManagementHrs'));

        \Route::get('/consultants',
            array('as' => 'Trinity.Consultant.usersManagement.consultants',
                'uses' => '\Trinity\Consultant\controllers\PagesController@usersManagementConsultants'));

        \Route::get('/students',
            array('as' => 'Trinity.Consultant.usersManagement.students',
                'uses' => '\Trinity\Consultant\controllers\PagesController@usersManagementStudents'));

        \Route::get('/instructors',
            array('as' => 'Trinity.Consultant.usersManagement.instructors',
                'uses' => '\Trinity\Consultant\controllers\PagesController@usersManagementInstructors'));

        \Route::get('/usersRegistration',
            array('as' => 'Trinity.Consultant.usersManagement.usersRegistration',
                'uses' => '\Trinity\Consultant\controllers\PagesController@usersManagementUsersRegistration'));

        \Route::post('/usersRegistration/signUpStudentsManually',
            array('as' => 'Trinity.Consultant.usersManagement.usersRegistration.signUpStudentsManually',
                'uses' => '\Trinity\Consultant\controllers\PostController@signUpStudentsManually'));

        \Route::post('/usersRegistration/signUpInstructorsManually',
            array('as' => 'Trinity.Consultant.usersManagement.usersRegistration.signUpInstructorsManually',
                'uses' => '\Trinity\Consultant\controllers\PostController@signUpInstructorsManually'));

        \Route::post('/usersRegistration/signUpHrsManually',
            array('as' => 'Trinity.Consultant.usersManagement.usersRegistration.signUpHrsManually',
                'uses' => '\Trinity\Consultant\controllers\PostController@signUpHrsManually'));

        \Route::get('/jobPoolSignUpForm/{form_id?}',
            array('as' => 'Trinity.Consultant.usersManagement.jobPoolSignUpForm',
                'uses' => '\Trinity\Consultant\controllers\PagesController@jobPoolSignUpForm'));

        \Route::get('/msFirmSignUpForm/{form_id?}',
            array('as' => 'Trinity.Consultant.usersManagement.msFirmSignUpForm',
                'uses' => '\Trinity\Consultant\controllers\PagesController@msFirmSignUpForm'));

        /**
         * ajax 처리를 위한 라우팅 추가
         */
        \Route::group(array('prefix' => 'ajax'), function() {

            \Route::get('/companyCourseDetail/{consultant_id}/{company_id?}',
                array('uses' => '\Trinity\Consultant\controllers\AjaxController@companyCourseDetail'));

            \Route::get('/companyList/{consultant_id}',
                array('uses' => '\Trinity\Consultant\controllers\AjaxController@companyList'));
        });
    });

    \Route::group(array('prefix' => 'clientsManagement'), function(){

        \Route::get('/', array('as' => 'Trinity.Consultant.clientsManagement', function() {
            return \Redirect::route('Trinity.Consultant.clientsManagement.index');
        }));

        \Route::get('/index', array('as' => 'Trinity.Consultant.clientsManagement.index',
            'uses' => '\Trinity\Consultant\controllers\PagesController@clientsManagementIndex'));

        \Route::get('/clientRegistration', array('as' => 'Trinity.Consultant.clientsManagement.clientRegistration',
            'uses' => '\Trinity\Consultant\controllers\PagesController@clientsManagementClientRegistration'));

        \Route::post('/clientRegistration', array('as' => 'Trinity.Consultant.clientsManagement.signUpClient',
            'uses' => '\Trinity\Consultant\controllers\PostController@clientsManagementSignUpClient'));
    });
});