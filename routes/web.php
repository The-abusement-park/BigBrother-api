<?php

Route::get('/items', 'ItemsController@index');
Route::get('/locations', 'LocationsController@index');
Route::get('/projects', 'ProjectsController@index');
Route::get('/users', 'UsersController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
