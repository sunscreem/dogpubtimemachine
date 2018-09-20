<?php

use Illuminate\Http\Request;

Route::get('data', 'DataController@index')->name('api.data');
