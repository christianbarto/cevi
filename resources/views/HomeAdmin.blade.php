@extends('layouts.app2')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header" style="color:black">
            Registro de Incidencias
        </div>
        <div class="card-body">
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
                    @foreach($Incidencias as $Incidencia)
                    <tr>
                        <th>
                            {{$loop->iteration}}
                        </th>
                        <td>
                            {{$Incidencia->nombre}}
                        </td>
                        <td>
                            {{$Incidencia->RFC}}
                        </td>
                        <td>
                            {{$Incidencia->incidencia}}
                        </td>
                        @endforeach
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection