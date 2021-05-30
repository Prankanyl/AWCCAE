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

Route::get('/', 'App\Http\Controllers\MainController@welcome')->name('welcome');

Route::get('/catalog/{category?}', 'App\Http\Controllers\CatalogController@catalog')->name('catalog');

Route::get('/declaration', 'App\Http\Controllers\DeclarationController@declaration')->name('declaration');

Route::get('/contacts', 'App\Http\Controllers\ReviewController@contacts')->name('contacts');

Route::get('/authorization', 'App\Http\Controllers\ProfileController@authorization')->name('authorization');

Route::post('/cabinet', 'App\Http\Controllers\ProfileController@cabinet')->name('cabinet');

Route::post('/admin_panel', 'App\Http\Controllers\ProfileController@admin_panel')->name('admin_panel');

Route::post('/review', 'App\Http\Controllers\ReviewController@review')->name('review');

Route::get('/item/{id}', 'App\Http\Controllers\MainController@item')->name('item');

Route::get('/registration_user', 'App\Http\Controllers\ProfileController@registration_user')->name('registration_user');

Route::get('/registration_company', 'App\Http\Controllers\ProfileController@registration_company')->name('registration_company');

Route::post('/registration', 'App\Http\Controllers\ProfileController@registration')->name('registration');

// Route::get('/item/{id}', 'App\Http\Controllers\MainController@item')->name('item');
