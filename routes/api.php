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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::get('businesses', 'BusinessController@index');
Route::get('category/{id}/businesses', 'BusinessController@getBusinessesByCategory');

Route::prefix('business', function (){
    Route::post('/create', 'BusinessController@createBusiness');
    Route::put('/update', 'BusinessController@updateBusiness');
});

Route::get('/search', "SearchController@search");

