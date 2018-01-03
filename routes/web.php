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


Route::get('/', function()
{
	return Redirect::to('users/index');
});

Route::group(['middleware' => ['web']], function() {
	Route::get('users', 'UserController@getIndex');
	Route::get('users/index', 'UserController@getIndex');
	Route::get('users/new', 'UserController@getNew');
	Route::post('users/new', 'UserController@postNew');
	Route::get('users/edit/{id?}', 'UserController@getEdit');
	Route::post('users/edit/{id?}', 'UserController@postEdit');
	Route::get('users/show/{id?}', 'UserController@getShow');
	Route::get('users/delete/{id?}', 'UserController@getDelete');
	Route::get('users/addgrade/{id?}', 'UserController@getAddgrade');
	Route::post('users/addgrade', 'UserController@postAddgrade');

	Route::get('grades', 'GradeController@getIndex');
	Route::get('grades/index', 'GradeController@getIndex');
	Route::get('grades/new', 'GradeController@getNew');
	Route::post('grades/new', 'GradeController@postNew');
	Route::get('grades/edit/{id?}', 'GradeController@getEdit');
	Route::post('grades/edit/{id?}', 'GradeController@postEdit');
	Route::get('grades/show/{id?}', 'GradeController@getShow');
	Route::get('grades/delete/{id?}', 'GradeController@getDelete');


	Route::get('courses', 'CourseController@getIndex');
	Route::get('courses/index', 'CourseController@getIndex');
	Route::get('courses/new', 'CourseController@getNew');
	Route::post('courses/new', 'CourseController@postNew');
	Route::get('courses/edit/{id?}', 'CourseController@getEdit');
	Route::post('courses/edit/{id?}', 'CourseController@postEdit');
	Route::get('courses/show/{id?}', 'CourseController@getShow');
	Route::get('courses/delete/{id?}', 'CourseController@getDelete');


	Route::get('semesters', 'SemesterController@getIndex');
	Route::get('semesters/index', 'SemesterController@getIndex');
	Route::get('semesters/new', 'SemesterController@getNew');
	Route::post('semesters/new', 'SemesterController@postNew');
	Route::get('semesters/edit/{id?}', 'SemesterController@getEdit');
	Route::post('semesters/edit/{id?}', 'SemesterController@postEdit');
	Route::get('semesters/show/{id?}', 'SemesterController@getShow');
	Route::get('semesters/delete/{id?}', 'SemesterController@getDelete');
	
});