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

use App\Challenge;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

/** User Routes **/

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/challenges', 'ChallengesController@indexUser')->name('user.challenges');
Route::post('/challenges', 'ChallengesController@submitFlag')->name('user.submitflag');

Route::get('/challenges/{id}/download', 'ChallengesController@download')->name('user.download');

/** Admin Routes **/

Route::get('/admin', 'HomeController@admin')
	->middleware('is_admin')
	->name('admin');

Route::get('admin/challenges', 'ChallengesController@indexAdmin', function() {
    return view('admin.challenges');
})->name('admin.challenges');

Route::get('admin/challenges/create', 'ChallengesController@create', function() {
    return view('admin.challenges.create');
})->name('admin.challenges.create');

Route::post('admin/challenges/create', [
    'uses' => 'ChallengesController@store'
])->name('admin.challenges.store');

Route::get('admin/challenges/{id}/edit', 'ChallengesController@edit', function() {
    return view('admin.challenges.edit');
})->name('admin.challenges.edit');

Route::post('admin/challenges/{id}/update', [
    'uses' => 'ChallengesController@update'
])->name('admin.challenges.update');

Route::get('admin/challenges/{id}/delete', [
    'uses' => 'ChallengesController@destroy'
])->name('admin.challenges.delete');

Route::get('admin/categories', 'CategoriesController@index', function() {
    return view('admin.categories');
})->name('admin.categories');

Route::get('admin/categories/create', 'CategoriesController@create', function() {
    return view('admin.categories.create');
})->name('admin.categories.create');

Route::post('admin/categories/create', [
    'uses' => 'CategoriesController@store'
])->name('admin.categories.store');

Route::get('admin/categories/{id}/edit', 'CategoriesController@edit', function() {
    return view('admin.categories.edit');
})->name('admin.categories.edit');

Route::post('admin/categories/{id}/update', [
    'uses' => 'CategoriesController@update'
])->name('admin.categories.update');

Route::get('admin/categories/{id}/delete', [
    'uses' => 'CategoriesController@destroy'
])->name('admin.categories.delete');
