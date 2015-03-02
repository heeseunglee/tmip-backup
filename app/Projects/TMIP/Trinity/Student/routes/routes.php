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

        \Route::get('index', array('as' => 'Trinity.Student.coursesManagement.index',
            'uses' => '\Trinity\Student\controllers\PagesController@coursesManagementIndex'));

        \Route::get('showIndividual', array('as' => 'Trinity.Student.coursesManagement.showIndividual',
            'uses' => '\Trinity\Student\controllers\PagesController@coursesManagementShowIndividual'));

    });

    \Route::group(array('prefix' => 'testsManagement'), function() {

        \Route::get('/', array('as' => 'Trinity.Student.testsManagement', function() {
            return \Redirect::route('Trinity.Student.testsManagement.takeTests');
        }));

        \Route::get('takeTests', array('as' => 'Trinity.Student.testsManagement.takeTests',
            'uses' => '\Trinity\Student\controllers\PagesController@testsManagementTakeTests'));

        \Route::get('showResults', array('as' => 'Trinity.Student.testsManagement.showResults',
            'uses' => '\Trinity\Student\controllers\PagesController@testsManagementShowResults'));

        \Route::group(array('prefix' => 'popups'), function() {

            \Route::get('takeTest/{lvl_test_id}', array('as' => 'Trinity.Student.testsManagement.popups.takeTest',
                'uses' => '\Trinity\Student\controllers\PagesController@testsManagementPopupsTakeTest'));

        });

    });
});