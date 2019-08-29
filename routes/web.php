<?php
Route::get('logout', 'Auth\LoginController@logout');


Auth::routes();
Route::group(['middleware' => ['auth']], function () {
    Route::get('/items', 'ItemsController@index');
    Route::get('/locations', 'LocationsController@index');
    Route::get('/projects', 'ProjectsController@index');
    Route::get('/users', 'UsersController@index');
    Route::get('/purchase', 'PurchaseController@index');
    Route::get('', 'ProjectsController@index');
});
