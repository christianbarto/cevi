@extends('layouts.app2')
@section('content')
<h1 class="text-center" style="color:#FDFCFC">
    Importar Reloj Checador
</h1>
<div class="row justify-content-center">
    <div class="form-group col-md-9">
        <div class="card">
            <div class="card-header" style="color:black">
                Ingresa el archivo del reloj checador
            </div>
            <div class="card-body">
                <div class="row justify-content-center">
                    <form action="{{route('checador.importxml')}}" enctype="multipart/form-data" method="POST">
                        @csrf
                    @if(Session::has('message'))
                        <p style="color:black">
                            {{Session::get('message')}}
                        </p>
                        @endif
                        @if ($errors->any())
                                <ul class="text-danger">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                        @endif
                        <div class="form-group">
                            <input class="form-control form-control-lg" accept=".xml" name="xml" style="color:black" type="file"/>
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
        </div>
    </div>
</div>
@endsection
