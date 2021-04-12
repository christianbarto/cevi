@extends('layouts.app2')
@section('content')
@toastr_css
<div class="row justify-content-center">
    <div class="form-group col-md-9">
        <div class="card">
            <div class="card-header" style="color:black">
                <h1>
                   Registro de Incidencias
                </h1>
            </div>
            <div class="card-body" style="background-color: #DCDCDC">
                <div class="table-responsive" style="width:100%;overflow:auto; max-height:430px;">
                    <table class="table table-dark ">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">
                                    Fecha
                                </th>
                                <th scope="col">
                                    RFC
                                </th>
                                <th scope="col">
                                    Nombre
                                </th>
                                <th scope="col">
                                    Apellido Paterno
                                </th>
                                <th scope="col">
                                    Apellido Materno
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
                                    {{Date::parse($Reloj->fecha)->format('j \d\e F \d\e Y')}}
                                    
                                </td>
                                <td>
                                    {{$Reloj->RFC}}
                                </td>
                                <td>
                                    {{$Reloj->nombre}}
                                </td>
                                <td>
                                    {{$Reloj->ap_paterno}}
                                </td>
                                <td>
                                    {{$Reloj->ap_materno}}
                                </td>
                                <td>
                                    {{$Reloj->incidencia}}
                                </td>
                            
                            @endif
                            @endforeach
                            </tr>
                        </tbody>
                    </table>
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
                    Quinquenios
                </h3>
            </div>
            <div class="card-body" style="background-color: #DCDCDC">
                <div class="table-responsive" style="width:100%;overflow:auto; max-height:430px;">
                    <table class="table table-dark table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">
                                    RFC
                                </th>
                                <th scope="col">
                                    Nombre(s)
                                </th>
                                <th scope="col">
                                    Apellido Paterno
                                </th>
                                <th scope="col">
                                    Apellido Materno
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
                                                <td>
                                                    {{$Empleado->RFC}}
                                                </td>
                                                <td>
                                                    {{$Empleado->nombre}}
                                                </td>
                                                <td>
                                                    {{$Empleado->ap_paterno}}
                                                </td>
                                                <td>
                                                    {{$Empleado->ap_materno}}
                                                </td>
                                                <td>
                                                    {{$Empleado->quinquenio}}
                                                </td>
                                                <td>           
                                                    @if($Empleado->quinquenio<1)
                                                        {{Date::parse($Empleado->fecha_nombramiento->addYear(5))->format('j \d\e F \d\e Y')}}
                                                    @elseif($Empleado->quinquenio==1)
                                                        {{Date::parse($Empleado->fecha_nombramiento->addYear(10))->format('j \d\e F \d\e Y')}}
                                                    @elseif($Empleado->quinquenio==2)
                                                        {{Date::parse($Empleado->fecha_nombramiento->addYear(15))->format('j \d\e F \d\e Y')}}
                                                    @elseif($Empleado->quinquenio==3)
                                                        {{Date::parse($Empleado->fecha_nombramiento->addYear(20))->format('j \d\e F \d\e Y')}}
                                                    @elseif($Empleado->quinquenio==4)
                                                        {{Date::parse($Empleado->fecha_nombramiento->addYear(25))->format('j \d\e F \d\e Y')}}
                                                    @elseif($Empleado->quinquenio==5)
                                                        {{Date::parse($Empleado->fecha_nombramiento->addYear(30))->format('j \d\e F \d\e Y')}}
                                                    @elseif($Empleado->quinquenio==6)
                                                        {{Date::parse($Empleado->fecha_nombramiento->addYear(35))->format('j \d\e F \d\e Y')}}
                                                    @elseif($Empleado->quinquenio==7)
                                                        {{Date::parse($Empleado->fecha_nombramiento->addYear(40))->format('j \d\e F \d\e Y')}}
                                                    @elseif($Empleado->quinquenio==8)
                                                        {{Date::parse($Empleado->fecha_nombramiento->addYear(45))->format('j \d\e F \d\e Y')}}
                                                    @elseif($Empleado->quinquenio==9)
                                                        {{Date::parse($Empleado->fecha_nombramiento->addYear(50))->format('j \d\e F \d\e Y')}}
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
</div>
@jquery
@toastr_js
@toastr_render
@endsection
