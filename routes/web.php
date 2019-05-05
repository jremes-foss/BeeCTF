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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', 'HomeController@admin')
	->middleware('is_admin')
	->name('admin');

Route::get('admin/challenges', 'ChallengeController@indexAdmin', function () {
    return view('admin.challenges');
})->name('adminchallenges');

Route::get('/challenges', 'ChallengeController@indexUser');