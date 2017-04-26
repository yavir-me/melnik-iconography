<?php

// WEB GROUP
Route::group(['middleware' => ['web']], function () {

    Route::get('/', 'HomeController@index');

    Route::post('/make-order', 'OrdersController@makeOrder');

    Route::get('/about', 'AboutController@index');

    Route::get('/contacts', 'ContactsController@index');

    Route::get('/shipping', 'ShippingController@index');

    Route::get('/gallery/{path}', 'GalleryController@gallery');

    Route::get('/gallery/{path}/{id}', 'GalleryController@showIcon');

    // AJAX requests

    Route::get('/get-last-icons', 'HomeController@lastIcons');

    Route::get('/get-galleries', 'GalleryController@getGalleries');

});
