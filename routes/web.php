<?php

// ADMINS' GROUP
Route::group(['middleware' => ['web', 'admins']], function(){

    Route::get('/earnings', 'AdminController@earnings');

});


// VISITORS' GROUP
Route::group(['middleware' => ['web', 'visitors']], function(){

    Route::get('/forgot-password', 'ForgotPasswordController@forgotPassword');

    Route::post('/forgot-password', 'ForgotPasswordController@postForgotPassword');

    Route::get('/register', 'RegistrationController@register');

    Route::post('/register', 'RegistrationController@postRegister');

    Route::get('/login', 'LoginController@login');

    Route::post('/login', 'LoginController@postLogin');

    Route::get('/activate/{email}/{activationCode}', 'ActivationController@activate');

});

// CLIENTS' GROUP
Route::group(['middleware' => ['web', 'clients']], function(){

    Route::get('/logout', 'LoginController@logout');

});

// WEB GROUP
Route::group(['middleware' => ['web']], function(){

    Route::get('/', 'MainController@index');

    Route::post('/make-order', 'OrdersController@makeOrder');

    Route::get('/reset/{email}/{resetCode}', 'ForgotPasswordController@resetPassword');

    Route::post('/reset/{email}/{resetCode}', 'ForgotPasswordController@postResetPassword');

});

// OAuth authentication
Route::get('auth/facebook', 'Auth\RegisterController@redirectToProvider');
Route::get('auth/facebook/callback', 'Auth\RegisterController@handleProviderCallback');


// defines the language of the site a client uses
// Route::get('{locale}', 'LanguageController@index');