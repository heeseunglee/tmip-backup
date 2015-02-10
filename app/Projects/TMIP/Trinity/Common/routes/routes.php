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

\Route::get('logout', array('as' => 'Trinity.logout',
    'uses' => '\Trinity\Common\controllers\SessionController@attemptLogout'));

\Route::post('attemptLogin', array('as' => 'Trinity.session.attemptLogin',
    'uses' => '\Trinity\Common\controllers\SessionController@attemptLogin'));

\Route::post('attemptLogout', array('as' => 'Trinity.session.attemptLogout',
    'uses' => '\Trinity\Common\controllers\SessionController@attemptLogout'));

\Route::get('jobPool/signUp', array('as' => 'Trinity.jobPool.signUp',
    'uses' => '\Trinity\Common\controllers\PagesController@jobPoolSignUp'));

\Route::post('jobPool/signUp', array('as' => 'Trinity.jobPool.signUp.create',
    'uses' => '\Trinity\Common\controllers\PagesController@jobPoolSignUpCreate'));

\Route::get('jobPool/signUp/profileImages/{signup_form_id}', function($signup_form_id)
{
    $file_path = app_path().'/Projects/TMIP/Trinity/Common/resources/jobPool/profileImages/'
        .$signup_form_id.'/'.\JobPoolSignUpForm::find($signup_form_id)->profile_image;
    return \Response::download($file_path);
});

\Route::get('company/logoImages/{company_id}', function($company_id) {
    $company = \Company::find($company_id);
    $file_path = app_path()
                .'/Projects/TMIP/Trinity/Common/resources/images/clients/logos/'
                .$company->logo_image;
    return \Response::download($file_path);
});

\Route::get('user/profileImage/big/{user_id}', function($user_id) {
    $user = \User::find($user_id);
    $file_path = app_path()
        .'/Projects/TMIP/Trinity/Common/resources/images/users/big_profiles/'
        .$user->profile_image;
    return \Response::download($file_path);
});

\Route::get('user/profileImage/small/{user_id}', function($user_id) {
    $user = \User::find($user_id);
    $file_path = app_path()
        .'/Projects/TMIP/Trinity/Common/resources/images/users/small_profiles/'
        .$user->profile_image;
    return \Response::download($file_path);
});

\Route::get('msFirm/signUp', array('as' => 'Trinity.msFirm.signUp',
    'uses' => '\Trinity\Common\controllers\PagesController@msFirmSignUp'));

\Route::post('msFirm/signUp', array('as' => 'Trinity.msFirm.signUp.create',
    'uses' => '\Trinity\Common\controllers\PagesController@msFirmSignUpCreate'));
