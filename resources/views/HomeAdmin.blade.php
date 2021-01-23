@extends('layouts.app2')
@section('content')
<div class="row justify-content-center">
    <div class="form-group col-md-9">
            <div class="card">
                <div class="card-header" style="color:black">
                    <h1>
                    Registro de Incidencias
                    </h1>
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
                            Incidencia
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($Relojs as $Reloj)
                    @if(strcmp(($Reloj->incidencia),'NORMAL')!== 0)
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
                            {{$Reloj->incidencia}}
                        </td>
                    
                    @endif
                        @endforeach
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
