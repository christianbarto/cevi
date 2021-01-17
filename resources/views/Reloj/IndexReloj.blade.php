@extends('layouts.app2')
@section('content')
<h1 class="text-center" style="color:#FDFCFC">
    Importar Reloj Checador
</h1>
<div class="container-fluid">
    <div class="card">
        <div class="card-header" style="color:black">
            Ingresa el archivo del reloj checador
        </div>
        <div class="card-body">
            <div class="row justify-content-center">
                <form action="{{route('checador.import')}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    @if(Session::has('message'))
                    <P style="color:black">{{Session::get('message')}}</P>
                    @endif
                    <div class="form-group">
                        <div>
                            <label class="control-label text-muted" for="Excel">
                                Archivo Reloj checador
                            </label>
                        </div>
                        <input name="Excel" accept=".csv" style="color:black" type="file"></input>
                    </div>
                    <button class="btn btn-primary">
                        Agregar
                    </button>
                </form>
            </div>
        </div>
    </div>
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
                                    RFC
                                </th>
                                <th scope="col">
                                    Hora de Entrada
                                </th>
                                <th scope="col">
                                    Hora de salida
                                </th>
                                <th scope="col">
                                    Incidencia
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($Relojes as $Reloj)
                            <tr>
                                <th>
                                    {{$loop->iteration}}
                                </th>
                                <td>
                                    {{$Reloj->nombre}}
                                </td>
                                <td>
                                    {{$Reloj->RFC}}
                                </td>
                                <td>
                                    {{$Reloj->entrada}}
                                </td>
                                <td>
                                    {{$Reloj->salida}}
                                </td>
                                <td>
                                   #
                                </td>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                   </div>
</div>
@endsection
