@extends('layouts.app2')
@section('content')
<h1 class="text-center" style="color:#FDFCFC">
    Exportar Reportes
</h1>
<div class="row justify-content-center">
    <div class="form-group col-md-9">
        <div class="card">
            <div class="card-header">
                <h2 style="color:black">
                    Selecciona el Reporte
                </h2>
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="form-group col-md-3 border border-1 logo-dep">
                            <form action="{{route('reportes.usuarios')}}" method="GET">
                                <h4 style="color:black">
                                    Roles y Usuarios
                                </h4>
                                <div class="form-group text-center">
                                   <!-- Submit Button -->
                                   <button class="btn btn-primary " type="submit">
                                     Generar
                                   </button>
                                </div>
                            </form>
                        </div>
                        <div class="form-group col-md-3 border border-4 logo-dep">
                           <form action="{{route('reportes.usuarios')}}" method="GET">

                            <h4 style="color:black">
                                Empleados
                            </h4>
                            <div class="form-group text-center">
                            <!-- Submit Button -->
                            <button class="btn btn-primary " type="submit">
                               Generar
                            </button>
                            </div>
                           </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
