@extends('layouts.app2')
@section('content')
@include('sweet::alert')
<div class="row justify-content-center overflow-auto">
    <div class="form-group col-md-9">
        <div class="card">
            <div class="card-header" style="color:black">
                <h1>
                   Empleados
                </h1>
            </div>
            <div class="card-body" style="background-color: #DCDCDC">
                    <div class="row float-left col-md-10">
                        <div class="form-group">
                            <div class="card">
                        <form class="form-inline" action="{{ url('/buscarEmpleado')}}" method="get">
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
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-search"></i>
                            </button>
                            <button method="get" action="{{ url('/IndexEmpleado')}}" class="btn btn-success">
                                <i class="fas fa-sync-alt"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <form action="{{ url('/createEmpleado')}}" method="get">
                <button class="btn btn-primary btn-sm float-left" type="submit">
                    + Agregar
                </button>
            </form>
        <br>
        <br>
        <br>
        @if(session('verifi'))
            <div class="alert alert-danger" role="alert">
                    {{session('verifi')}}
            </div>
        @endif
        <h2 class="text-center" style="color:black">
        Activos
        </h2>
                    <div class="table-responsive" style="width:100%;overflow:auto; max-height:430px;">
                        <table class="table table-dark ">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">
                                        N° de trabajador
                                    </th>
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
                                        Ver
                                    </th>
                                    <th scope="col">
                                        Editar
                                    </th>
                                    @if(Auth::user()->role_id==2)
                                    <th scope="col">
                                        Inactivar
                                    </th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($empleados as $Empleado)
                                @if($Empleado->estatus == 'activo')
                                <tr>
                                    <td>
                                        {{$Empleado->id}}
                                    </td>
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

                                    {{-- Boton de Ver Informacion --}}
                                    <td>
                                        <form action="{{ route('empleados.busqueda')}}"   method="get">
                                            <button class="btn btn-success float-left" name="id"  type="submit" value={{$Empleado->id}}>
                                                <i class="fas fa-user-check"></i>
                                            </button>
                                        </form>
                                    </td>

                                    {{-- Boton de Editar Informacion --}}

                                    <td>
                                        <form action="{{ route('empleados.edit')}}"   method="get">
                                            <button class="btn btn-warning" name="id"  type="submit" value={{$Empleado->id}}>
                                                <i class="fas fa-user-edit"></i>
                                            </button>
                                        </form>
                                        
                                    </td>

                                    {{-- Boton de Eliminar --}}
                                    @if(Auth::user()->role_id==2)
                                    <td>
                                        <a class="btn btn-danger pull-right" data-target="#DeleteUsuario{{$Empleado->id}}" data-toggle="modal" href="#" type="submit">
                                           <i class="fas fa-user-times"></i>
                                            </i>
                                        </a>
                                        <div aria-hidden="true" aria-labelledby="exampleModalLabl" class="modal fade" id="DeleteUsuario{{$Empleado->id}}" tabindex="-1">
                                            <div class="modal-dialog modal-sm">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h3 class="text-center" style="color:black">
                                                            Selecciona la fecha y causa de la baja
                                                        </h3>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{route ('empleado.disable',$Empleado->id)}}" method="post">
                                                        {{csrf_field()}} {{method_field('put')}}
                                                            <div class="form-group col-md-12">
                                                                <label style="color:black">
                                                                    Fecha de baja
                                                                </label>
                                                                <input class="form-control" id="fecha_baja" name="fecha_baja" type="date" value="{{date('Y-m-d')}}">
                                                                </input>
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <label style="color:black">
                                                                    Causa de baja
                                                                </label>
                                                                <textarea name="causa_baja" rows="3" cols="30" value="{{old('causa_baja')}}" required></textarea>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-primary" type="submit">
                                                                    Guardar
                                                                </button>
                                                                <button class="btn btn-secondary" data-dismiss="modal" type="button">Cancelar</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    @endif
                                    @endif
                                    @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </br>
            </br>
                                    {{-- Tabla de empleados inactivos --}}
        <h2 class="text-center" style="color: black">
            Inactivos
        </h2>
                    <div class="table-responsive" style="width:100%;overflow:auto; max-height:430px;">
                        <table class="table table-dark ">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">
                                        N° de Trabajador
                                    </th>
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
                                        Fecha Baja
                                    </th>
                                    <th scope="col">
                                        Causa Baja
                                    </th>
                                    <th scope="col">
                                        Ver
                                    </th>
                                    <th scope="col">
                                        Editar
                                    </th>
                                    @if(Auth::user()->role_id==2)
                                    <th scope="col">
                                        Activar
                                    </th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($empleados as $Empleado)
                                @if($Empleado->estatus == 'inactivo')
                                <tr>
                                    <td>
                                        {{$Empleado->id}}
                                    </td>
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
                                        @if($Empleado->fecha_baja==null)
                                            Sin fecha de baja
                                        @else
                                        {{Date::parse($Empleado->fecha_baja)->format('j \d\e F \d\e Y')}}
                                        @endif
                                    </td>
                                    <td>
                                        @if($Empleado->causa_baja==null)
                                            Sin causa de baja
                                        @else
                                        {{$Empleado->causa_baja}}
                                        @endif
                                    </td>
                                    {{-- Boton de Ver Informacion --}}
                                    <td>
                                        <form action="{{ route('empleados.busqueda')}}"   method="get">
                                            <button class="btn btn-success float-left" name="id"  type="submit" value={{$Empleado->id}}>
                                                <i class="fas fa-user-check"></i>
                                            </button>
                                        </form>
                                    </td>

                                    {{-- Boton de Editar Informacion --}}

                                    <td>
                                        <form action="{{ route('empleados.edit')}}"   method="get">
                                            <button class="btn btn-warning" name="id"  type="submit" value={{$Empleado->id}}>
                                                <i class="fas fa-user-edit"></i>
                                            </button>
                                        </form>
                                        
                                    </td>
                                    

                                    {{-- Boton de Eliminar --}}
                                    @if(Auth::user()->role_id==2)
                                    <td>
                                        <form action="{{route ('empleado.enable',$Empleado->id)}}"  method="post">
                                            {{csrf_field()}} {{method_field('put')}}
                                        <button class="btn btn btn-info pull-right" type="submit">
                                            <i class="fas fa-user-shield"></i>
                                        </button>
                                        </form>
                                    </td>
                                    @endif
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
</div>
@endsection

