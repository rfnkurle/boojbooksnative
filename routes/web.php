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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// Route::get('/', 'Controller@index')->name('home');
                                                //any variable with regex so any character can match
Route::get('/{any}', 'ApiController@index')->where('any','.*');

// Route::resource('/tasks', 'TasksController');
Auth::routes();

Route::resource('/', 'ApiController');
