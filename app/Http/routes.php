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
Route::get('/', function ()
{
	return redirect("/home");
});

Route::get('/login', 'HomeController@getLogin');
Route::get('/register', 'HomeController@getRegister');

Route::post('/login', 'HomeController@login');
Route::get('/logout', 'HomeController@logout');
Route::post('/register', 'HomeController@register');
Route::get('/home', 'HomeController@index');

Route::get("/exam/index","ExamController@index");
Route::get("/exam/index/{id}","ExamController@getonly");
Route::get("/exam/create","ExamController@getCreate");
Route::post("/exam/create","ExamController@create");

Route::get("/student/index","StudentController@index");
Route::get("/student/create","StudentController@getCreate");
Route::post("/student/create","StudentController@create");

// Route::get("/subject/index","SubjectController@index");

Route::get("/mcqexam/getref/{ref}","ExamController@getExam");
Route::post("/mcqexam/getref","ExamController@evaluateExam");
Route::get("/results/{e_id}/{a_by}","ExamController@results");

Route::get("/results/index","ExamController@resultsGetView");
Route::post("/results/index","ExamController@resultsPostView");

Route::get("/check_eligibility/{e_id}/{a_by}","ExamController@eligible");
