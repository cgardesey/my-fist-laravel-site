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

//app()->bind('example', function() {
//    return new \App\Example();
//});

//app()->singleton('example', function() {
//    return new \App\Example();
//});

//app()->singleton('twitter', function() {
//    //return new \App\Services\Twitter(config('services.twitter.api_key'));
//    return new \App\Services\Twitter('asefasdasdf');
//});

//Route::get('/', function () {
//    //dd(app('example'), app('example'));
//    dd(app('App\Example'));
//
//    return  view('welcome');
//});

use App\Services\Twitter;

Route::get('/', function (Twitter $twitter) {
    dd($twitter);

    return  view('welcome');
});

//use App\Repositories\UserRepository;
//
//Route::get('/', function (UserRepository $user) {
//    dd($user);
//
//    return  view('welcome');
//});

//Route::get('/', 'PagesController@home');
Route::get('/about', 'PagesController@about');
Route::get('/contact', 'PagesController@contact');

/*
    GET /projects (index)
    GET /projects/create (create)
    GET /projects/1 (show)
    POST /projects (store)
    GET /projects/1/edit (edit)
    PATCH /projects/1 (update)
    DELETE /projects/1 (destroy)
*/

Route::resource('projects', 'ProjectsController')->middleware('can:update,project'); // 'project' must correspond to route parameter
//Route::resource('projects', 'ProjectsController');
//Route::get('/projects', 'ProjectsController@index');
//Route::get('/projects', 'ProjectsController@create');
//Route::get('/projects/{project}', 'ProjectsController@show');
//Route::post('/projects', 'ProjectsController@store');
//Route::get('/projects/{project}/edit', 'ProjectsController@edit');
//Route::get('/projects/{project}', 'ProjectsController@update');
//Route::get('/projects/{project}', 'ProjectsController@destroy');

Route::post('/projects/{project}/tasks', 'ProjectTasksController@store');
Route::patch('/tasks/{task}', 'ProjectTasksController@update');
//Route::patch('/tasks/{task}', 'ProjectTasksController@update')->middleware(auth);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
