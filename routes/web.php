<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'TaskController@index')->name('home');
Route::get('/task/del/{id}', 'TaskController@destroy');
Route::resource('task', 'TaskController')->except([
    'index', 'destroy'
])->middleware('auth');

Auth::routes();

// Route::get('/', 'HomeController@index')->name('home');
