@extends('layouts.app2')
@section('content')
<div class="container-fluid" style="background-color:#7D3C98">
    <h1>
        {{$empleados->nombre}} {{$empleados->ap_materno}} {{$empleados->ap_paterno}}
    </h1>
    <div class="card">
        <div class="card-body">
            <div class="form-group col-md-5 text-muted">
                <h2>
                    Datos Personales
                </h2>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label class="control-label text-muted" for="id">
                        Numero de Trabajador
                    </label>
                    <label class="form-control" id="id" name="id" type="text">
                        {{$empleados->id}}
                    </label>
                </div>
                <div class="form-group col-md-3">
                    <label class="control-label text-muted" for="nombre">
                        Nombre
                    </label>
                    <label class="form-control" id="nombre" name="nombre" type="text">
                        {{$empleados->nombre}}
                    </label>
                </div>
                <div class="form-group col-md-3">
                    <label class="control-label text-muted" for="ap_paterno">
                        Apellido Paterno
                    </label>
                    <label class="form-control" id="ap_paterno" name="ap_paterno" type="text">
                        {{$empleados->ap_paterno}}
                    </label>
                </div>
                <div class="form-group col-md-3">
                    <label class="control-label text-muted" for="ap_materno">
                        Apellido Materno
                    </label>
                    <label class="form-control" id="ap_materno" name="ap_materno" type="text">
                        {{$empleados->ap_materno}}
                    </label>
                </div>
                <div class="form-group col-md-3">
                    <label class="control-label text-muted" for="RFC">
                        RFC
                    </label>
                    <label class="form-control" id="RFC" name="RFC" type="text">
                        {{$empleados->RFC}}
                    </label>
                </div>
                <div class="form-group col-md-3">
                    <label class="control-label text-muted" for="telefono">
                        Telefono
                    </label>
                    <label class="form-control" id="telefono" name="telefono" type="text">
                        {{$empleados->telefono}}
                    </label>
                </div>
                <div class="form-group col-md-3">
                    <label class="control-label text-muted" for="genero">
                        Genero
                    </label>
                    <label class="form-control" id="genero" name="genero" type="text">
                            @if(($empleados->genero)=='H')
                            Hombre
                            @else
                            Mujer
                            @endif
                    </label>
                </div>
                <div class="form-group col-md-3">
                    <label class="control-label text-muted" for="correo">
                        Correo
                    </label>
                    <label class="form-control" id="correo" name="correo" type="text">
                        {{$empleados->correo}}
                    </label>
                </div>
                <div class="form-group col-md-3">
                    <label class="control-label text-muted" for="puesto">
                        Puesto
                    </label>
                    <label class="form-control" id="puesto" name="puesto" type="text">
                        {{$empleados->puesto}}
                    </label>
                </div>
                <div class="form-group col-md-3">
                    <label class="control-label text-muted" for="Tcontrato">
                        Tipo de Contrato
                    </label>
                    <label class="form-control" id="Tcontrato" name="Tcontrato" type="text">
                        {{$empleados->Tcontrato}}
                    </label>
                </div>
            </div>
            <div class="form-group col-md-5 text-muted">
                <h2>
                    Documentos Personales
                </h2>
            </div>
            <div class="form-row">
                <div class="form-group col-md-5">
                    <ul>
                        <li>
                            <a class="text-danger align-items-start" href="{{$empleados->solicitud}}">
                                Solicitud de Empleo
                            </a>
                        </li>
                        <li>
                            <a class="text-danger align-items-start" href="{{$empleados->contrato}}">
                                Contrato
                            </a>
                        </li>
                        <li>
                            <a class="text-danger align-items-start" href="{{$empleados->creden_elect}}">
                                Credencial de Elector
                            </a>
                        </li>
                        <li>
                            <a class="text-danger align-items-start" href="{{$empleados->acta_nac}}">
                                Acta de Nacimiento
                            </a>
                        </li>
                        <li>
                            <a class="text-danger align-items-start" href="{{$empleados->curriculum}}">
                                Curriculum
                            </a>
                        </li>
                        <li>
                            <a class="text-danger align-items-start" href="{{$empleados->cert_medico}}">
                                Certificado Medico
                            </a>
                        </li>
                        <li>
                            <a class="text-danger align-items-start" href="{{$empleados->cart_recomend}}">
                                Carta de recomendacion
                            </a>
                        </li>
                        <li>
                            <a class="text-danger align-items-start" href="{{$empleados->const_Noinhab}}">
                                Constancia de No Inhabilitacion
                            </a>
                        </li>
                        <li>
                            <a class="text-danger align-items-start" href="{{$empleados->comp_Dom}}">
                                Comprobante de domicilio
                            </a>
                        </li>
                        <li>
                            <a class="text-danger align-items-start" href="{{$empleados->licencia}}">
                                Licencia de Conducir
                            </a>
                        </li>
                        <li>
                            <a class="text-danger align-items-start" href="{{$empleados->nss}}">
                                Numero de Seguro Social
                            </a>
                        </li>
                        <li>
                            <a class="text-danger align-items-start" href="{{$empleados->infonavit}}">
                                Comprobante de Infonavit
                            </a>
                        </li>
                        <li>
                            <a class="text-danger align-items-start" href="{{$empleados->rfc_doc}}">
                                Comprobante de RFC
                            </a>
                        </li>
                        <li>
                            <a class="text-danger align-items-start" href="{{$empleados->cartilla}}">
                                Cartilla Militar
                            </a>
                        </li>
                        <li>
                            <a class="text-danger align-items-start" href="{{$empleados->curp}}">
                                Curp
                            </a>
                        </li>
                        <li>
                            <a class="text-danger align-items-start" href="{{$empleados->diploma}}">
                                Diploma de Ultimo Nivel Academico
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
