<?php
/**
 * Created by PhpStorm.
 * User: Heeseung
 * Date: 2015-01-12
 * Time: 오후 3:08
 */

namespace Trinity\Student\routes;

\Route::get('Student/firstLogin', array('as' => 'Trinity.Student.firstLogin', function() {
    return \View::make('TrinityStudentView::pages.firstLogin.firstLogin');
}));

\Route::post('Student/firstLogin/signUp', array('as' => 'Trinity.Student.firstLogin.signUp',
    'uses' => '\Trinity\Student\controllers\PostController@firstLoginSignUp'));

\Route::group(array('prefix' => 'Student', 'before' => array('auth', 'is_first_login')), function() {

    \Route::get('/', array('as' => 'Trinity.Student.index', function() {
        return \Redirect::route('Trinity.Student.coursesManagement');
    }));

    /**
     * 클래스 관리 페이지 시작
     */
    \Route::group(array('prefix' => 'coursesManagement'), function() {

        \Route::get('/', array('as' => 'Trinity.Student.coursesManagement', function() {
            return \Redirect::route('Trinity.Student.coursesManagement.index');
        }));

        \Route::get('/index', array('as' => 'Trinity.Student.coursesManagement.index',
            'uses' => '\Trinity\Student\controllers\PagesController@coursesManagementIndex'));

        \Route::get('/showIndividual', array('as' => 'Trinity.Student.coursesManagement.showIndividual',
            'uses' => '\Trinity\Student\controllers\PagesController@coursesManagementShowIndividual'));

    });
});