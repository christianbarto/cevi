@extends('layouts.app2')
@section('content')  
<div class="row justify-content-center">
    <div class="form-group col-md-9">
        <div class="card">
            <div class="card-header" style="color:black">
                <h1>
                   Categorias
                </h1>
            </div>
            @if(session('verifi'))
                <div class="alert alert-danger" role="alert">
                    {{session('verifi')}}
                </div>
            @endif
            <div class="card-body" style="background-color: #DCDCDC">
                <div class="row float-right col-md-16">
                    <div class="form-group" style="margin-top: -15px;">
                        <a class="btn btn-primary float-right" data-target="#createCategoria" data-toggle="modal" href="#" type="submit">
                            + Agregar
                        </a>
                        <div aria-hidden="true" aria-labelledby="exampleModalLabl" class="modal fade" id="createCategoria" tabindex="-1">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="text-center text-muted" style="color:gray">
                                            Crear Nueva Categoria
                                        </h3>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{route ('categoria.store')}}" method="post">
                                            {{csrf_field()}} {{method_field('post')}}
                                        <div class="form-group col-md-12">
                                            <input class="form-control" id="identificador" name="identificador" type="text" placeholder="Id" required>
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
                                            <button class="btn btn-secondary" data-dismiss="modal" type="button">Cancelar</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <form class="form-inline row" style="margin-top: 40px;margin-left: 730px;" action="{{ url('/buscarCategoria')}}" method="get">
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
                            <button method="get" href="{{ url('/IndexCategorias')}}" class="btn btn-success">
                                <i class="fas fa-sync-alt"></i>
                            </button>
                        </form>
                    </div>
                </div>
                <div class="table-responsive" style="width:100%;overflow:auto; max-height:430px;">
                    <table class="table table-striped table-hover">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">
                                    Id
                                </th>
                                <th scope="col">
                                    Descripción
                                </th>
                                @if(Auth::user()->role_id==2)
                                <th scope="col">
                                    Editar
                                </th>
                                @endif
                                @if(Auth::user()->role_id==2)
                                <th scope="col">
                                    Eliminar
                                </th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                             @foreach($categorias as $categoria)
                            <tr>
                                <td>
                                   {{$categoria->identificador}}
                                </td>
                                <td>
                                    {{$categoria->descripcion}}
                                </td>
                                @if(Auth::user()->role_id==2)
                                <td>
                                    <a class="btn btn-warning pull-right" data-target="#EditUsuario{{$categoria->id}}" data-toggle="modal" href="#" type="submit">
                                           <i class="fas fa-user-edit"></i>
                                            </i>
                                        </a>
                                        <div aria-hidden="true" aria-labelledby="exampleModalLabl" class="modal fade" id="EditUsuario{{$categoria->id}}" tabindex="-1">
                                            <div class="modal-dialog ">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title text-dark">
                                                            {{$categoria->descripcion}} 
                                                        </h5>
                                                        <button class="close" data-dismiss="modal" type="button">
                                                            <span>
                                                                ×
                                                            </span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body carta">
                                                        <form action="{{route ('categoria.update',$categoria->id)}}"  method="post">
                                                        {{csrf_field()}} {{method_field('put')}}
                                                            <div class="form-group">
                                                                <label class="control-label text-muted" for="id">
                                                                    Id
                                                                </label>
                                                                <label class="form-control" style="background-color: #85929E" id="identificador" name="identificador">
                                                                    {{$categoria->identificador}}
                                                                </label>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label text-muted" for="nombre">
                                                                    Descripción
                                                                </label>
                                                                <input class="form-control" id="descripcion" name="descripcion" type="text" value="{{$categoria->descripcion}}">   
                                                                </input>
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
                                    
                                </td>
                                @endif
                                @if(Auth::user()->role_id==2)
                                <td>
                                        <form action="{{route ('categoria.delete',$categoria->id)}}" method="POST" class="eliminar">
                                            {{csrf_field()}}
                                            <button class="btn btn-danger" type="submit">
                                                <i class="fas fa-user-times"></i>
                                            </button>
                                        </form>
                                </td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
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
              title: '¿Estas seguro de eliminar esta categoria?',
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