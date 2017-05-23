<?php

// WEB GROUP
Route::group(['middleware' => ['web']], function () {

    Route::get('/', 'HomeController@index');

    Route::get('/about', 'AboutController@index');

    Route::get('/contacts', 'ContactsController@index');

    Route::get('/shipping', 'ShippingController@index');

    Route::get('/gallery/{path}', 'GalleryController@gallery');

    Route::get('/gallery/{path}/{id}', 'GalleryController@showIcon');

    Route::get('/checkout', 'CheckoutController@index');

    // AJAX requests
    Route::get('/get-last-icons/{id}', 'HomeController@lastIcons');
    Route::get('/get-galleries/{id}', 'GalleryController@getGalleries');
    Route::get('/get-by-category/{path}/{id}', 'GalleryController@getIconsByCat');
    Route::get('/get-icon/{id}/{lang}', 'GalleryController@getIcon');
    Route::post('/make-order', 'OrdersController@makeOrder');

    // ADMIN PART
    Route::get('/artisan', 'Artisan\SessionsController@create')->name('artisan');
    Route::post('/artisan', 'Artisan\SessionsController@store');
    Route::delete('/logout', 'Artisan\SessionsController@destroy');

    Route::get('/dashboard', 'Artisan\DashboardController@show')->name('dashboard');

    Route::get('/dashboard/galleries/{gallery}', 'Artisan\GalleriesController@show');
    Route::delete('/dashboard/galleries/icon/{id}', 'Artisan\GalleriesController@destroy');

    Route::get('/dashboard/{gallery}/{id}', 'Artisan\IconsController@show');
    Route::post('/dashboard/{gallery}/{id}', 'Artisan\IconsController@update');

    Route::get('/dashboard/add-to-gallery/{gallery}/create', 'Artisan\NewIconController@show');
    Route::post('/dashboard/add-to-gallery/{gallery}/create', 'Artisan\NewIconController@create');

    Route::get('/dashboard/orders', 'Artisan\OrdersController@show');

});
