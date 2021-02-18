@extends('layouts.app2')
@section('content')
<h1 class="text-center" style="color:#FDFCFC">
    Importar Reloj Checador
</h1>
<div class="row justify-content-center">
    <div class="form-group col-md-9">
        <div class="card">
            <div class="card-header" style="color:black">
                Ingresa Archivo
            </div>
            <div class="card-body">
                <div class="row justify-content-center">
                    <form action="{{route('checador.import')}}" enctype="multipart/form-data" method="POST">
                        @csrf
                        @if(Session::has('message'))
                            <p style="color:black">
                                {{Session::get('message')}}
                            </p>
                        @endif
                        <div class="form-group">
                            <div>
                                <label class="control-label text-muted" for="Excel">
                                    Archivo Reloj checador
                                </label>
                            </div>
                            <input accept=".csv" name="Excel" style="color:black" type="file"/>
                        </div>
                        <button class="btn btn-primary">
                            Agregar
                        </button>
                    </form>
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
                {!! $Relojs->render() !!}
            </div>
        </div>
    </div>
</div>
@endsection
