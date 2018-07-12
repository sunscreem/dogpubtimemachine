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

Route::get('/', 'PagesController@index')->name('home');

Route::get('/bar-has-beer/{beer}', 'BarController@hasBeer')->name('bars.hasBeer');

Route::resource('beers', 'BeersController');

Route::get('/system-status', 'SystemStatusController@index')->name('system.status');
// route::get('/test', 'PagesController@index');
Route::get('/{id}', 'PagesController@beerSelected')->name('beerSelected');
