@extends('layouts.app2')
@section('content')
<div class="row justify-content-center overflow-auto">
    <div class="form-group col-md-9">
        <div class="row float-left col-md-10">
            <div class="form-group">
                <div class="card">
                    <form class="form-inline" action="{{ url('/buscarEmpleado')}}" method="get">
                        <select class="form-control" id="seleccion" name="seleccion">
                            <option value="id">
                                N° de Trabajador
                            </option>
                            <option value="nombre">
                                Nombre
                            </option>
                            <option value="RFC">
                                RFC
                            </option>
                            <option value="paterno">
                                Apellido Paterno
                            </option>
                            <option value="materno">
                                Apellido Materno
                            </option>
                        </select>
                        <input class="form-control" id="search" name="search" type="text" ></input>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-search"></i>
                        </button>
                        <button method="get" action="{{ url('/IndexEmpleado')}}" class="btn btn-success">
                            <i class="fas fa-sync-alt"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    <br>
    <br>
    <br>
    @toastr_css
    <h1 class="text-center" style="color:#FDFCFC">
    Empleados Activos
    </h1>
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
                                    N° Trabajador
                                </th>
                                <th scope="col">
                                    Avatar
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
                                    RFC
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
                                @if(Auth::user()->role_id==2)
                                <th scope="col">
                                    Eliminar
                                </th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($empleados as $Empleado)
                            @if($Empleado->estatus == 'activo')
                            <tr>
                                <th>
                                    {{$Empleado->id}}
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
                                    {{$Empleado->RFC}}
                                </td>
                                <td>
                                    {{$Empleado->estatus}}
                                </td>


                                {{-- Boton de Ver Informacion --}}
                                <td>
                                    <a class="btn btn-success pull-right" data-target="#VerUsuario{{$Empleado->id}}" data-toggle="modal" href="#" type="submit">
                                       <i class="fas fa-user-check"></i>
                                        </i>
                                    </a>
                                    <div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="VerUsuario{{$Empleado->id}}" tabindex="-1">
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
                                                            <label class="control-label text-muted" for="fecha_alta">
                                                                Fecha de Alta
                                                            </label>
                                                            <label class="form-control" id="fecha_alta" name="fecha_alta" type="text">
                                                                {{Date::parse($Empleado->fecha_alta)->format('l j \d\e F \d\e Y')}}
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

                                {{-- Boton de Editar Informacion --}}

                                <td>
                                    <a class="btn btn-warning pull-right" data-target="#EditUsuario{{$Empleado->id}}" data-toggle="modal" href="#" type="submit">
                                       <i class="fas fa-user-edit"></i>
                                        </i>
                                    </a>
                                    <div aria-hidden="true" aria-labelledby="exampleModalLabl" class="modal fade" id="EditUsuario{{$Empleado->id}}" tabindex="-1">
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
                                                    <form action="{{route ('empleado.update',$Empleado->id)}}"  enctype="multipart/form-data" method="post">
                                                    {{csrf_field()}} {{method_field('put')}}
                                                        <div class="form-group">
                                                            <label class="control-label text-muted" for="id">
                                                                Numero de Trabajador
                                                            </label>
                                                            <input class="form-control" style="background-color: #F7F9F9 " value="{{$Empleado->id}}" id="id" name="id" type="text">
                                                            </input>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label text-muted" for="nombre">
                                                                Nombre
                                                            </label>
                                                            <input class="form-control" id="nombre" name="nombre" type="text" value={{$Empleado->nombre}}>
                                                                
                                                            </input>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label text-muted" for="ap_paterno">
                                                                Apellido Paterno
                                                            </label>
                                                            <input class="form-control" id="ap_paterno" name="ap_paterno" type="text" value={{$Empleado->ap_paterno}}>
                                                                
                                                            </input>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label text-muted" for="ap_materno">
                                                                Apellido Materno
                                                            </label>
                                                            <input class="form-control" id="ap_materno" name="ap_materno" type="text" value={{$Empleado->ap_materno}}>
                                                                
                                                            </input>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label text-muted" for="fecha_alta">
                                                                Fecha de Alta : 
                                                            </label>
                                                            <label class="control-label text-muted" for="fecha_alta">
                                                                {{Date::parse($Empleado->fecha_alta)->format('l j \d\e F \d\e Y')}}
                                                            </label>
                                                            <input class="form-control" id="fecha_alta" name="fecha_alta" type="date" value={{$Empleado->fecha_alta}}>
                                                            </input>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label text-muted" for="RFC">
                                                                RFC
                                                            </label>
                                                            <input class="form-control" id="RFC" name="RFC" type="text" value={{$Empleado->RFC}}>
                                                                
                                                            </input>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label text-muted" for="telefono">
                                                                Telefono
                                                            </label>
                                                            <input class="form-control" id="telefono" name="telefono" type="text" value={{$Empleado->telefono}}>
                                                                
                                                            </input>

                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label text-muted" for="genero">
                                                                Genero
                                                            </label>
                                                            <select class="form-control" id="genero" name="genero">
                                                                <option value="Hombre">
                                                                    Hombre
                                                                </option>
                                                                <option value="Mujer">
                                                                    Mujer
                                                                </option>
                                                            </select>

                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label text-muted" for="correo">
                                                                Correo
                                                            </label>
                                                            <input class="form-control" id="correo" name="correo" type="text" value={{$Empleado->correo}}>
                                                                
                                                            </input>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label text-muted" for="puesto">
                                                                Puesto
                                                            </label>
                                                            <input class="form-control" id="puesto" name="puesto" type="text" value={{$Empleado->puesto}}>
                                                                
                                                            </input>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label text-muted" for="Tcontrato">
                                                                Tipo de Contrato
                                                            </label>
                                                            <select class="form-control" id="Tcontrato" name="Tcontrato">
                                                                <option value="confianza">
                                                                    Personal de Confianza
                                                                </option>
                                                                <option value="base">
                                                                    Personal de base
                                                                </option>
                                                            </select>
                                                        </div>

                                                    </div>

                                                    {{-- Edicion de archivos personales --}}

                                                    <div class="form-group text-muted">
                                                        <h3>
                                                            Documentos Personales
                                                        </h3>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="text-dark">
                                                            <label class="control-label text-muted" for="contrato">
                                                                Contrato
                                                            </label>
                                                            <input accept="application/pdf, .doc, .docx, .odf" name="contrato" type="file">
                                                                <label for="contrato">
                                                                </label>
                                                            </input>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="text-dark">
                                                            <label class="control-label text-muted" for="creden_elect">
                                                                Credencial de Elector
                                                            </label>
                                                            <input accept="application/pdf, .doc, .docx, .odf" name="creden_elect" type="file">
                                                                <label for="creden_elect">
                                                                </label>
                                                            </input>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="text-dark">
                                                            <label class="control-label text-muted" for="acta_nac">
                                                                Acta de nacimiento
                                                            </label>
                                                            <input accept="application/pdf, .doc, .docx, .odf" name="acta_nac" type="file">
                                                                <label for="acta_nac">
                                                                </label>
                                                            </input>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="text-dark">
                                                            <label class="control-label text-muted" for="curriculum">
                                                                Curriculum
                                                            </label>
                                                            <input accept="application/pdf, .doc, .docx, .odf" name="curriculum" type="file">
                                                                <label for="curriculum">
                                                                </label>
                                                            </input>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="text-dark">
                                                            <label class="control-label text-muted" for="solicitud">
                                                                Solicitud de Empleo
                                                            </label>
                                                            <input accept="application/pdf, .doc, .docx, .odf" name="solicitud" type="file">
                                                                <label for="solicitud">
                                                                </label>
                                                            </input>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="text-dark">
                                                            <label class="control-label text-muted" for="cert_medico">
                                                                Certificado Medico
                                                            </label>
                                                            <input accept="application/pdf, .doc, .docx, .odf" name="cert_medico" type="file">
                                                                <label for="cert_medico">
                                                                </label>
                                                            </input>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="text-dark">
                                                            <label class="control-label text-muted" for="cart_recomend">
                                                                Carta de Recomendacion
                                                            </label>
                                                            <input accept="application/pdf, .doc, .docx, .odf" name="cart_recomend" type="file">
                                                                <label for="cart_recomend">
                                                                </label>
                                                            </input>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="text-dark">
                                                            <label class="control-label text-muted" for="fotografia">
                                                                Fotografia
                                                            </label>
                                                            <input accept="application/pdf, .doc, .docx, .odf" name="fotografia" type="file">
                                                                <label for="fotografia">
                                                                </label>
                                                            </input>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="text-dark">
                                                            <label class="control-label text-muted" for="const_Noinhab">
                                                                Constancia de No Inhabilitacion
                                                            </label>
                                                            <input accept="application/pdf, .doc, .docx, .odf" name="const_Noinhab" type="file">
                                                                <label for="const_Noinhab">
                                                                </label>
                                                            </input>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="text-dark">
                                                            <label class="control-label text-muted" for="comp_Dom">
                                                                Comprobante de Domicilio
                                                            </label>
                                                            <input accept="application/pdf, .doc, .docx, .odf" name="comp_Dom" type="file">
                                                                <label for="comp_Dom">
                                                                </label>
                                                            </input>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="text-dark">
                                                            <label class="control-label text-muted" for="licencia">
                                                                Licencia de Conducir
                                                            </label>
                                                            <input accept="application/pdf, .doc, .docx, .odf" name="licencia" type="file">
                                                                <label for="licencia">
                                                                </label>
                                                            </input>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="text-dark">
                                                            <label class="control-label text-muted" for="nss">
                                                                Numero de Seguro Social
                                                            </label>
                                                            <input accept="application/pdf, .doc, .docx, .odf" name="nss" type="file">
                                                                <label for="nss">
                                                                </label>
                                                            </input>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="text-dark">
                                                            <label class="control-label text-muted" for="infonavit">
                                                                Infonavit
                                                            </label>
                                                            <input accept="application/pdf, .doc, .docx, .odf" name="infonavit" type="file">
                                                                <label for="infonavit">
                                                                </label>
                                                            </input>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="text-dark">
                                                            <label class="control-label text-muted" for="rfc_doc">
                                                                Comprobante de RFC
                                                            </label>
                                                            <input accept="application/pdf, .doc, .docx, .odf" name="rfc_doc" type="file">
                                                                <label for="rfc_doc">
                                                                </label>
                                                            </input>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="text-dark">
                                                            <label class="control-label text-muted" for="cartilla">
                                                                Cartilla Militar Liberada
                                                            </label>
                                                            <input accept="application/pdf, .doc, .docx, .odf" name="cartilla" type="file">
                                                                <label for="cartilla">
                                                                </label>
                                                            </input>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="text-dark">
                                                            <label class="control-label text-muted" for="curp">
                                                                Comprobante de CURP
                                                            </label>
                                                            <input accept="application/pdf, .doc, .docx, .odf" name="curp" type="file">
                                                                <label for="curp">
                                                                </label>
                                                            </input>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="text-dark">
                                                            <label class="control-label text-muted" for="diploma">
                                                                Diploma de Grado de estudio
                                                            </label>
                                                            <input accept="application/pdf, .doc, .docx, .odf" name="diploma" type="file">
                                                                <label for="diploma">
                                                                </label>
                                                            </input>
                                                        </div>
                                                    </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-primary" type="submit">
                                                        Guardar
                                                    </button>
                                                </div>
                                                    </form>
                                            </div>
                                        </div>
                                </div>
                                </td>

                                {{-- Boton de Eliminar --}}
                                @if(Auth::user()->role_id==2)
                                <td>
                                    <form action="{{route ('empleado.disable',$Empleado->id)}}"  method="post">
                                        {{csrf_field()}} {{method_field('put')}}
                                    <button class="btn btn-outline-danger pull-right" type="submit">
                                        <i class="fas fa-user-times">
                                        </i>
                                    </button>
                                    </form>
                                </td>
                                @endif
                                @endif
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
            </br>
        </br>
    </div>
