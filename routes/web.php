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

Route::get('/tasks', function (){
    return view('tasks');
});
Route::get('/tasks', 'TaskController@returnMyTasks');
Route::get('/home', 'TaskController@returnAllTasks');

Route::post('/taskCreate', 'TaskController@create');
Route::any('/deleteTask/{id}', ['as' => 'delete-task', 'uses' => 'TaskController@delete']);

/*Route::any('/search', function(){
    $searchTitle = Input::get('title');
    $title = Title::where('title','LIKE','%'.$searchTitle.'%')->get();
    if(count($title)>0)
        return view('home')->withDetails($title)->withQuery($searchTitle);
    else return view('home')->withMessage('No details found.');
});*/