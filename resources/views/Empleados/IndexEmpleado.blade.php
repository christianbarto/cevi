@extends('layouts.app2')
@section('content')
<div>
    <h1 class="text-center" style="color:#FDFCFC">
        Empleados
    </h1>
</div>
<div class="row justify-content-center">
    <div class="form-group col-md-9">
        @include('user.forms.edit')
        <form action="{{ url('/createEmpleado')}}" method="get">
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
                                    #
                                </th>
                                <th scope="col">
                                    Avatar
                                </th>
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
                                    Estatus
                                </th>
                                <th scope="col">
                                    Ver
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
                            @foreach($empleados as $Empleado)
                            <tr>
                                <th>
                                    {{$loop->iteration}}
                                </th>
                                <td>
                                    <img alt="Avatar" class="img-fluid" height="60" src="{{$Empleado->avatar}}" width="60">
                                    </img>
                                </td>
                                <td>
                                    {{$Empleado->nombre}}
                                </td>
                                <td>
                                    {{$Empleado->ap_paterno}}
                                </td>
                                <td>
                                    {{$Empleado->ap_materno}}
                                </td>
                                <td>
                                    {{$Empleado->estatus}}
                                </td>


                                {{-- Boton de Ver Informacion --}}
                                <td>
                                    <a class="btn btn-success pull-right" data-target="#EditUsuario{{$Empleado->id}}" data-toggle="modal" href="#" type="submit">
                                       <i class="fas fa-user-check"></i>
                                        </i>
                                    </a>
                                    <div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="EditUsuario{{$Empleado->id}}" tabindex="-1">
                                        <div class="modal-dialog modal-xl">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title text-dark">
                                                        {{$Empleado->nombre}} {{$Empleado->ap_paterno}} {{$Empleado->ap_materno}}
                                                    </h5>
                                                    <button class="close" data-dismiss="modal" type="button">
                                                        <span>
                                                            ×
                                                        </span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                        <div class="form-group">
                                                            <label class="control-label text-muted" for="id">
                                                                Numero de Trabajador
                                                            </label>
                                                            <label class="form-control" id="id" name="id" type="text">
                                                                {{$Empleado->id}}
                                                            </label>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label text-muted" for="nombre">
                                                                Nombre
                                                            </label>
                                                            <label class="form-control" id="nombre" name="nombre" type="text">
                                                                {{$Empleado->nombre}}
                                                            </label>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label text-muted" for="ap_paterno">
                                                                Apellido Paterno
                                                            </label>
                                                            <label class="form-control" id="ap_paterno" name="ap_paterno" type="text">
                                                                {{$Empleado->ap_paterno}}
                                                            </label>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label text-muted" for="ap_materno">
                                                                Apellido Materno
                                                            </label>
                                                            <label class="form-control" id="ap_materno" name="ap_materno" type="text">
                                                                {{$Empleado->ap_materno}}
                                                            </label>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label text-muted" for="RFC">
                                                                RFC
                                                            </label>
                                                            <label class="form-control" id="RFC" name="RFC" type="text">
                                                                {{$Empleado->RFC}}
                                                            </label>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label text-muted" for="telefono">
                                                                Telefono
                                                            </label>
                                                            <label class="form-control" id="telefono" name="telefono" type="text">
                                                                {{$Empleado->telefono}}
                                                            </label>

                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label text-muted" for="genero">
                                                                Genero
                                                            </label>
                                                            <label class="form-control" id="genero" name="genero" type="text">
                                                                {{$Empleado->genero}}
                                                            </label>

                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label text-muted" for="correo">
                                                                Correo
                                                            </label>
                                                            <label class="form-control" id="correo" name="correo" type="text">
                                                                {{$Empleado->correo}}
                                                            </label>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label text-muted" for="puesto">
                                                                Puesto
                                                            </label>
                                                            <label class="form-control" id="puesto" name="puesto" type="text">
                                                                {{$Empleado->puesto}}
                                                            </label>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label text-muted" for="Tcontrato">
                                                                Tipo de Contrato
                                                            </label>
                                                            <label class="form-control" id="Tcontrato" name="Tcontrato" type="text">
                                                                {{$Empleado->Tcontrato}}
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group text-muted">
                                                        <h3>
                                                            Documentos Personales
                                                        </h3>
                                                    </div>

                                                        <div class="form-group">
                                                            <ul>
                                                                <li>
                                                                    <a class="text-danger align-items-start" href="{{$Empleado->solicitud}}">
                                                                        Solicitud de Empleo
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="text-danger align-items-start" href="{{$Empleado->contrato}}">
                                                                        Contrato
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="text-danger align-items-start" href="{{$Empleado->creden_elect}}">
                                                                        Credencial de Elector
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="text-danger align-items-start" href="{{$Empleado->acta_nac}}">
                                                                        Acta de Nacimiento
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="text-danger align-items-start" href="{{$Empleado->curriculum}}">
                                                                        Curriculum
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="text-danger align-items-start" href="{{$Empleado->cert_medico}}">
                                                                        Certificado Medico
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="text-danger align-items-start" href="{{$Empleado->cart_recomend}}">
                                                                        Carta de recomendacion
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="text-danger align-items-start" href="{{$Empleado->const_Noinhab}}">
                                                                        Constancia de No Inhabilitacion
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="text-danger align-items-start" href="{{$Empleado->comp_Dom}}">
                                                                        Comprobante de domicilio
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="text-danger align-items-start" href="{{$Empleado->licencia}}">
                                                                        Licencia de Conducir
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="text-danger align-items-start" href="{{$Empleado->nss}}">
                                                                        Numero de Seguro Social
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="text-danger align-items-start" href="{{$Empleado->infonavit}}">
                                                                        Comprobante de Infonavit
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="text-danger align-items-start" href="{{$Empleado->rfc_doc}}">
                                                                        Comprobante de RFC
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="text-danger align-items-start" href="{{$Empleado->cartilla}}">
                                                                        Cartilla Militar
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="text-danger align-items-start" href="{{$Empleado->curp}}">
                                                                        Curp
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="text-danger align-items-start" href="{{$Empleado->diploma}}">
                                                                        Diploma de Ultimo Nivel Academico
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                {{-- Boton de Ver Informacion --}}

                                <td>
                                    <a class="btn btn-warning pull-right" href="#" type="submit">
                                        <i class="fas fa-user-edit">
                                        </i>
                                    </a>
                                </td>



                                <td>
                                    <a class="btn btn-outline-danger pull-right" href="#" type="submit">
                                        <i class="fas fa-user-times">
                                        </i>
                                    </a>
                                </td>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
            </br>
        </br>
    </div>
</div>
@endsection