</div>



                                {{-- Tabla de empleados inactivos --}}


    <h1 class="text-center" style="color:#FDFCFC">
        Empleados Inactivos
    </h1>
<div class="row justify-content-center overflow-auto">
    <div class="form-group col-md-9">
                <div class="table-responsive">
                    <table class="table table-dark ">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">
                                    N° Trabajador
                                </th>
                                <th scope="col">
                                    Avatar
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
                                    RFC
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
                                @if(Auth::user()->role_id==2)
                                <th scope="col">
                                    Ingresar
                                </th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($empleados as $Empleado)
                            @if($Empleado->estatus == 'inactivo')
                            <tr>
                                <th>
                                    {{$Empleado->id}}
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
                                    {{$Empleado->RFC}}
                                </td>
                                <td>
                                    {{$Empleado->estatus}}
                                </td>


                                {{-- Boton de Ver Informacion --}}
                                <td>
                                    <a class="btn btn-success pull-right" data-target="#VerUsuario{{$Empleado->id}}" data-toggle="modal" href="#" type="submit">
                                       <i class="fas fa-user-check"></i>
                                        </i>
                                    </a>
                                    <div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="VerUsuario{{$Empleado->id}}" tabindex="-1">
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
                                                            <label class="control-label text-muted" for="fecha_alta">
                                                                Fecha de Alta
                                                            </label>
                                                            <label class="form-control" id="fecha_alta" name="fecha_alta" type="text">
                                                                {{Date::parse($Empleado->fecha_alta)->format('l j \d\e F \d\e Y')}}
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

                                {{-- Boton de Editar Informacion --}}

                                <td>
                                    <a class="btn btn-warning pull-right" data-target="#EditUsuario{{$Empleado->id}}" data-toggle="modal" href="#" type="submit">
                                       <i class="fas fa-user-edit"></i>
                                        </i>
                                    </a>
                                    <div aria-hidden="true" aria-labelledby="exampleModalLabl" class="modal fade" id="EditUsuario{{$Empleado->id}}" tabindex="-1">
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
                                                    <form action="{{route ('empleado.update',$Empleado->id)}}"  enctype="multipart/form-data" method="post">
                                                    {{csrf_field()}} {{method_field('put')}}
                                                        <div class="form-group">
                                                            <label class="control-label text-muted" for="id">
                                                                Numero de Trabajador
                                                            </label>
                                                            <input class="form-control" style="background-color: #F7F9F9" value="{{$Empleado->id}}"  id="id" name="id" type="text">
                                                            </input>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label text-muted" for="nombre">
                                                                Nombre
                                                            </label>
                                                            <input class="form-control" id="nombre" name="nombre" type="text" value={{$Empleado->nombre}}>
                                                                
                                                            </input>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label text-muted" for="ap_paterno">
                                                                Apellido Paterno
                                                            </label>
                                                            <input class="form-control" id="ap_paterno" name="ap_paterno" type="text" value={{$Empleado->ap_paterno}}>
                                                                
                                                            </input>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label text-muted" for="ap_materno">
                                                                Apellido Materno
                                                            </label>
                                                            <input class="form-control" id="ap_materno" name="ap_materno" type="text" value={{$Empleado->ap_materno}}>
                                                                
                                                            </input>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label text-muted" for="fecha_alta">
                                                                Fecha de Alta : 
                                                            </label>
                                                            <label class="control-label text-muted" for="fecha_alta">
                                                                {{Date::parse($Empleado->fecha_alta)->format('l j \d\e F \d\e Y')}}
                                                            </label>
                                                            <input class="form-control" id="fecha_alta" name="fecha_alta" type="date" value={{$Empleado->fecha_alta}}>
                                                            </input>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label text-muted" for="RFC">
                                                                RFC
                                                            </label>
                                                            <input class="form-control" id="RFC" name="RFC" type="text" value={{$Empleado->RFC}}>
                                                                
                                                            </input>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label text-muted" for="telefono">
                                                                Telefono
                                                            </label>
                                                            <input class="form-control" id="telefono" name="telefono" type="text" value={{$Empleado->telefono}}>
                                                                
                                                            </input>

                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label text-muted" for="genero">
                                                                Genero
                                                            </label>
                                                            <select class="form-control" id="genero" name="genero">
                                                                <option value="Hombre">
                                                                    Hombre
                                                                </option>
                                                                <option value="Mujer">
                                                                    Mujer
                                                                </option>
                                                            </select>

                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label text-muted" for="correo">
                                                                Correo
                                                            </label>
                                                            <input class="form-control" id="correo" name="correo" type="text" value={{$Empleado->correo}}>
                                                                
                                                            </input>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label text-muted" for="puesto">
                                                                Puesto
                                                            </label>
                                                            <input class="form-control" id="puesto" name="puesto" type="text" value={{$Empleado->puesto}}>
                                                                
                                                            </input>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label text-muted" for="Tcontrato">
                                                                Tipo de Contrato
                                                            </label>
                                                            <select class="form-control" id="Tcontrato" name="Tcontrato">
                                                                <option value="confianza">
                                                                    Personal de Confianza
                                                                </option>
                                                                <option value="base">
                                                                    Personal de base
                                                                </option>
                                                            </select>
                                                        </div>

                                                    </div>

                                                    {{-- Edicion de archivos personales --}}

                                                    <div class="form-group text-muted">
                                                        <h3>
                                                            Documentos Personales
                                                        </h3>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="text-dark">
                                                            <label class="control-label text-muted" for="contrato">
                                                                Contrato
                                                            </label>
                                                            <input accept="application/pdf, .doc, .docx, .odf" name="contrato" type="file">
                                                                <label for="contrato">
                                                                </label>
                                                            </input>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="text-dark">
                                                            <label class="control-label text-muted" for="creden_elect">
                                                                Credencial de Elector
                                                            </label>
                                                            <input accept="application/pdf, .doc, .docx, .odf" name="creden_elect" type="file">
                                                                <label for="creden_elect">
                                                                </label>
                                                            </input>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="text-dark">
                                                            <label class="control-label text-muted" for="acta_nac">
                                                                Acta de nacimiento
                                                            </label>
                                                            <input accept="application/pdf, .doc, .docx, .odf" name="acta_nac" type="file">
                                                                <label for="acta_nac">
                                                                </label>
                                                            </input>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="text-dark">
                                                            <label class="control-label text-muted" for="curriculum">
                                                                Curriculum
                                                            </label>
                                                            <input accept="application/pdf, .doc, .docx, .odf" name="curriculum" type="file">
                                                                <label for="curriculum">
                                                                </label>
                                                            </input>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="text-dark">
                                                            <label class="control-label text-muted" for="solicitud">
                                                                Solicitud de Empleo
                                                            </label>
                                                            <input accept="application/pdf, .doc, .docx, .odf" name="solicitud" type="file">
                                                                <label for="solicitud">
                                                                </label>
                                                            </input>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="text-dark">
                                                            <label class="control-label text-muted" for="cert_medico">
                                                                Certificado Medico
                                                            </label>
                                                            <input accept="application/pdf, .doc, .docx, .odf" name="cert_medico" type="file">
                                                                <label for="cert_medico">
                                                                </label>
                                                            </input>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="text-dark">
                                                            <label class="control-label text-muted" for="cart_recomend">
                                                                Carta de Recomendacion
                                                            </label>
                                                            <input accept="application/pdf, .doc, .docx, .odf" name="cart_recomend" type="file">
                                                                <label for="cart_recomend">
                                                                </label>
                                                            </input>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="text-dark">
                                                            <label class="control-label text-muted" for="fotografia">
                                                                Fotografia
                                                            </label>
                                                            <input accept="application/pdf, .doc, .docx, .odf" name="fotografia" type="file">
                                                                <label for="fotografia">
                                                                </label>
                                                            </input>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="text-dark">
                                                            <label class="control-label text-muted" for="const_Noinhab">
                                                                Constancia de No Inhabilitacion
                                                            </label>
                                                            <input accept="application/pdf, .doc, .docx, .odf" name="const_Noinhab" type="file">
                                                                <label for="const_Noinhab">
                                                                </label>
                                                            </input>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="text-dark">
                                                            <label class="control-label text-muted" for="comp_Dom">
                                                                Comprobante de Domicilio
                                                            </label>
                                                            <input accept="application/pdf, .doc, .docx, .odf" name="comp_Dom" type="file">
                                                                <label for="comp_Dom">
                                                                </label>
                                                            </input>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="text-dark">
                                                            <label class="control-label text-muted" for="licencia">
                                                                Licencia de Conducir
                                                            </label>
                                                            <input accept="application/pdf, .doc, .docx, .odf" name="licencia" type="file">
                                                                <label for="licencia">
                                                                </label>
                                                            </input>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="text-dark">
                                                            <label class="control-label text-muted" for="nss">
                                                                Numero de Seguro Social
                                                            </label>
                                                            <input accept="application/pdf, .doc, .docx, .odf" name="nss" type="file">
                                                                <label for="nss">
                                                                </label>
                                                            </input>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="text-dark">
                                                            <label class="control-label text-muted" for="infonavit">
                                                                Infonavit
                                                            </label>
                                                            <input accept="application/pdf, .doc, .docx, .odf" name="infonavit" type="file">
                                                                <label for="infonavit">
                                                                </label>
                                                            </input>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="text-dark">
                                                            <label class="control-label text-muted" for="rfc_doc">
                                                                Comprobante de RFC
                                                            </label>
                                                            <input accept="application/pdf, .doc, .docx, .odf" name="rfc_doc" type="file">
                                                                <label for="rfc_doc">
                                                                </label>
                                                            </input>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="text-dark">
                                                            <label class="control-label text-muted" for="cartilla">
                                                                Cartilla Militar Liberada
                                                            </label>
                                                            <input accept="application/pdf, .doc, .docx, .odf" name="cartilla" type="file">
                                                                <label for="cartilla">
                                                                </label>
                                                            </input>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="text-dark">
                                                            <label class="control-label text-muted" for="curp">
                                                                Comprobante de CURP
                                                            </label>
                                                            <input accept="application/pdf, .doc, .docx, .odf" name="curp" type="file">
                                                                <label for="curp">
                                                                </label>
                                                            </input>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="text-dark">
                                                            <label class="control-label text-muted" for="diploma">
                                                                Diploma de Grado de estudio
                                                            </label>
                                                            <input accept="application/pdf, .doc, .docx, .odf" name="diploma" type="file">
                                                                <label for="diploma">
                                                                </label>
                                                            </input>
                                                        </div>
                                                    </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-primary" type="submit">
                                                        Guardar
                                                    </button>
                                                </div>
                                                    </form>
                                            </div>
                                        </div>
                                </div>
                                </td>

                                {{-- Boton de Eliminar --}}
                                @if(Auth::user()->role_id==2)
                                <td>
                                    <form action="{{route ('empleado.enable',$Empleado->id)}}"  method="post">
                                        {{csrf_field()}} {{method_field('put')}}
                                    <button class="btn btn btn-info pull-right" type="submit">
                                        <i class="fas fa-user-shield"></i>
                                    </button>
                                    </form>
                                </td>
                                @endif
                                @endif
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
