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

// Route to index
Route::get('/', 'App\Http\Controllers\TodoController@index')->middleware('auth');

// Add new task | Post method
Route::post('/add', 'App\Http\Controllers\TodoController@add');

// Update task | Post method
Route::post('/update/{id}', 'App\Http\Controllers\TodoController@update');

// Delete task | Post method
Route::post('/delete/{id}', 'App\Http\Controllers\TodoController@delete');

// Change to not done | Post method
Route::post('/not/{id}', 'App\Http\Controllers\TodoController@not');

// Change to done | Post method
Route::post('/done/{id}', 'App\Http\Controllers\TodoController@done');

// Auth routes
Auth::routes();

// Redirect to index from home
Route::get('/home', function () {
    return redirect('/');
});
