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
                                <h5 style="color:black">
                                    Roles y Usuarios
                                </h5>
                                <div class="form-group text-center">
                                   <!-- Submit Button -->
                                   <a class="btn btn-primary" style="color:black" href="{{route('reportes.usuarios')}}" target="_blank">Generar</a>
                                </div>
                        </div>
                        <div class="form-group col-md-3 border border-4 margen" style="background-color: #A9A9A9">
                            <h5 style="color:black">
                                Empleados Activos
                            </h5>
                            <div class="form-group text-center">
                            <!-- Submit Button -->
                                <a class="btn btn-primary" style="color:black" href="{{route('reportes.empleadosA')}}" target="_blank">Generar</a>
                            </div>
                        </div>
                        <div class="form-group col-md-3 border border-4 margen" style="background-color: #A9A9A9">
                            <h5 style="color:black">
                                Empleados Inactivos
                            </h5>
                            <div class="form-group text-center">
                            <!-- Submit Button -->
                                <a class="btn btn-primary" style="color:black" href="{{route('reportes.empleadosI')}}" target="_blank">Generar</a>
                            </div>
                        </div>

                        <div class="form-group col-md-3 border border-4 margen" style="background-color: #A9A9A9">
                           <form action="{{route('reportes.EmpleadosReportesD')}}" method="GET">
                            <h5 style="color:black">
                                Empleados por Departamento
                            </h5>                            
                                <select class="form-control" id="departamento" name="departamento" required>
                                @foreach($departamentos as $departamento)
                                    <option value="{{$departamento->descripcion}}">
                                        {{$departamento->descripcion}}
                                    </option>
                                @endforeach
                                </select>
                                <br>
                            <!-- Submit Button -->
                            <button class="btn btn-primary " type="submit" style="margin-top: -15px;color: black">
                               Generar
                            </button>
                           </form>
                        </div>
                        <div class="form-group col-md-3 border border-4 margen" style="background-color: #A9A9A9">
                            <h5 style="color:black">
                                Departamentos con sus Empleados
                            </h5>                            
                                <br>
                            <!-- Submit Button -->
                            <a class="btn btn-primary" style="color:black" href="{{route('reportes.TDepartamentos')}}" target="_blank">Generar</a>
                        </div>
                        <div class="form-group col-md-3 border border-4 margen" style="background-color: #A9A9A9">
                            <h5 style="color:black">
                                Reporte de Quinquenios
                            </h5>
                            <br>
                            <br>
                            <div class="form-group text-center">
                            <!-- Submit Button -->
                                <a class="btn btn-primary" style="color:black" href="{{route('reportes.EmpleadosReportesQ')}}" target="_blank">Generar</a>
                            </div>
                        </div>

                        <div class="form-group col-md-3 border border-4 margen" style="background-color: #A9A9A9">
                           <form action="{{route('reportes.asistenciasP')}}" method="GET">

                            <h5 style="color:black">
                                Asistencias por Periodo
                            </h5>
                            <label style="color:black;">Inicio</label>
                            <input class="form-control" id="inicio" name="inicio" type="date" min="1980-01-01" value={{now()}}  max={{now()}}> 
                            </input>
                            <label style="color:black;margin-top: 15px;">Fin</label>
                            <input class="form-control" id="fin" name="fin" type="date" min="1980-01-01" value={{now()}}  max={{now()}}>
                            </input>
                            <!-- Submit Button -->
                            <button class="btn btn-primary " type="submit" style="color: black;margin-top: 20px;">
                               Generar
                            </button>
                           </form>
                        </div>
                        {{-- <div class="form-group col-md-3 border border-4 margen" style="background-color: #A9A9A9">
                           <form action="{{route('reportes.asistenciasE')}}" method="GET">
                            <h5 style="color:black">
                                Asistencias por Empleado
                            </h5>                            
                            <br>
                            <input class="form-control" id="nombre" name="nombre" type="text" placeholder="Nombre"> 
                            </input>
                            <input class="form-control" id="ap_paterno" name="ap_paterno" type="text" placeholder="Apellido Paterno"> 
                            </input>
                            <input class="form-control" id="ap_materno" name="ap_materno" type="text" placeholder="Apellido Materno"> 
                            </input>
                            <br>
                            <br>
                             Submit Button 
                            <button class="btn btn-primary " type="submit">
                               Generar
                            </button>
                           </form>
                        </div> --}}
                        <div class="form-group col-md-3 border border-4 margen" style="background-color: #A9A9A9">
                           <form action="{{route('reportes.asistenciasEP')}}" method="GET">
                            <h5 style="color:black">
                                Asistencias por Empleado y Periodo
                            </h5>                            
                            <br>
                            <input class="form-control" id="nombre" name="nombre" type="text" placeholder="Nombre de empleado" style="margin-top: -14px;"> 
                            </input>
                            <input class="form-control" id="ap_paterno" name="ap_paterno" type="text" placeholder="Apellido Paterno"> 
                            </input>
                            <input class="form-control" id="ap_materno" name="ap_materno" type="text" placeholder="Apellido Materno"> 
                            </input>    
                            <label style="color:black;margin-top: 4px;">Inicio</label>
                            <input class="form-control" id="inicio" name="inicio" type="date" min="1980-01-01" value={{now()}}  max={{now()}}> 
                            </input>
                            <label style="color:black;margin-top: 4px">Fin</label>
                            <input class="form-control" id="fin" name="fin" type="date" min="1980-01-01" value={{now()}}  max={{now()}}>
                            </input>
                            <!-- Submit Button -->
                            <button class="btn btn-primary " type="submit" style="color: black;margin-top: 5px">
                               Generar
                            </button>
                           </form>
                        </div>
                        <div class="form-group col-md-3 border border-4 margen" style="background-color: #A9A9A9">
                            <h5 style="color:black">
                                Antiguedad de Empleados
                            </h5>     
                            <br>                       
                            <!-- Submit Button -->
                            <a class="btn btn-primary" style="color:black" href="{{route('reportes.antiguedad')}}" target="_blank">Generar</a>
                            <br>
                            <br>
                            <br>
                            <br>
                            
                            <form action="{{route('reportes.antiguedadE')}}" method="GET">
                            <h5 style="color:black">
                                Antiguedad por Empleado
                            </h5>                            
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
                            <!-- Submit Button -->
                            <button class="btn btn-primary " type="submit" style="color: black">
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
