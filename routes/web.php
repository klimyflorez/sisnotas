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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::namespace('Admin')->prefix('admin')->group(function (\Illuminate\Routing\Router $router) {
    $router->get('users/{user}/destroy-modal', 'UserController@modalDestroy')->name('users.destroy-modal');
    $router->resource('users', 'UserController');

    $router->get('students/{student}/destroy-modal', 'StudentController@modalDestroy')->name('students.destroy-modal');
    $router->resource('students', 'UserController');

    $router->get('courses/{course}/destroy-modal', 'CourseController@modalDestroy')->name('courses.destroy-modal');
    $router->resource('courses', 'CourseController');

    $router->get('subjects/{subject}/destroy-modal', 'SubjectController@modalDestroy')->name('subjects.destroy-modal');
    $router->resource('subjects', 'SubjectController');
});
