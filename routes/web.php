<?php

// WEB GROUP
Route::group(['middleware' => ['web']], function () {

    Route::get('/', 'HomeController@index');

    Route::get('/about', 'AboutController@index');

    Route::get('/contacts', 'ContactsController@index');

    Route::get('/shipping', 'ShippingController@index');

    Route::get('/gallery/{path}', 'GalleryController@gallery');

    Route::get('/gallery/{path}/{id}', 'GalleryController@showIcon');

    // Route::get('/cart', 'HomeController@cart');

    Route::get('/checkout', 'CheckoutController@index');

    // AJAX requests

    Route::get('/get-last-icons', 'HomeController@lastIcons');

    Route::get('/get-galleries', 'GalleryController@getGalleries');

    Route::post('/make-order', 'OrdersController@makeOrder');

});
