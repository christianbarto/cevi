<?php
use App\Empleado;



//Rutas de autentificacion
Auth::routes();
Route::get('/', function () {
        return redirect('/login');
});

Route::get('/ResetPassword','UserController@resetPassword')->name('resetPassword');
Route::get('/searchUser','UserController@search')->name('user.search');
Route::get('/submitUser','UserController@submit')->name('user.submit');
Route::post('/recuperaContrasena','UserController@recuperar')->name('recuperaContrasena');

Route::group(['middleware' => 'auth'], function () {
//Rutas de login
Route::get('/home', 'HomeController@index')->name('home');

//Rutas Usuario
Route::get('/alta', 'UserController@formulario');
Route::post('/altaUser', 'UserController@store')->name('empleado.store');
Route::get('/usuarios', 'UserController@index')->name('usuarios');;
Route::get('/EditUser/{id}', 'UserController@edit');
Route::put('/usuario/{user}/update', 'UserController@update')->name('user.update');
Route::get('/Contrasena','UserController@updateContrasena')->name('user.cambioContrasena');
Route::post('/updateContrasena','UserController@cambioContrasena')->name('user.updateContrasena');
Route::POST('/DeleteUsuarios/{id}', 'UserController@destroy');


//Ruta Deparamentos
Route::get('/IndexDepartamento', 'DepartamentosController@index')->name('departamentos.index');
Route::get('/buscarDepartamento','DepartamentosController@search')->name('departamentos.buscar');
Route::get('/createDepartamento','DepartamentosController@create')->name('departamentos.crear');
Route::post('/storeDepartamento','DepartamentosController@store')->name('departamentos.store');
Route::put('/Deparamento/{departamento}/update', 'DepartamentosController@update')->name('departamentos.update');
Route::POST('/DeleteDepartamento/{id}', 'DepartamentosController@destroy')->name('departamentos.delete');

//Ruta Categorias
Route::get('/IndexCategorias', 'CategoriasController@index')->name('categoria.index');
Route::get('/buscarCategoria','CategoriasController@search')->name('categoria.buscar');
Route::post('/storeCategoria','CategoriasController@store')->name('categoria.store');
Route::POST('/DeleteCategoria/{id}', 'CategoriasController@destroy')->name('categoria.delete');
Route::put('/Categoria/{departamento}/update', 'CategoriasController@update')->name('categoria.update');


//Rutas Empleado
Route::get('/IndexEmpleado', 'EmpleadoController@index')->name('empleados.index');
Route::get('/Empleado', 'EmpleadoController@show')->name('empleados.busqueda');
Route::get('/editarEmpleado', 'EmpleadoController@edit')->name('empleados.edit');
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
Route::get('/AsistenciasP/Exportar', 'ReportesController@asistenciasPExportar')->name('reportes.asistenciasPExportar');
Route::get('/AsistenciasEP', 'ReportesController@asistenciasEP')->name('reportes.asistenciasEP');
Route::get('/AsistenciasEP/Exportar', 'ReportesController@asistenciasEPExportar')->name('reportes.asistenciasEPExportar');
Route::get('/Antiguedad', 'ReportesController@antiguedad')->name('reportes.antiguedad');
Route::get('/Antiguedad/Exportar', 'ReportesController@antiguedadEExportar')->name('reportes.antiguedadExportar');
Route::get('/AntiguedadE', 'ReportesController@antiguedadE')->name('reportes.antiguedadE');
Route::get('/EmpleadosReportesQ', 'ReportesController@empleadosQuinquenio')->name('reportes.EmpleadosReportesQ');
Route::get('/EmpleadosReportesD', 'ReportesController@empleadosDepartamento')->name('reportes.EmpleadosReportesD');
Route::get('/EmpleadosReportes/Exportar/{departamento}', 'ReportesController@empleadosDepartamentoExportar')->name('reportes.EmpleadosReportesExportar');
Route::get('/EmpleadosReportesTD', 'ReportesController@empleadosDepartamentoT')->name('reportes.TDepartamentos');


//Rutas calendario
Route::get('Evento/form','ControllerEvent@form');
Route::post('Evento/create','ControllerEvent@create');
Route::get('Evento/details/{id}','ControllerEvent@details')->name('detalles');
Route::get('Evento/index','ControllerEvent@index');
Route::get('Evento/index/{month}','ControllerEvent@index_month');
Route::post('Evento/calendario','ControllerEvent@calendario');
Route::post('Evento/update/{id}','ControllerEvent@update')->name('evento.update');
});