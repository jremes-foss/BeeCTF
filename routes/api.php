<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('ping', 'ApiController@getPing');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:api')->get('categories', 'ApiController@getCategories');
Route::middleware('auth:api')->get('challenges', 'ApiController@getChallenges');
Route::middleware('auth:api')->get('scoreboard', 'ApiController@getScoreBoard');
Route::middleware('auth:api')->get('teams', 'ApiController@getTeams');
Route::middleware('auth:api')->get('teamscoreboard', 'ApiController@getTeamScores');
Route::middleware('auth:api')->get('numbersolved', 'getNumberSolvedPerPlayer');
