@extends('layouts.app2')
@section('content')
<h1 class="text-center" style="color:#FDFCFC">
    Exportar Reportes
</h1>
<div class="row justify-content-center">
    <div class="form-group col-md-9">
        <div class="card">
            <div class="card-header">
                <h2 style="color:black">
                    Selecciona el Reporte
                </h2>
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="form-group col-md-3 border border-1 margen">
                            <form action="{{route('reportes.usuarios')}}" method="GET">
                                <h4 style="color:black">
                                    Roles y Usuarios
                                </h4>
                                <div class="form-group text-center">
                                   <!-- Submit Button -->
                                   <button class="btn btn-primary " type="submit">
                                     Generar
                                   </button>
                                </div>
                            </form>
                        </div>
                        <div class="form-group col-md-3 border border-4 margen">
                           <form action="{{route('reportes.empleadosA')}}" method="GET">

                            <h4 style="color:black">
                                Empleados Activos
                            </h4>
                            <div class="form-group text-center">
                            <!-- Submit Button -->
                            <button class="btn btn-primary " type="submit">
                               Generar
                            </button>
                            </div>
                           </form>
                        </div>
                        <div class="form-group col-md-3 border border-4 margen">
                           <form action="{{route('reportes.empleadosI')}}" method="GET">

                            <h4 style="color:black">
                                Empleados Inactivos
                            </h4>
                            <div class="form-group text-center">
                            <!-- Submit Button -->
                            <button class="btn btn-primary " type="submit">
                               Generar
                            </button>
                            </div>
                           </form>
                        </div>
                        <div class="form-group col-md-3 border border-4 margen">
                           <form action="{{route('reportes.asistenciasP')}}" method="GET">

                            <h4 style="color:black">
                                Asistencias por Periodo
                            </h4>
                            <label style="color:black">Inicio</label>
                            <input class="form-control" id="inicio" name="inicio" type="date" value="{{date('Y-m-d')}}"> 
                            </input>
                            <label style="color:black">Fin</label>
                            <input class="form-control" id="fin" name="fin" type="date" value="{{date('Y-m-d')}}">
                            </input>
                            <!-- Submit Button -->
                            <button class="btn btn-primary " type="submit">
                               Generar
                            </button>
                           </form>
                        </div>
                        <div class="form-group col-md-3 border border-4 margen">
                           <form action="{{route('reportes.asistenciasE')}}" method="GET">
                            <h4 style="color:black">
                                Asistencias por Empleado
                            </h4>                            
                            <br>
                            <input class="form-control" id="nombre" name="nombre" type="text" placeholder="Nombre de empleado"> 
                            </input>
                            <br>
                            <br>
                            <!-- Submit Button -->
                            <button class="btn btn-primary " type="submit">
                               Generar
                            </button>
                           </form>
                        </div>
                        <div class="form-group col-md-3 border border-4 margen">
                           <form action="{{route('reportes.asistenciasEP')}}" method="GET">
                            <h4 style="color:black">
                                Asistencias por Empleado y Periodo
                            </h4>                            
                            <br>
                            <input class="form-control" id="nombre" name="nombre" type="text" placeholder="Nombre de empleado"> 
                            </input>
                            <label style="color:black">Inicio</label>
                            <input class="form-control" id="inicio" name="inicio" type="date" value="{{date('Y-m-d')}}"> 
                            </input>
                            <label style="color:black">Fin</label>
                            <input class="form-control" id="fin" name="fin" type="date" value="{{date('Y-m-d')}}">
                            </input>
                            <!-- Submit Button -->
                            <button class="btn btn-primary " type="submit">
                               Generar
                            </button>
                           </form>
                        </div>
                        <div class="form-group col-md-3 border border-4 margen">
                           <form action="{{route('reportes.antiguedad')}}" method="GET">
                            <h4 style="color:black">
                                Antiguedad de Empleados
                            </h4>                            
                            <br>
                            <br>
                            <!-- Submit Button -->
                            <button class="btn btn-primary " type="submit">
                               Generar
                            </button>
                           </form>
                        </div>
                        <div class="form-group col-md-3 border border-4 margen">
                           <form action="{{route('reportes.antiguedadE')}}" method="GET">
                            <h4 style="color:black">
                                Antiguedad por Empleado
                            </h4>                            
                            <br>
                            <select class="form-control" id="seleccion" name="seleccion">
                            <option value="id">
                                N° de Trabajador
                            </option>
                            <option value="nombre">
                                Nombre
                            </option>
                            <option value="RFC">
                                RFC
                            </option>
                            <option value="paterno">
                                Apellido Paterno
                            </option>
                            <option value="materno">
                                Apellido Materno
                            </option>
                        </select>
                        <input class="form-control" id="search" name="search" type="text" ></input>
                            <br>
                            <br>
                            <!-- Submit Button -->
                            <button class="btn btn-primary " type="submit">
                               Generar
                            </button>
                           </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
