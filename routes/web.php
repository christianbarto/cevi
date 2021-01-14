<?php
use App\Empleado;



//Rutas de autentificacion
Auth::routes();
Route::get('/', function () {
        return redirect('/login');
});

//Rutas de login
Route::get('/homeAdmin', 'HomeController@index2')->name('home');
Route::get('/homeUser', 'HomeController@index');
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
Route::get('/Empleado/{id}', 'EmpleadoController@show')->name('empleados.busqueda');
Route::get('/createEmpleado', 'EmpleadoController@create')->name('empleados.create');
Route::post('/StoreEmpleado', 'EmpleadoController@store')->name('empleados.store');
Route::put('/empleado/{empleado}/update', 'EmpleadoController@update')->name('empleado.update');
