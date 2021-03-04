<?php
use App\Empleado;



//Rutas de autentificacion
Auth::routes();
Route::get('/', function () {
        return redirect('/login');
});

Route::group(['middleware' => 'auth'], function () {
//Rutas de login
Route::get('/home', 'HomeController@index')->name('home');

//Rutas Usuario
Route::get('/alta', 'UserController@formulario');
Route::post('/altaUser', 'UserController@store')->name('empleado.store');
Route::get('/usuarios', 'UserController@index')->name('usuarios');;
Route::get('/EditUser/{id}', 'UserController@edit');
Route::put('/usuario/{user}/update', 'UserController@update')->name('user.update');
Route::POST('/DeleteUsuarios/{id}', 'UserController@destroy');

//Ruta Deparamentos
Route::get('/IndexDepartamento', 'DepartamentosController@index')->name('departamentos.index');
Route::get('/buscarDepartamento','DepartamentosController@search')->name('departamentos.buscar');
Route::get('/createDepartamento','DepartamentosController@create')->name('departamentos.crear');
Route::post('/storeDepartamento','DepartamentosController@store')->name('departamentos.store');
Route::put('/Deparamento/{departamento}/update', 'DepartamentosController@update')->name('departamentos.update');
Route::POST('/DeleteDepartamento/{id}', 'DepartamentosController@destroy')->name('departamentos.delete');

//Rutas Empleado
Route::get('/IndexEmpleado', 'EmpleadoController@index')->name('empleados.index');
Route::get('/Empleado', 'EmpleadoController@show')->name('empleados.busqueda');
Route::get('/createEmpleado', 'EmpleadoController@create')->name('empleados.create');
Route::post('/StoreEmpleado', 'EmpleadoController@store')->name('empleados.store');
Route::put('/empleado/{empleado}/update', 'EmpleadoController@update')->name('empleado.update');
Route::put('/empleado/{empleado}/disable', 'EmpleadoController@disable')->name('empleado.disable');
Route::put('/empleado/{empleado}/enable', 'EmpleadoController@enable')->name('empleado.enable');
Route::get('/buscarEmpleado','EmpleadoController@search')->name('empleados.buscar');
Route::get('/buscarDocumento','EmpleadoController@documento')->name('empleados.buscarDocumento');
Route::get('/buscarDocumentoAdicional','EmpleadoController@documentoAdicional')->name('empleados.buscarDocumentoAdicional');

//Rutas del reloj checador
Route::get('/IndexReloj', 'RelojController@index')->name('checador.index');
Route::post('import-list-excel', 'RelojController@import')->name('checador.import');
Route::post('import-list-xml', 'RelojController@importxml')->name('checador.importxml');

//Rutas de los Reportes
Route::get('/IndexReportes', 'ReportesController@index')->name('reportes.index');
Route::get('/UsuariosReportes', 'ReportesController@usuarios')->name('reportes.usuarios');
Route::get('/EmpleadosReportesA', 'ReportesController@empleadosA')->name('reportes.empleadosA');
Route::get('/EmpleadosReportesI', 'ReportesController@empleadosI')->name('reportes.empleadosI');
Route::get('/AsistenciasE', 'ReportesController@asistenciasE')->name('reportes.asistenciasE');
Route::get('/AsistenciasP', 'ReportesController@asistenciasP')->name('reportes.asistenciasP');
Route::get('/AsistenciasEP', 'ReportesController@asistenciasEP')->name('reportes.asistenciasEP');
Route::get('/Antiguedad', 'ReportesController@antiguedad')->name('reportes.antiguedad');
Route::get('/AntiguedadE', 'ReportesController@antiguedadE')->name('reportes.antiguedadE');
Route::get('/EmpleadosReportesQ', 'ReportesController@empleadosQuinquenio')->name('reportes.EmpleadosReportesQ');
Route::get('/EmpleadosReportesD', 'ReportesController@empleadosDepartamento')->name('reportes.EmpleadosReportesD');

});