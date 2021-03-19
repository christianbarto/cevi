@extends('layouts.app2')
@section('content')
<div class="row justify-content-center">
    <div class="form-group col-md-9">
        <div class="card">
            <div class="card-header" style="color:black">
                <h1>
                   Exportar Reportes
                </h1>
                @if(session('verifi'))
                    <div class="alert alert-danger" role="alert">
                            {{session('verifi')}}
                    </div>
                @endif
            </div> 
                <div class="card-body" style="background-color: #DCDCDC">
                    <div class="row justify-content-center">
                        <div class="form-group col-md-3 border border-4 margen" style="background-color: #A9A9A9">
                                <h4 style="color:black">
                                    Roles y Usuarios
                                </h4>
                                <div class="form-group text-center">
                                   <!-- Submit Button -->
                                   <a class="btn btn-primary" style="color:black" href="{{route('reportes.usuarios')}}" target="_blank">Generar</a>
                                </div>
                        </div>
                        <div class="form-group col-md-3 border border-4 margen" style="background-color: #A9A9A9">
                            <h4 style="color:black">
                                Empleados Activos
                            </h4>
                            <div class="form-group text-center">
                            <!-- Submit Button -->
                                <a class="btn btn-primary" style="color:black" href="{{route('reportes.empleadosA')}}" target="_blank">Generar</a>
                            </div>
                        </div>
                        <div class="form-group col-md-3 border border-4 margen" style="background-color: #A9A9A9">
                            <h4 style="color:black">
                                Empleados Inactivos
                            </h4>
                            <div class="form-group text-center">
                            <!-- Submit Button -->
                                <a class="btn btn-primary" style="color:black" href="{{route('reportes.empleadosI')}}" target="_blank">Generar</a>
                            </div>
                        </div>

                        <div class="form-group col-md-3 border border-4 margen" style="background-color: #A9A9A9">
                           <form action="{{route('reportes.EmpleadosReportesD')}}" method="GET">
                            <h4 style="color:black">
                                Empleados por Departamento
                            </h4>                            
                                <label class="control-label text-muted" for="departamento">
                                    Departamento
                                </label>
                                <select class="form-control" id="departamento" name="departamento" required>
                                @foreach($departamentos as $departamento)
                                    <option value="{{$departamento->descripcion}}">
                                        {{$departamento->id}} {{$departamento->descripcion}}
                                    </option>
                                @endforeach
                                </select>
                                <br>
                            <!-- Submit Button -->
                            <button class="btn btn-primary " type="submit">
                               Generar
                            </button>
                           </form>
                        </div>
                        <div class="form-group col-md-3 border border-4 margen" style="background-color: #A9A9A9">
                           <form action="{{route('reportes.TDepartamentos')}}" method="GET">
                            <h4 style="color:black">
                                Departamentos con sus Empleados
                            </h4>                            
                                <br>
                            <!-- Submit Button -->
                            <button class="btn btn-primary " type="submit">
                               Generar
                            </button>
                           </form>
                        </div>
                        <div class="form-group col-md-3 border border-4 margen" style="background-color: #A9A9A9">
                            <h4 style="color:black">
                                Reporte de Quinquenios
                            </h4>
                            <br>
                            <br>
                            <div class="form-group text-center">
                            <!-- Submit Button -->
                                <a class="btn btn-primary" style="color:black" href="{{route('reportes.EmpleadosReportesQ')}}" target="_blank">Generar</a>
                            </div>
                        </div>

                        <div class="form-group col-md-3 border border-4 margen" style="background-color: #A9A9A9">
                           <form action="{{route('reportes.asistenciasP')}}" method="GET">

                            <h4 style="color:black">
                                Asistencias por Periodo
                            </h4>
                            <label style="color:black">Inicio</label>
                            <input class="form-control" id="inicio" name="inicio" type="date" value="{{old('inicio')}}"> 
                            </input>
                            <label style="color:black">Fin</label>
                            <input class="form-control" id="fin" name="fin" type="date" value="{{old('fin')}}">
                            </input>
                            <!-- Submit Button -->
                            <button class="btn btn-primary " type="submit">
                               Generar
                            </button>
                           </form>
                        </div>
                        <div class="form-group col-md-3 border border-4 margen" style="background-color: #A9A9A9">
                           <form action="{{route('reportes.asistenciasE')}}" method="GET">
                            <h4 style="color:black">
                                Asistencias por Empleado
                            </h4>                            
                            <br>
                            <input class="form-control" id="nombre" name="nombre" type="text" placeholder="Nombre"> 
                            </input>
                            <input class="form-control" id="ap_paterno" name="ap_paterno" type="text" placeholder="Apellido Paterno"> 
                            </input>
                            <input class="form-control" id="ap_materno" name="ap_materno" type="text" placeholder="Apellido Materno"> 
                            </input>
                            <br>
                            <br>
                            <!-- Submit Button -->
                            <button class="btn btn-primary " type="submit">
                               Generar
                            </button>
                           </form>
                        </div>
                        <div class="form-group col-md-3 border border-4 margen" style="background-color: #A9A9A9">
                           <form action="{{route('reportes.asistenciasEP')}}" method="GET">
                            <h4 style="color:black">
                                Asistencias por Empleado y Periodo
                            </h4>                            
                            <br>
                            <input class="form-control" id="nombre" name="nombre" type="text" placeholder="Nombre de empleado"> 
                            </input>
                            <input class="form-control" id="ap_paterno" name="ap_paterno" type="text" placeholder="Apellido Paterno"> 
                            </input>
                            <input class="form-control" id="ap_materno" name="ap_materno" type="text" placeholder="Apellido Materno"> 
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
                        <div class="form-group col-md-3 border border-4 margen" style="background-color: #A9A9A9">
                            <h4 style="color:black">
                                Antiguedad de Empleados
                            </h4>                            
                            <br>
                            <br>
                            <!-- Submit Button -->
                            <a class="btn btn-primary" style="color:black" href="{{route('reportes.antiguedad')}}" target="_blank">Generar</a>
                        </div>
                        <div class="form-group col-md-3 border border-4 margen" style="background-color: #A9A9A9">
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
