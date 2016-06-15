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

Route::get('/', function () {
    return view('welcome');
});
Route::auth();
Route::get('about', 'WelcomeController@about');
Route::get('/upload','UploadController@uploader');
Route::post('upload/result','UploadController@upload');
// Route::get('employees/create-employee','EmployeesController@create');
/*Route::get('employees/search','EmployeesController@search');

Route::group(['middleware' => ['auth']], function(){
	Route::resource('employees','EmployeesController');
	Route::resource('departments','DepartmentsController');
});
*/
// Route::group(['prefix'=>'/employees'],function(){
// 	Route::get('/',['as'=>'employees.index','uses' =>'EmployeesController@index']);
// 	Route::get('/search',['as' => 'employees.search','uses'=>'EmployeesController@search']);
// 	Route::get('/{employees}',['as' => 'employees.show','uses'=>'EmployeesController@show']);
// });
Route::group(['middleware' => ['auth']],function(){
	Route::resource('departments','DepartmentsController');
});

Route::get('/departments','DepartmentsController@index');
Route::get('/departments/{departments}', ['as'=>'departments.show', 'uses'=>'DepartmentsController@show']);
Route::get('employees/search','EmployeesController@search');

Route::group(['prefix'=>'employees'],function(){
	Route::get('/',['as'=>'employees.index','uses' =>'EmployeesController@index']);
	Route::get('/search','EmployeesController@search');
	Route::group(['middleware'=>['auth']],function(){
		Route::post('/','EmployeesController@store');
		Route::get('/create',['as'=>'employees.create','uses' =>'EmployeesController@create']);
		Route::get('/{employees}/edit',['as'=>'employees.edit','uses' =>'EmployeesController@edit']);
		Route::post('/{employees}',['as'=>'employees.update','uses' =>'EmployeesController@update']);
		Route::delete('/{employees}',['as'=>'employees.destroy','uses' =>'EmployeesController@destroy']);
	});
	Route::get('/{employees}',['as'=>'employees.show','uses' =>'EmployeesController@show']);
		Route::get('/search',['as'=>'employees.search','uses' =>'EmployeesController@search']);
});

Route::get('/home', 'HomeController@index');


Route::group(['prefix' => 'projects'],function(){
	Route::get('/', 'ProjectsController@index');


	Route::group(['middleware' => ['auth']],function(){
		Route::get('/create', 'ProjectsController@create');
		Route::post('/', 'ProjectsController@store');
		Route::get('/{project_id}', 'ProjectsController@show');
		Route::delete('/{project_id}', 'ProjectsController@destroy');
	});
});

Route::get('/errors', function(){
	return view('errors.503');
});
