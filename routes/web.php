<?php

/*
|----------------------------------------------P----------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

$user = Auth::User();
Route::get('/', function () {
    
        return view('welcomec');
    

});

//Rutas de autentificacion
Auth::routes();

//Rutas de login
Route::get('/home', 'HomeController@index')->name('home');

//Rutas Usuario
Route::get('/alta', 'UserController@formulario');
Route::post('/altaUser', 'UserController@store')->name('empleado.store');
Route::get('/usuarios', 'UserController@index');
Route::get('/EditUser/{id}', 'UserController@edit');
Route::put('/usuario/{user}/update', 'UserController@update')->name('user.update');
Route::POST('/DeleteUsuarios/{id}', 'UserController@destroy');


//Rutas Empleado
Route::get('/IndexEmpleado', 'EmpleadoController@index');
