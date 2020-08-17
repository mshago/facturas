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
    return view('welcome');
});

Route::get('/facturas', function () {
    return view('facturas');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
	//Rutas para el perfil de usuario
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);

	//Rutas para la administración de usuarios
	Route::get('users', ['as' => 'users.users', 'uses' => 'UserController@index']);
	Route::get('users/add', ['as' => 'users.add_user','uses' => 'UserController@add']);
	Route::post('users', 'UserController@store');
	Route::delete('users/{id}','UserController@destroy');

	//Rutas para la administración de empresas
	Route::get('companies', ['as' => 'companies.companies', 'uses' => 'CompaniesController@index']);
	Route::get('companies/add', ['as' => 'companies.add_company','uses' => 'CompaniesController@add']);
	Route::post('companies', 'CompaniesController@store');
	Route::delete('companies/{id}','CompaniesController@destroy');


	//Rutas para la administración de facturas
	Route::get('bills', ['as' => 'bills.bills', 'uses' => 'BillsController@index']);
	Route::get('bills/add', ['as' => 'bills.add_bill','uses' => 'BillsController@add']);
	Route::post('bills', 'BillsController@store');
	Route::delete('bills/{id}','BillsController@destroy');

	//Rutas para la generación de reportes
	Route::get('report/users', ['as' => 'reportes.usuarios', 'uses' => 'ReportController@reporteUsuarios']);
	Route::get('report/companies', ['as' => 'reportes.empresas', 'uses' => 'ReportController@reporteEmpresas']);
	Route::get('report/bills', ['as' => 'reportes.facturas', 'uses' => 'ReportController@reporteFacturas']);
});

Route::group(['middleware' => 'auth'], function () {
	Route::get('{page}', ['as' => 'page.index', 'uses' => 'PageController@index']);
});

