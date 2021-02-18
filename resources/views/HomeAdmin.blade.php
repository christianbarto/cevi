@extends('layouts.app2')
@section('content')
<div class="row justify-content-center">
    <div class="form-group col-md-9">
        <div class="card">
            <div class="card-header" style="color:black">
                <h1>
                   Registro de Incidencias
                </h1>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-dark ">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">
                                    Fecha
                                </th>
                                <th scope="col">
                                    Nombre
                                </th>
                                <th scope="col">
                                    RFC
                                </th>
                                <th scope="col">
                                    Incidencia
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($Relojs as $Reloj)
                            @if(strcmp(($Reloj->incidencia),'NORMAL')!== 0)
                            <tr>
                                <td>
                                    {{Date::parse($Reloj->fecha)->format('l j \d\e F \d\e Y')}}
                                    
                                </td>
                                <td>
                                    {{$Reloj->nombre}}
                                </td>
                                <td>
                                    {{$Reloj->RFC}}
                                </td>
                                <td>
                                    {{$Reloj->incidencia}}
                                </td>
                            
                            @endif
                            @endforeach
                            </tr>
                        </tbody>
                    </table>
                    {!! $Relojs->render() !!}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row justify-content-center">
    <div class="form-group col-md-9">
        <div class="card">
            <div class="card-header" style="color:black">
                <h3>
                    Notificaciones
                </h3>
            </div>
            <div class="table-responsive">
                <table class="table table-dark table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">
                                #
                            </th>
                            <th scope="col">
                                Nombre
                            </th>
                            <th scope="col">
                                Quinquenios
                            </th>
                            <th scope="col">
                                Proximo Quinquenio
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($Empleados as $Empleado)
                            @if($Empleado->estatus=='activo')
                                @if($Empleado->Tcontrato=='base' 
                                || $Empleado->Tcontrato=='nombremientoConfianza'
                                || $Empleado->Tcontrato=='mandosMedios')
                                    @if(!$Empleado->fecha_nombramiento==null)
                                        <tr>
                                            <th>
                                                {{$loop->iteration}}
                                            </th>
                                            <td>
                                                {{$Empleado->nombre}} {{$Empleado->ap_paterno}} {{$Empleado->ap_materno}}
                                            </td>
                                            <td>
                                                {{$Empleado->quinquenio}}
                                            </td>
                                            <td>           
                                                @if($Empleado->quinquenio<1)
                                                    {{Date::parse($Empleado->fecha_nombramiento->addYear(5))->format('l j \d\e F \d\e Y')}}
                                                @elseif($Empleado->quinquenio==1)
                                                    {{Date::parse($Empleado->fecha_nombramiento->addYear(10))->format('l j \d\e F \d\e Y')}}
                                                @elseif($Empleado->quinquenio==2)
                                                    {{Date::parse($Empleado->fecha_nombramiento->addYear(15))->format('l j \d\e F \d\e Y')}}
                                                @elseif($Empleado->quinquenio==3)
                                                    {{Date::parse($Empleado->fecha_nombramiento->addYear(20))->format('l j \d\e F \d\e Y')}}
                                                @elseif($Empleado->quinquenio==4)
                                                    {{Date::parse($Empleado->fecha_nombramiento->addYear(25))->format('l j \d\e F \d\e Y')}}
                                                @elseif($Empleado->quinquenio==5)
                                                    {{Date::parse($Empleado->fecha_nombramiento->addYear(30))->format('l j \d\e F \d\e Y')}}
                                                @elseif($Empleado->quinquenio==6)
                                                    {{Date::parse($Empleado->fecha_nombramiento->addYear(35))->format('l j \d\e F \d\e Y')}}
                                                @elseif($Empleado->quinquenio==7)
                                                    {{Date::parse($Empleado->fecha_nombramiento->addYear(40))->format('l j \d\e F \d\e Y')}}
                                                @elseif($Empleado->quinquenio==8)
                                                    {{Date::parse($Empleado->fecha_nombramiento->addYear(45))->format('l j \d\e F \d\e Y')}}
                                                @elseif($Empleado->quinquenio==9)
                                                    {{Date::parse($Empleado->fecha_nombramiento->addYear(50))->format('l j \d\e F \d\e Y')}}
                                                @endif
                                            </td>
                                        </tr>
                                    @endif
                                @endif
                            @endif
                        @endforeach 
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
