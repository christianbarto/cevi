@extends('layouts.app2')
@section('content')
<div class="row justify-content-center overflow-auto">
    <div class="form-group col-md-9">
            <div class="card">
                <div class="card-header">
                    <h1 style="color: black">
                        {{$empleados->nombre}} {{$empleados->ap_paterno}} {{$empleados->ap_materno}}
                    </h1>
                </div>
                <div class="card-body" style="background-color: #DCDCDC">
                    <form action="{{ route('empleados.buscarDocumento')}}" method="get">
                        <div class="form-group col-md-5  text-muted ">
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
                                    Nombre(s)
                                </label>
                                <label class="form-control" id="nombre" name="nombre" type="text">
                                    {{$empleados->nombre}}
                                </label>
                            </div>
                            <div class="form-group col-md-3">
                                <label class="control-label text-muted" for="nombre">
                                    Apellido Paterno
                                </label>
                                <label class="form-control" id="nombre" name="nombre" type="text">
                                    {{$empleados->ap_paterno}}
                                </label>
                            </div>
                            <div class="form-group col-md-3">
                                <label class="control-label text-muted" for="nombre">
                                    Apellido Materno
                                </label>
                                <label class="form-control" id="nombre" name="nombre" type="text">
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
                                <label class="control-label text-muted" for="fecha_alta">
                                    Fecha de Alta
                                </label>
                                <label class="form-control" id="fecha_alta" name="fecha_alta" type="text">
                                    {{Date::parse($empleados->fecha_alta)->format('j \d\e F \d\e Y')}}
                                </label>
                            </div>
                            <div class="form-group col-md-3">
                                <label class="control-label text-muted" for="Tcontrato">
                                    Relacion Laboral
                                </label>
                                <label class="form-control" id="Tcontrato" name="Tcontrato" type="text">
                                    @if($empleados->Tcontrato=='base')
                                        PERSONAL DE BASE
                                    @elseif($empleados->Tcontrato=='contrato')
                                        PERSONAL DE CONTRATO
                                    @elseif($empleados->Tcontrato=='nombremientoConfianza')
                                        NOMBRAMIENTO CONFIANZA
                                    @elseif($empleados->Tcontrato=='mandosMedios')
                                        MANDOS MEDIOS
                                    @elseif($empleados->Tcontrato=='contratoConfianza')
                                        CONTRATO CONFIANZA
                                    @endif                                    
                                </label>
                            </div>
                            <div class="form-group col-md-3">
                                <label class="control-label text-muted" for="fecha_nombramiento">
                                    Fecha de Nombramiento
                                </label>
                                <label class="form-control" id="fecha_nombramiento" name="fecha_nombramiento" type="text">
                                    @if($empleados->fecha_nombramiento==null)
                                        Sin Fecha de Nombramiento
                                    @else
                                    {{Date::parse($empleados->fecha_nombramiento)->format('j \d\e F \d\e Y')}}
                                    @endif
                                </label>
                            </div>
                            <div class="form-group col-md-3">
                                <label class="control-label text-muted" for="telefono">
                                    Telefono
                                </label>
                                <label class="form-control" id="telefono" name="telefono" >
                                    {{$empleados->telefono}}
                                </label>
                            </div>
                            <div class="form-group col-md-3">
                                <label class="control-label text-muted" for="genero">
                                    Genero
                                </label>
                                <label class="form-control" id="genero" name="genero" type="text">
                                       {{$empleados->genero}}
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
                            <div class="form-group col-md-4">
                                <label class="control-label text-muted" for="puesto">
                                    Categoria
                                </label>
                                <label class="form-control" id="puesto" name="puesto" type="text">
                                    {{$empleados->puesto}}
                                </label>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="control-label text-muted" for="departamento">
                                    Departamento
                                </label>
                                <label class="form-control" id="departamento" name="departamento" type="text">
                                    {{$empleados->departamento}}
                                </label>
                            </div>
                        </div>

                        <div class="form-group col-md-5 text-muted">
                            <h2>
                                Documentos Personales
                            </h2>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <select class="form-control" id="seleccion" name="seleccion">
                                    @if($campo==null)
                                    <option selected value="default">Selecciona el Documento</option>
                                    @else
                                    <option value="default">Selecciona el Documento</option>
                                    @endif

                                    @if($campo=='contrato')
                                    <option selected value="contrato">
                                        Contrato
                                    </option>
                                    @else
                                    <option value="contrato">
                                        Contrato
                                    </option>
                                    @endif

                                    @if($campo=='creden_elect')
                                    <option selected value="creden_elect">
                                        Credencial de Elector
                                    </option>
                                    @else
                                    <option value="creden_elect">
                                        Credencial de Elector
                                    </option>
                                    @endif
                                    
                                    @if($campo=='acta_nac')
                                    <option selected value="acta_nac">
                                        Acta de nacimiento
                                    </option>
                                    @else
                                    <option value="acta_nac">
                                        Acta de nacimiento
                                    </option>
                                    @endif

                                    @if($campo=='curriculum')
                                    <option selected value="curriculum">
                                        Curriculum
                                    </option>
                                    @else
                                    <option value="curriculum">
                                        Curriculum
                                    </option>
                                    @endif

                                    @if($campo=='solicitud')
                                    <option selected value="solicitud">
                                        Solicitud de Empleo
                                    </option>
                                    @else
                                    <option value="solicitud">
                                        Solicitud de Empleo
                                    </option>
                                    @endif

                                    @if($campo=='cert_medico')
                                    <option selected value="cert_medico">
                                        Certificado Médico
                                    </option>
                                    @else
                                    <option value="cert_medico">
                                        Certificado Médico
                                    </option>
                                    @endif

                                    @if($campo=='cart_recomend')
                                    <option selected value="cart_recomend">
                                        Carta de Recomendación
                                    </option>
                                    @else
                                    <option value="cart_recomend">
                                        Carta de Recomendación
                                    </option>
                                    @endif

                                    @if($campo=='fotografia')
                                    <option selected value="fotografia">
                                        Fotografia
                                    </option>
                                    @else
                                    <option value="fotografia">
                                        Fotografia
                                    </option>
                                    @endif

                                    @if($campo=='const_Noinhab')
                                    <option selected value="const_Noinhab">
                                        Constancia de No Inhabilitación
                                    </option>
                                    @else
                                    <option value="const_Noinhab">
                                        Constancia de No Inhabilitación
                                    </option>
                                    @endif

                                    @if($campo=='comp_Dom')
                                    <option selected value="comp_Dom">
                                        Comprobante de domicilio
                                    </option>
                                    @else
                                    <option value="comp_Dom">
                                        Comprobante de Domicilio
                                    </option>
                                    @endif

                                    @if($campo=='licencia')
                                    <option selected value="licencia">
                                        Licencia de Conducir
                                    </option>
                                    @else
                                    <option value="licencia">
                                        Licencia de Conducir
                                    </option>
                                    @endif

                                    @if($campo=='nss')
                                    <option selected value="nss">
                                        Numero de Seguro Social
                                    </option>
                                    @else
                                    <option value="nss">
                                        Numero de Seguro Social
                                    </option>
                                    @endif

                                    @if($campo=='infonavit')
                                    <option selected value="infonavit">
                                        Infonavit
                                    </option>
                                    @else
                                    <option value="infonavit">
                                        Infonavit
                                    </option>
                                    @endif

                                    @if($campo=='rfc_doc')
                                    <option selected value="rfc_doc">
                                        Constancia de RFC
                                    </option>
                                    @else
                                    <option value="rfc_doc">
                                        Constancia de RFC
                                    </option>
                                    @endif

                                    @if($campo=='cartilla')
                                    <option selected value="cartilla">
                                        Cartilla Militar Liberada
                                    </option>
                                    @else
                                    <option value="cartilla">
                                        Cartilla Militar Liberada
                                    </option>
                                    @endif

                                    @if($campo=='curp')
                                    <option selected value="curp">
                                        Clave Única de Registro de Poblacional (CURP)
                                    </option>
                                    @else
                                    <option value="curp">
                                        Clave Única de Registro de Poblacional (CURP)
                                    </option>
                                    @endif

                                    @if($campo=='diploma')
                                    <option selected value="diploma">
                                        Diploma de Grado de Estudio
                                    </option>
                                    @else
                                    <option value="diploma">
                                        Diploma de Grado de Estudio
                                    </option>
                                    @endif

                                    @if($campo=='nombramiento')
                                    <option selected value="nombramiento">
                                        Nombramiento
                                    </option>
                                    @else
                                    <option value="nombramiento">
                                        Nombramiento
                                    </option>
                                    @endif

                                    @if($campo=='dictamen')
                                    <option selected value="dictamen">
                                        Dictamen
                                    </option>
                                    @else
                                    <option value="dictamen">
                                        Dictamen
                                    </option>
                                    @endif

                                    
                                </select>
                            </div>
                            <div class="form-group col-md-3"> 
                                    <button class="btn btn-primary float-left" name = "idF"  type="submit" value={{$empleados->id}}>
                                        <i class="fas fa-search"></i>
                                        Buscar
                                    </button>
                            </div>
                        </div> 
                    </form>
                    @if($seleccion!=null)
                    <center>
                        <iframe class="iframe hidden-print" for="seleccion" src={{$seleccion}}></iframe>
                    </center>
                    @elseif($campo=='default')
                        <h2 class="alert alert-primary" role="alert" style="color:black">Selecciona un Documento</h2>
                    @elseif($seleccion==null)
                        <h2 div class="alert alert-danger" role="alert" style="color:black">No se cuenta con el archivo seleccionado</h2>
                    @endif

                    <br>
                    <div class="form-group col-md-5 text-muted">
                        <h5>
                            Documentos Personales Adicionales
                        </h5>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                        <form action="{{ route('empleados.buscarDocumentoAdicional')}}" method="get">
                            <select class="form-control" id="select" name="select">
                                <option value="default">Selecciona el Documento</option>
                                @foreach($adicionales as $adicional)
                                    <option value="{{$adicional->dir}}">
                                        {{$adicional->nombre}}
                                    </option>
                                @endforeach
                            </select> 
                        </div>
                        <div class="form-group col-md-3"> 
                            <button class="btn btn-primary float-left" name="adi"  type="submit" value={{$empleados->id}}>
                                <i class="fas fa-search"></i>
                                    Buscar
                            </button>
                        </div>
                        </form>
                    </div>
                    @if($nombre!=null)
                    <label class="form-control" id="name" name="name" type="text">
                        {{$nombre}}
                    </label>
                    @endif

                    @if($extra=='default')
                        <h2 class="alert alert-primary" role="alert" style="color:black">Selecciona un Documento</h2>
                    @elseif($extra!=null)
                    <center>
                        <iframe class="iframe hidden-print" for="seleccion" src="{{$extra}}"></iframe>
                    </center>
                    @endif
                </div>
            </div>
    </div>
</div>
@endsection
