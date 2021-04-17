@extends('layouts.app2')
@section('content')
<div class="row justify-content-center">
    <div class="form-group col-md-9">
        <div class="card">
            <div class="card-header" style="color:black">
                <h1>
                   Usuarios
                </h1>
            </div>
            <div class="card-body" style="background-color: #DCDCDC">
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
                                            Nombre
                                        </th>
                                        <th scope="col">
                                            Apellido Paterno
                                        </th>
                                        <th scope="col">
                                            Apellido Materno
                                        </th>
                                        <th scope="col">
                                            Usuario
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
                                        <td>
                                            {{$User->name}}
                                        </td>
                                        <td>
                                            {{$User->ap_paterno}}
                                        </td>
                                        <td>
                                            {{$User->ap_materno}}
                                        </td>
                                        <td>
                                            {{$User->email}}
                                        </td>
                                        <td>
                                            @if($User->role_id > 1)
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
                                                        <div class="modal-body" style="background-color: #DCDCDC">
                                                            <form action="{{route ('user.update',$User)}}" method="post">
                                                            {{csrf_field()}} {{method_field('put')}}
                                                            <div class="form-group">
                                                                <label for="" class="text-dark float-left">Nombre</label>
                                                                <input type="text" name ="name" class="form-control" value="{{$User->name}}">
                                                                </input>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="ap_paterno" class="text-dark float-left">Apellido Paterno</label>
                                                                <input type="text" name ="ap_paterno" class="form-control" value="{{$User->ap_paterno}}">
                                                                </input>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="ap_materno" class="text-dark float-left">Apellido Materno</label>
                                                                <input type="text" name ="ap_materno" class="form-control" value="{{$User->ap_materno}}">
                                                                </input>
                                                            </div>
                                                            @if($User->email=='admin_agustin@mail.com' || $User->email=='user@mail.com')
                                                                <div class="form-group">
                                                                    <label for="" class="text-dark float-left">Correo</label>
                                                                    <input type="text" readonly name="email" class="form-control" value={{$User->email}}>
                                                                    </input>
                                                                </div>
                                                            @else
                                                                <div class="form-group">
                                                                    <label for="" class="text-dark float-left">Correo</label>
                                                                    <input type="text"  name="email" class="form-control" value={{$User->email}}>
                                                                    </input>
                                                                </div>
                                                            @endif
                                                            <div class="form-group">
                                                                <label for="" class="text-dark float-left">Contraseña</label>
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
                                                                <div class="modal-footer" style="background-color: #DCDCDC">
                                                                    <button class="btn btn-primary" type="submit">
                                                                        Guardar
                                                                    </button>
                                                                    <button class="btn btn-secondary" data-dismiss="modal" type="button">Cancelar</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <td>
                                                @if($User->email=='admin_agustin')
                                                    <form action="{{ url('/DeleteUsuarios/'.$User->id)}}" method="POST" class="eliminar">
                                                        {{csrf_field()}}
                                                        <button class="btn btn-danger" type="submit" disabled>
                                                            <i class="fas fa-user-times"></i>
                                                        </button>
                                                    </form>
                                                @else
                                                    <form action="{{ url('/DeleteUsuarios/'.$User->id)}}" method="POST" class="eliminar">
                                                        {{csrf_field()}}
                                                        <button class="btn btn-danger" type="submit">
                                                            <i class="fas fa-user-times"></i>
                                                        </button>
                                                    </form>
                                                @endif
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
    </div>
</div>
@endsection
@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    @if(session('eliminar')=='ok')
        <script type="text/javascript">
        Swal.fire(
            '¡Eliminado!',
            'El registro ha sido eliminado con éxito',
            'success'
                )
        </script>
    @endif
    <script type="text/javascript">
        $('.eliminar').submit(function(e){
            e.preventDefault();
            Swal.fire({
              title: '¿Estas seguro de eliminar este usuario?',
              text: "Esta accion sera permanente",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              cancelButtonText:'Cancelar', 
              confirmButtonText: '¡Si, Eliminar!'
            }).then((result) => {
              if (result.isConfirmed) {
                this.submit();
                
              }
            })
        }) 
    </script>
@endsection
