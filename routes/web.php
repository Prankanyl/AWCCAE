<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'App\Http\Controllers\MainController@welcome');

Route::get('/catalog', 'App\Http\Controllers\MainController@catalog');

Route::get('/declaration', 'App\Http\Controllers\MainController@declaration');

Route::get('/contacts', 'App\Http\Controllers\MainController@contacts');

Route::get('/authorization', 'App\Http\Controllers\MainController@authorization');

Route::get('/cabinet', 'App\Http\Controllers\MainController@cabinet');

Route::get('/review', 'App\Http\Controllers\MainController@review');
