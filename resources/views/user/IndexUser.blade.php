@extends('layouts.app')
@section('content')
<div>
    <h1 class="text-center" style="color:#FDFCFC">
        Usuarios
    </h1>
</div>
<div class="row justify-content-center">
    <div class="form-group col-md-9">
        @include('user.forms.edit')
        <form action="{{ url('/alta')}}" method="get">
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
                                    Nombre
                                </th>
                                <th scope="col">
                                    Username
                                </th>
                                <th scope="col">
                                    Password
                                </th>
                                <th scope="col">
                                    Role
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
                            @foreach($usuarios as $User)
                            <tr>
                                <th>
                                    {{$loop->iteration}}
                                </th>
                                <td>
                                    {{$User->name}}
                                </td>
                                <td>
                                    {{$User->email}}
                                </td>
                                <td>
                                    {{$User->password}}
                                </td>
                                <td>
                                    @if(($User->role_id) > 1)
                                        Administrador
                                    @else
                                        Usuario
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-warning pull-right" data-target="#EditUsuario{{$User->id}}" data-toggle="modal" href="#" type="submit">
                                        <i class="fas fa-user-edit"></i>
                                    </a>
                                    <div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="EditUsuario{{$User->id}}" tabindex="-1">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title text-dark">
                                                        Editar Usuario
                                                    </h5>
                                                    <button class="close" data-dismiss="modal" type="button">
                                                        <span>
                                                        &times;
                                                        </span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{route ('user.update',$User)}}" method="post">
                                                    {{csrf_field()}} {{method_field('put')}}
                                                    <div class="form-group">
                                                        <label for="" class="text-dark float-left">Nombre</label>
                                                        <input type="text" name ="name" class="form-control" value={{$User->name}}>
                                                        </input>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="" class="text-dark float-left">UserName</label>
                                                        <input type="text" name ="email" class="form-control" value={{$User->email}}>
                                                        </input>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="" class="text-dark float-left">Password</label>
                                                        <input type="text" name ="password" class="form-control" placeholder="Ingresa Nueva Contraseña">
                                                        </input>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label text-dark float-left" for="role_id">
                                                            Role
                                                        </label>
                                                        <select class="form-control" id="role_id" name="role_id">
                                                        <option value="2">
                                                            Administrador
                                                        </option>
                                                        <option value="1">
                                                            Usuario
                                                        </option>
                                                        </select>
                                                    </div>
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
                                        <td>
                                            <form action="{{ url('/DeleteUsuarios/'.$User->id)}}" method="POST">
                                                {{csrf_field()}}
                                                <button class="btn btn-danger" onclick="return confirm('¿Borrar?');" type="submit">
                                                    <i class="fas fa-user-times"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </br>
        </br>
    </div>
</div>
@endsection
