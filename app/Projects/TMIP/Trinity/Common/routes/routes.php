<?php
/**
 * Created by PhpStorm.
 * User: Heeseung
 * Date: 2015-01-12
 * Time: 오후 3:08
 */

namespace Trinity\Common\routes;

\Route::get('/', array('as' => 'Trinity.index',
    'uses' => '\Trinity\Common\controllers\PagesController@index',
    'before' =>  'auth'));

\Route::get('login', array('as' => 'Trinity.login',
    'uses' => '\Trinity\Common\controllers\PagesController@showLogin'));

\Route::post('attemptLogin', array('as' => 'Trinity.session.attemptLogin',
    'uses' => '\Trinity\Common\controllers\SessionController@attemptLogin'));

\Route::post('attemptLogout', array('as' => 'Trinity.session.attemptLogout',
    'uses' => '\Trinity\Common\controllers\SessionController@attemptLogout'));

\Route::get('/jobPool/signUp', array('as' => 'Trinity.jobPool.signUp',
    'uses' => '\Trinity\Common\controllers\PagesController@jobPoolSignUp'));

\Route::post('/jobPool/signUp', array('as' => 'Trinity.jobPool.signUp.create',
    'uses' => '\Trinity\Common\controllers\PagesController@jobPoolSignUpCreate'));

\Route::get('/jobPool/signUpComplete/{jobpool_signup_form_id}', array('as' => 'Trinity.jobPool.signUpComplete',
    'uses' => '\Trinity\Common\controllers\PagesController@jobPoolSignUpComplete'));