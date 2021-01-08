@extends('layouts.app2')
@section('content')
<div>
    <h1 class="text-center" style="color:#FDFCFC">
        Empleados
    </h1>
</div>
<div class="row justify-content-center">
    <div class="form-group col-md-9">
        @include('user.forms.edit')
        <form action="{{ url('/createEmpleado')}}" method="get">
            <button class="btn btn-primary btn-sm float-left" type="submit">
                + Agregar
            </button>
        </form>
        <br>
            <br>
                <div class="table-responsive">
                    <table class="table table-dark ">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">
                                    #
                                </th>
                                <th scope="col">
                                    Avatar
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
                                    Ver
                                </th>
                                <th scope="col">
                                    Editar
                                </th>
                                <th scope="col">
                                    Eliminar
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($empleados as $Empleado)
                            <tr>
                                <th>
                                    {{$loop->iteration}}
                                </th>
                                <td>
                                    <img alt="Avatar" class="img-fluid" height="60" src='{{$Empleado->avatar}}' width="60">
                                    </img>
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
                                    <a class="btn btn-success pull-right" href="{{route('empleados.busqueda',$Empleado->id)}}" type="submit">
                                        <i class="fas fa-user-check"></i>
                                    </a>
                                  
                                </td>
                                <td>
                                    <a class="btn btn-warning pull-right" href="#" type="submit">
                                        <i class="fas fa-user-edit"></i>
                                    </a>
                                </td>
                                <td>
                                    <a class="btn btn-outline-danger pull-right" href="#" type="submit">
                                        <i class="fas fa-user-times"></i>
                                    </a>
                                </td>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </br>
        </br>
    </div>
</div>
@endsection