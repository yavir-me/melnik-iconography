<?php

// MANAGERS' GROUP
Route::group(['middleware' => ['web', 'managers']], function(){

    Route::get('/tasks', 'ManagerController@tasks');

});

// ADMINS' GROUP
Route::group(['middleware' => ['web', 'admins']], function(){

    Route::get('/earnings', 'AdminController@earnings');

});


// VISITORS' GROUP
Route::group(['middleware' => ['web', 'visitors']], function(){

    Route::get('/reset/{email}/{resetCode}', 'ForgotPasswordController@resetPassword');

    Route::post('/reset/{email}/{resetCode}', 'ForgotPasswordController@postResetPassword');

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
Route::get('/', 'MainController@index');

// Route::group(['prefix' => LaravelLocalization::setLocale()], function()
// {
//     /** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
//     Route::get('/', function()
//     {
//         return View::make('hello');
//     });

//     Route::get('test',function(){
//         return View::make('test');
//     });
// });



// defines the language of the site a client uses
// Route::get('{locale}', 'LanguageController@index');