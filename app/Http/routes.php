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
    return view('principal');
});
Route::get('/conocenos', function () {
    return view('conocenos');
});
Route::get('/recomendacion', function () {
    return view('recomendacion');
});

Route::resource('api','apiController');




Route::resource('dashboard','DashboardController');
Route::get("/login",'DashboardController@login');
Route::get("dashboard/create","DashboardController@create");
Route::post('dashboard/store','DashboardController@store');
Route::delete('/dashboard/destroy/{id}','DashboardController@destroy');


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::auth();

//Route::get('/home', 'HomeController@index');
