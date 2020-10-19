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

Route::group(['middleware' => ['auth']], function() {
    Route::get('/challenges', 'ChallengesController@indexUser')->name('user.challenges');
    Route::post('/challenges', 'ChallengesController@submitFlag')->name('user.submitflag');
    Route::get('/challenges/{id}/download', 'ChallengesController@download')
        ->name('user.download');
    Route::get('/settings', 'SettingsController@index')->name('settings');
    Route::get('/scoreboard', 'ScoreController@getScores')->name('scoreboard');
    Route::get('/scontent', 'StaticContentController@index')->name('scontent');
    Route::get('/announcements', 'AnnouncementsController@indexUser')
        ->name('announcements');
    Route::post('/settings/updateApiToken', 'SettingsController@updateApiToken')
        ->name('user.updateApiToken');
});

Route::get('/home', 'HomeController@index')->name('home');

/** Admin Routes **/

Route::group(['middleware' => ['is_admin', 'auth']], function() {
    Route::get('/admin', 'HomeController@admin')
        ->name('admin');

    /** Challenges */

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


    /** Categories */

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

    /** Users */

    Route::get('admin/users', 'UserController@index', function() {
        return view('admin.users');
    })->name('admin.users');

    Route::get('admin/users/{id}/edit', [
        'uses' => 'UserController@edit'
    ])->name('admin.users.edit');

    Route::post('admin/users/{id}/update', [
        'uses' => 'UserController@update'
    ])->name('admin.users.update');

    Route::get('admin/users/{id}/delete', [
        'uses' => 'UserController@destroy'
    ])->name('admin.users.delete');

    /** Announcements */

    Route::get('admin/announcements', 'AnnouncementsController@indexAdmin', function() {
        return view('admin.announcements');
    })->name('admin.announcements');

    Route::get('admin/announcements/create', 'AnnouncementsController@create', function() {
        return view('admin.announcements.create');
    })->name('admin.announcements.create');

    Route::post('admin/announcements/create', [
        'uses' => 'AnnouncementsController@store'
    ])->name('admin.announcements.store');

    Route::get('admin/announcements/{id}/edit', [
        'uses' => 'AnnouncementsController@edit'
    ])->name('admin.announcements.edit');

    Route::post('admin/announcements/{id}/update', [
        'uses' => 'AnnouncementsController@update'
    ])->name('admin.announcements.update');

    Route::get('admin/announcements/{id}/delete', [
        'uses' => 'AnnouncementsController@destroy'
    ])->name('admin.announcements.delete');
});
