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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
 Route::apiResource('/books', 'BookController');

Route::get('/books', 'BookController@index');
Route::get('/books/{book}', 'BookController@show');


Route::group(['middleware' => 'auth:api'], function(){
    Route::group(['middleware' => 'admin'], function(){
    	Route::post('/books', 'BookController@store');
    });
});


//  Route::group([
//     'prefix' => 'auth'
// 	], function () {
//     Route::post('login', 'AuthController@login');
//     Route::post('signup', 'AuthController@signup');
  
//     Route::group([
//       'middleware' => 'auth:api'
//     ], function() {
//         Route::get('logout', 'AuthController@logout');
//         Route::get('user', 'AuthController@user');
//     });
// });