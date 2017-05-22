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

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get("create", 'tasks@index');
Route::post("store", 'tasks@store');



Route::get('/tasks/{id}', 'posts@post');






Route::post('/tasks/{id}/poststore', 'posts@store');
Route::post('/tasks/{id}/close', 'posts@close');