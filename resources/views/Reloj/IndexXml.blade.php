@extends('layouts.app2')
@section('content')
<div class="row justify-content-center">
    <div class="form-group col-md-9">
        <div class="card">
            <div class="card-header" style="color:black">
                <h1 class="text-center" >
                    Importar Reloj Checador
                </h1>
            </div>
            <div class="card-body" style="background-color: #DCDCDC">
                <div class="row justify-content-center">
                    <form action="{{route('checador.importxml')}}" enctype="multipart/form-data" method="POST">
                        @csrf
                        @if(Session::has('message'))
                                {{Session::get('message')}}
                        @endif
                        @if($errors->any())
                            <ul class="text-danger">
                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger" role="alert">
                                     {{ $error }}
                                    </div>
                                @endforeach
                            </ul>
                        @endif
                        <div class="form-group">
                            <input class="form-control form-control-lg" style="background-color: #DCDCDC" accept=".xml" name="xml" type="file"/>
                        </div>
                        <button class="btn btn-primary">
                            Agregar
                        </button>
                    </form>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-dark ">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">
                                Nombre
                            </th>
                            <th scope="col">
                                RFC
                            </th>
                            <th scope="col">
                                Fecha
                            </th>
                            <th scope="col">
                                Hora de Entrada
                            </th>
                            <th scope="col">
                                Hora de Salida
                            </th>
                            <th scope="col">
                                Incidencia
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($Relojes as $Reloj)
                        <tr>
                            <td>
                                {{$Reloj->nombre}}
                            </td>
                            <td>
                                {{$Reloj->RFC}}
                            </td>
                            <td>
                                {{$Reloj->fecha}}
                            </td>
                            <td>
                                @if(($Reloj->entrada)===('00:00:00'))
                                
                                    N/A
                                
                                @else
                                
                                    {{$Reloj->entrada}}
                                   
                                @endif                            
                            </td>
                            <td>
                                @if(($Reloj->salida)===('00:00:00'))
                                
                                    N/A
                                
                                @else
                                
                                    {{$Reloj->salida}}

                                @endif
                            </td>
                            <td>
                                {{$Reloj->incidencia}}
                            </td>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
                {!!$Relojes->render() !!}
            </div>
        </div>
    </div>
</div>
@endsection
