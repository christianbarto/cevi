@extends('layouts.app2')
@section('content')  
<div class="row justify-content-center">
    <div class="form-group col-md-9">
        <div class="card">
            <div class="card-header" style="color:black">
                <h1>
                   Departamentos
                </h1>
            </div>
            @if(session('verifi'))
                <div class="alert alert-danger" role="alert">
                    {{session('verifi')}}
                </div>
            @endif
            <div class="card-body" style="background-color: #DCDCDC">
                <div class="row float-left col-md-10">
                    <div class="form-group">
                        <div class="card">
                            <form class="form-inline" action="{{ url('/buscarDepartamento')}}" method="get">
                                <select class="form-control" id="seleccion" name="seleccion">
                                    <option value="id">
                                        Id
                                    </option>
                                    <option value="descripcion">
                                        Descripción
                                    </option>
                                </select>
                                <input class="form-control" id="search" name="search" type="text" ></input>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-search"></i>
                                </button>
                                <button method="get" action="{{ url('/IndexDepartamento')}}" class="btn btn-success">
                                    <i class="fas fa-sync-alt"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <a class="btn btn-primary float-left" data-target="#createDepartamento" data-toggle="modal" href="#" type="submit">
                    + Agregar
                </a>
                <div aria-hidden="true" aria-labelledby="exampleModalLabl" class="modal fade" id="createDepartamento" tabindex="-1">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="text-center text-muted" style="color:gray">
                                    Crear Nuevo Departamento
                                </h3>
                            </div>
                            <div class="modal-body">
                                <form action="{{route ('departamentos.store')}}" method="post">
                                    {{csrf_field()}} {{method_field('post')}}
                                <div class="form-group col-md-12">
                                    <input class="form-control" id="id" name="id" type="number" placeholder="Id" required>
                                    </input>
                                </div>
                                <div class="form-group col-md-12">
                                    <input class="form-control" id="descripcion" name="descripcion" type="text" placeholder="Descripción" required>
                                    </input>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-primary" type="submit">
                                        Guardar
                                    </button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive" style="width:100%;overflow:auto; max-height:430px;">
                    <table class="table table-dark ">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">
                                    Id
                                </th>
                                <th scope="col">
                                    Descripción
                                </th>
                                <th scope="col">
                                    Estatus
                                </th>
                                <th scope="col">
                                    Editar
                                </th>
                                @if(Auth::user()->role_id==2)
                                <th scope="col">
                                    Eliminar
                                </th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                             @foreach($departamentos as $departamento)
                            @if($departamento->status == 'activo')
                            <tr>
                                <th>
                                   {{$departamento->id}}
                                </th>

                                <td>
                                    {{$departamento->descripcion}}
                                </td>
                                <td>
                                    {{$departamento->status}}
                                </td>
                                <td>
                                    @if(Auth::user()->role_id==2)
                                    <a class="btn btn-warning pull-right" data-target="#EditUsuario{{$departamento->id}}" data-toggle="modal" href="#" type="submit">
                                           <i class="fas fa-user-edit"></i>
                                            </i>
                                        </a>
                                        <div aria-hidden="true" aria-labelledby="exampleModalLabl" class="modal fade" id="EditUsuario{{$departamento->id}}" tabindex="-1">
                                            <div class="modal-dialog ">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title text-dark">
                                                            {{$departamento->descripcion}} 
                                                        </h5>
                                                        <button class="close" data-dismiss="modal" type="button">
                                                            <span>
                                                                ×
                                                            </span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body carta">
                                                        <form action="{{route ('departamentos.update',$departamento->id)}}"  method="post">
                                                        {{csrf_field()}} {{method_field('put')}}
                                                            <div class="form-group">
                                                                <label class="control-label text-muted" for="id">
                                                                    Id
                                                                </label>
                                                                <label class="form-control" style="background-color: #85929E" id="id" name="id">
                                                                    {{$departamento->id}}
                                                                </label>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label text-muted" for="nombre">
                                                                    Descripción
                                                                </label>
                                                                <input class="form-control" id="descripcion" name="descripcion" type="text" value="{{$departamento->descripcion}}">   
                                                                </input>
                                                            </div>
                                                            
                                                    <div class="modal-footer">
                                                        <button class="btn btn-primary" type="submit">
                                                            Guardar
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    </td>
                                </td>
                                <td>
                                    @if(Auth::user()->role_id==2)
                                        <form action="{{route ('departamentos.delete',$departamento->id)}}" method="POST">
                                            {{csrf_field()}}
                                            <button class="btn btn-danger" onclick="return confirm('¿Borrar?');" type="submit">
                                                <i class="fas fa-user-times"></i>
                                            </button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
