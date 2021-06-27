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

// MainController

Route::any('/', 'App\Http\Controllers\MainController@welcome')->name('welcome');

Route::get('/item/{id}', 'App\Http\Controllers\MainController@item')->name('item');

// CatalogController

Route::get('/catalog/{category?}', 'App\Http\Controllers\CatalogController@catalog')->name('catalog');

Route::post('/buy', 'App\Http\Controllers\CatalogController@buy')->name('buy');

// DeclarationController

Route::get('/declaration', 'App\Http\Controllers\DeclarationController@declaration')->name('declaration');

Route::get('/update', 'App\Http\Controllers\DeclarationController@update')->name('update');

Route::post('/declaration_update', 'App\Http\Controllers\DeclarationController@declaration_update')->name('declaration_update');

// ReviewController

Route::get('/contacts', 'App\Http\Controllers\ReviewController@contacts')->name('contacts');

Route::post('/review', 'App\Http\Controllers\ReviewController@review')->name('review');

// ProfileController

Route::get('/authorization', 'App\Http\Controllers\ProfileController@authorization')->name('authorization');

Route::post('/user_verification', 'App\Http\Controllers\ProfileController@user_verification')->name('user_verification');

Route::any('/cabinet', 'App\Http\Controllers\ProfileController@cabinet')->name('cabinet');

Route::any('/admin_panel', 'App\Http\Controllers\ProfileController@admin_panel')->name('admin_panel');

Route::post('/exit', 'App\Http\Controllers\ProfileController@exit')->name('exit');

Route::get('/registration_user', 'App\Http\Controllers\ProfileController@registration_user')->name('registration_user');

Route::get('/registration_company', 'App\Http\Controllers\ProfileController@registration_company')->name('registration_company');

Route::post('/registration', 'App\Http\Controllers\ProfileController@registration')->name('registration');

Route::post('/pay', 'App\Http\Controllers\ProfileController@pay')->name('pay');


// Route::get('/item/{id}', 'App\Http\Controllers\MainController@item')->name('item');
