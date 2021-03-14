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


Route::middleware(['auth'])->namespace('Admin')->prefix('admin')->group(function (\Illuminate\Routing\Router $router) {
    $router->get('users/{user}/destroy-modal', 'UserController@modalDestroy')->name('users.destroy-modal');
    $router->resource('users', 'UserController');

    $router->get('students/{student}/destroy-modal', 'StudentController@modalDestroy')->name('students.destroy-modal');
    $router->resource('students', 'StudentController');

    $router->get('subjects/{subject}/destroy-modal', 'SubjectController@modalDestroy')->name('subjects.destroy-modal');
    $router->resource('subjects', 'SubjectController');

    $router->get('courses/{course}/destroy-modal', 'CourseController@modalDestroy')->name('courses.destroy-modal');
    $router->resource('courses', 'CourseController');

    $router->get('inscriptions/{student}/open-modal', 'InscriptionController@openModalInscription')->name('inscriptions.open-modal');
    $router->get('inscriptions/{inscription}/destroy-modal', 'InscriptionController@modalDestroy')->name('inscriptions.destroy-modal');
    $router->resource('inscriptions', 'InscriptionController');

    $router->get('notes/{note}/destroy-modal', 'NoteController@modalDestroy')->name('notes.destroy-modal');
    $router->resource('notes', 'NoteController');
});
