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

Route::get('/','usercontroller@index');
Route::post('users','usercontroller@store')->name('users.strore');
Route::delete('users/{user}','usercontroller@destroy')->name('users.destroy');
    