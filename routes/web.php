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

Route::get('/', "TaskController@index")->name('home');
Route::post('/tasks/create','TaskController@store')->name('tasks.create');
Route::delete('/tasks/delete/{id}', "TaskController@destroy")->name('tasks.delete');

Auth::routes();

