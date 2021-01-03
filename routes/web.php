<?php


Route::get('/', function () {
        return view('welcomec');
});

//Rutas de autentificacion
Auth::routes();

//Rutas de login
Route::get('/homeAdmin', 'HomeController@index2');
Route::get('/admin', 'AdminController@index');
//Rutas Usuario
Route::get('/alta', 'UserController@formulario');
Route::post('/altaUser', 'UserController@store')->name('empleado.store');
Route::get('/usuarios', 'UserController@index')->name('usuarios');;
Route::get('/EditUser/{id}', 'UserController@edit');
Route::put('/usuario/{user}/update', 'UserController@update')->name('user.update');
Route::POST('/DeleteUsuarios/{id}', 'UserController@destroy');


//Rutas Empleado
Route::get('/IndexEmpleado', 'EmpleadoController@index')->name('empleados.index');
