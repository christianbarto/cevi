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
                            <div class="alert alert-success" role="alert">
                                {{Session::get('message')}}
                            </div>
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
                            <input class="form-control form-control-lg" style="background-color: #DCDCDC" accept=".xml" name="xml" id="xml" type="file"/>
                        </div>
                        <button class="btn btn-primary">
                            Agregar
                        </button>
                    </form>
                </div>
            </div>
            <div class="table-responsive" style="width:100%;overflow:auto; max-height:430px;">
                <table class="table table-dark">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">
                                RFC
                            </th>
                            <th scope="col">
                                Nombre(s)
                            </th>
                            <th scope="col">
                                Apellido Paterno
                            </th>
                            <th scope="col">
                                Apellido Materno
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
                                {{$Reloj->RFC}}
                            </td>
                            <td>
                                {{$Reloj->nombre}}
                            </td>
                            <td>
                                {{$Reloj->ap_paterno}}
                            </td>
                            <td>
                                {{$Reloj->ap_materno}}
                            </td>
                            <td>
                                {{Date::parse($Reloj->fecha)->format('j \d\e F \d\e Y')}}
                            </td>
                            <td>
                                @if(($Reloj->entrada)===('00:00:00'))
                                
                                    N/A
                                
                                @else
                                {{Date::parse($Reloj->entrada)->isoFormat('h:mm A')}}
                                    
                                @endif                            
                            </td>
                            <td>
                                @if(($Reloj->salida)===('00:00:00'))
                                
                                    N/A
                                
                                @else
                                {{Date::parse($Reloj->salida)->isoFormat('h:mm A')}}

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
</div>
@endsection
@section('js')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script type="text/javascript">
        const MAXIMO_TAMANIO_BYTES = 5000000; // 1MB = 1 millón de bytes

        // Obtener referencia al elemento
        const $miInput = document.querySelector("#xml");

        $miInput.addEventListener("change", function () {
            // si no hay archivos, regresamos
            if (this.files.length <= 0) return;

            // Validamos el primer archivo únicamente
            const archivo = this.files[0];
            if (archivo.size > MAXIMO_TAMANIO_BYTES) {
                const tamanioEnMb = MAXIMO_TAMANIO_BYTES / 1000000;
                Swal.fire(
                    'Excedio el tamaño maximo del archivo!',
                    'El tamaño maximo de los archivos es de 5MB',
                    'warning'
                )
                // Limpiar
                $miInput.value = "";
            } else {
                // Validación pasada. Envía el formulario o haz lo que tengas que hacer
            }
        });
    </script>
@endsection
