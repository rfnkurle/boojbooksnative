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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//links routes to API controller methods

Route::get('books', 'ApiController@getAllBooks');
Route::get('books/{id}', 'ApiController@getBook');
Route::post('books', 'ApiController@createBook');
Route::put('books/{id}', 'ApiController@updateBook');
Route::delete('books/{id}','ApiController@deleteBook');
