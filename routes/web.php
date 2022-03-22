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

Route::get('/', 'App\Http\Controllers\TodoController@index')->middleware('auth');
Route::post('/add', 'App\Http\Controllers\TodoController@add');
Route::post('/update/{id}', 'App\Http\Controllers\TodoController@update');
Route::post('/delete/{id}', 'App\Http\Controllers\TodoController@delete');

Auth::routes();

Route::get('/home', function () {
    return redirect('/');
});
