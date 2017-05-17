<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/project-notes', function () {
    return view('project-notes');
});

Route::get('/login', 'AuthController@showLoginPage');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/attorneys', 'AttorneyController@index')->middleware('auth');

Route::get('/attorney/{id}', 'AttorneyController@show')->middleware('auth');

Route::get('/favorite-attorney/{id}', 'AttorneyController@favoriteAttorney')->middleware('auth');

