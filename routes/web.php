<?php

use Spatie\EventProjector\Facades\Projectionist;
use Symfony\Component\HttpFoundation\Session\Session;

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

Route::get('/', 'PagesController@index')->name('homepage');

Route::get('/bar-has-beer/{beer}', 'BarController@hasBeer')->name('bars.hasBeer');

Route::get('beers', 'BeersController@index')->name('beers.index');

Route::get('/system-status', 'SystemStatusController@index')->name('system.status');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/test', 'TestController@index');

Route::namespace('Admin')
    ->middleware(['auth'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::resource('bar', 'BarController');
    });
