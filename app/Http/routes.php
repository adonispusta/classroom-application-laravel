<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/**
 * If the user is not logged in, display a login form,
 * otherwise, show the home page
 * 
 */
Route::get('/', function () {
    if (Auth::guest()) {
      return view('auth.login');
    } else {
      return redirect('/home');
    }
});

Route::auth();

Route::get('/home', 'HomeController@index');

// User Routes
Route::get('/profile', 'UserController@show');
Route::post('/profile/update', 'UserController@update');
Route::get('/profile/{user_id}', 'UserController@show');

Route::get('/course/{course_id}/students', 'UserController@showAll');

// Course Routes
Route::get('/course/create', 'CourseController@create');
Route::get('/course/{id}', 'CourseController@show');

Route::post('/course', 'CourseController@store');
Route::put('/course/{id}', 'CourseController@update');
Route::delete('/course/{id}', 'CourseController@destroy');

Route::post('/course/{course_id}/student', 'CourseController@addStudents');

// Assignment Routes
Route::post('/course/{id}/assignment', 'AssignmentController@store');
Route::get('/course/{course_id}/assignment/{assignment_id}', 'AssignmentController@show');
Route::delete('/course/{course_id}/assignment/{assignment_id}', 'AssignmentController@destroy');
Route::put('/course/{course_id}/assignment/{assignment_id}', 'AssignmentController@update');

// Annoucement Routes
Route::post('/course/{course_id}/annoucement', 'AnnoucementController@store');
Route::get('/course/{course_id}/annoucement/{annoucement_id}', 'AnnoucementController@show');
Route::delete('/course/{course_id}/annoucement/{annoucement_id}', 'AnnoucementController@destroy');
Route::put('/course/{course_id}/annoucement/{annoucement_id}', 'AnnoucementController@update');

// Message Routes
Route::post('/user/{user_id}/message', 'MessageController@store');
Route::get('/message/{message_id}', 'MessageController@show');
Route::delete('/message/{message_id}', 'MessageController@destroy');
Route::get('/message/', 'MessageController@showAll');

