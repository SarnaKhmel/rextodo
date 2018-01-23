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

Route::get('/', function () {
    return view('welcome');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::delete('/task/{task}', 'TaskController@destroy');

Route::get('/tasks', 'TaskController@returnMyTasks');

Route::post('/taskCreate', 'TaskController@store');
Route::post('/task', function (){});



//Route::get('/tasks', 'TaskController@index');
//Route::get('/myTasks', 'TaskController@indexMyTasks');
//Route::post('/task', 'TaskController@store')->name('task');

