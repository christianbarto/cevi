@extends('layouts.app2')
@section('content')
<div class="row justify-content-center overflow-auto">
    <div class="form-group col-md-9">
        <div class="card">
            <div class="card-header" style="color:black">
                <h1>
                   Empleados
                </h1>
            </div>
            <div class="card-body" style="background-color: #DCDCDC">
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
            <form action="{{ url('/createEmpleado')}}" method="get">
                <button class="btn btn-primary btn-sm float-left" type="submit">
                    + Agregar
                </button>
            </form>
        <br>
        <br>
        <br>
        @if(session('verifi'))
            <div class="alert alert-danger" role="alert">
                    {{session('verifi')}}
            </div>
        @endif
        <h2 class="text-center" style="color:black">
        Activos
        </h2>
                    <div class="table-responsive" style="width:100%;overflow:auto; max-height:430px;">
                        <table class="table table-dark ">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">
                                        N° de trabajador
                                    </th>
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
                                        Ver
                                    </th>
                                    <th scope="col">
                                        Editar
                                    </th>
                                    @if(Auth::user()->role_id==2)
                                    <th scope="col">
                                        Inactivar
                                    </th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($empleados as $Empleado)
                                @if($Empleado->estatus == 'activo')
                                <tr>
                                    <td>
                                        {{$Empleado->id}}
                                    </td>
                                    <td>
                                        {{$Empleado->RFC}}
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

                                    {{-- Boton de Ver Informacion --}}
                                    <td>
                                        <form action="{{ route('empleados.busqueda')}}"   method="get">
                                            <button class="btn btn-success float-left" name="id"  type="submit" value={{$Empleado->id}}>
                                                <i class="fas fa-user-check"></i>
                                            </button>
                                        </form>
                                    </td>

                                    {{-- Boton de Editar Informacion --}}

                                    <td>
                                        <a class="btn btn-warning pull-right" data-target="#EditUsuario{{$Empleado->id}}" data-toggle="modal" href="#" type="submit">
                                           <i class="fas fa-user-edit"></i>
                                            </i>
                                        </a>
                                        <div aria-hidden="true" aria-labelledby="exampleModalLabl" class="modal fade" id="EditUsuario{{$Empleado->id}}" tabindex="-1">
                                            <div class="modal-dialog ">
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
                                                    <div class="modal-body carta">
                                                        <form action="{{route ('empleado.update',$Empleado->id)}}"  enctype="multipart/form-data" method="post">
                                                        {{csrf_field()}} {{method_field('put')}}
                                                            <div class="form-group">
                                                                <center>
                                                                    <label class="control-label text-muted" for="id">
                                                                        Numero de Trabajador
                                                                    </label>
                                                                    <input style="width: 45%" class="form-control"  value="{{$Empleado->id}}" name="id" type="text" disabled>
                                                                    </input>
                                                                </center>
                                                            </div>
                                                            @if(Auth::user()->role_id==2)
                                                            <div class="form-group">
                                                                <center>
                                                                    <label class="control-label text-muted" for="nombre">
                                                                        Nombre
                                                                    </label>
                                                                    <input style="width: 45%" class="form-control" id="nombre" name="nombre" type="text" value="{{$Empleado->nombre}}" >
                                                                    </input>
                                                                </center>
                                                            </div>
                                                            <div class="form-group">
                                                                <center>
                                                                    <label class="control-label text-muted" for="ap_paterno">
                                                                        Apellido Paterno
                                                                    </label>
                                                                    <input style="width: 45%" class="form-control" id="ap_paterno" name="ap_paterno" type="text" value="{{$Empleado->ap_paterno}}">
                                                                    </input>
                                                                </center>
                                                            </div>
                                                            <div class="form-group">
                                                                <center>
                                                                    <label class="control-label text-muted" for="ap_materno">
                                                                        Apellido Materno
                                                                    </label>
                                                                    <input style="width: 45%" class="form-control" id="ap_materno" name="ap_materno" type="text" value="{{$Empleado->ap_materno}}">
                                                                    </input>
                                                                </center>
                                                            </div>
                                                            @endif
                                                            @if(Auth::user()->role_id==1)
                                                            <label class="text-danger" for="nombre">
                                                                !! Para editar el nombre ingresa como administrador !!
                                                            </label>
                                                            <div class="form-group">
                                                                <center>
                                                                    <label class="control-label text-muted" for="nombre">
                                                                        Nombre
                                                                    </label>
                                                                    <input style="width: 45%" class="form-control" id="nombre" name="nombre" type="text" value="{{$Empleado->nombre}}" disabled>
                                                                    </input>
                                                                </center>
                                                            </div>
                                                            <div class="form-group">
                                                                <center>
                                                                    <label class="control-label text-muted" for="ap_paterno">
                                                                        Apellido Paterno
                                                                    </label>
                                                                    <input style="width: 45%" class="form-control" id="ap_paterno" name="ap_paterno" type="text" value="{{$Empleado->ap_paterno}}" disabled>
                                                                    </input>
                                                                </center>
                                                            </div>
                                                            <div class="form-group">
                                                                <center>
                                                                    <label class="control-label text-muted" for="ap_materno">
                                                                        Apellido Materno
                                                                    </label>
                                                                    <input style="width: 45%" class="form-control" id="ap_materno" name="ap_materno" type="text" value="{{$Empleado->ap_materno}}" disabled>
                                                                    </input>
                                                                </center>
                                                            </div>
                                                            @endif
                                                            <div class="form-group">
                                                                <center>
                                                                    <label class="control-label text-muted" for="fecha_alta">
                                                                        Fecha de Alta : 
                                                                    </label>
                                                                    <label class="control-label text-muted" for="fecha_alta">
                                                                        {{Date::parse($Empleado->fecha_alta)->format('l j \d\e F \d\e Y')}}
                                                                    </label>
                                                                    <input style="width: 45%" class="form-control" id="fecha_alta" name="fecha_alta" type="date" value={{$Empleado->fecha_alta}}>
                                                                    </input>
                                                                </center>
                                                            </div>
                                                            <div class="form-group">
                                                                <center>
                                                                    <label class="control-label text-muted" for="Tcontrato">
                                                                        Relacion Laboral:
                                                                    </label>
                                                                    <label class="form-label text-muted">
                                                                        @if($Empleado->Tcontrato=='base')
                                                                            PERSONAL DE BASE
                                                                        @elseif($Empleado->Tcontrato=='contrato')
                                                                            PERSONAL DE CONTRATO
                                                                        @elseif($Empleado->Tcontrato=='nombremientoConfianza')
                                                                            NOMBRAMIENTO CONFIANZA
                                                                        @elseif($Empleado->Tcontrato=='mandosMedios')
                                                                            MANDOS MEDIOS
                                                                        @elseif($Empleado->Tcontrato=='contratoConfianza')
                                                                            CONTRATO CONFIANZA
                                                                        @endif                                    
                                                                    </label>
                                                                    <select onChange="prueba()" style="width: 45%" class="form-control" id="Tcontrato" name="Tcontrato">
                                                                        <option value="">
                                                                            Seleccione una opción
                                                                        </option>
                                                                        <option value="base">
                                                                            PERSONAL DE BASE
                                                                        </option>
                                                                        <option value="contrato">
                                                                            PERSONAL DE CONTRATO
                                                                        </option>
                                                                        <option value="nombremientoConfianza">
                                                                            NOMBRAMIENTO CONFIANZA
                                                                        </option>
                                                                        <option value="mandosMedios">
                                                                            MANDOS MEDIOS
                                                                        </option>
                                                                        <option value="contratoConfianza">
                                                                            CONTRATO CONFIANZA
                                                                        </option>
                                                                    </select>
                                                                </center>
                                                            </div>
                                                            <div class="form-group">
                                                                <center>
                                                                    <label class="control-label text-muted" for="fecha_nombramiento">
                                                                        Fecha de Nombramiento:
                                                                    </label>
                                                                    <label class="control-label text-muted" for="fecha_nombramiento">
                                                                        @if($Empleado->fecha_nombramiento==null)
                                                                        @else
                                                                            {{Date::parse($Empleado->fecha_nombramiento)->format('l j \d\e F \d\e Y')}}
                                                                        @endif
                                                                    </label>
                                                                    <input style="width: 45%" class="form-control" id="fecha_nombramiento" name="fecha_nombramiento" 
                                                                    type="date" value="{{$Empleado->fecha_nombramiento}}" disabled>
                                                                    </input>
                                                                </center>
                                                            </div>
                                                            <div class="form-group">
                                                                <center>
                                                                    <label class="control-label text-muted" for="RFC">
                                                                        RFC
                                                                    </label>
                                                                    <input style="text-transform:uppercase;width: 45%;" class="form-control" id="RFC" name="RFC" type="text" value="{{$Empleado->RFC}}">
                                                                    </input>
                                                                </center>
                                                            </div>
                                                            <div class="form-group">
                                                                <center>
                                                                    <label class="control-label text-muted" for="telefono">
                                                                        Telefono
                                                                    </label>
                                                                    <input style="width: 45%"class="form-control" id="telefono" name="telefono" type="text" value="{{$Empleado->telefono}}">
                                                                    </input>
                                                                </center>
                                                            </div>
                                                            <div class="form-group">
                                                                <center>
                                                                    <label class="control-label text-muted" for="genero">
                                                                        Genero: {{$Empleado->genero}}
                                                                    </label>
                                                                    <select style="width: 45%" class="form-control" id="genero" name="genero">
                                                                        <option value="">
                                                                            Seleccione una opción
                                                                        </option>
                                                                        <option value="Hombre">
                                                                            Hombre
                                                                        </option>
                                                                        <option value="Mujer">
                                                                            Mujer
                                                                        </option>
                                                                    </select>
                                                                </center>
                                                            </div>
                                                            <div class="form-group">
                                                                <center>
                                                                    <label class="control-label text-muted" for="correo">
                                                                        Correo
                                                                    </label>
                                                                    <input style="width: 45%" class="form-control" id="correo" name="correo" type="text" value="{{$Empleado->correo}}">
                                                                    </input>
                                                                </center>
                                                            </div>
                                                            <div class="form-group">
                                                                <center>
                                                                    <label class="control-label text-muted" for="puesto">
                                                                        Categoria
                                                                    </label>
                                                                    <input style="width: 45%" class="form-control" id="puesto" name="puesto" type="text" value="{{$Empleado->puesto}}">
                                                                    </input>
                                                                </center>
                                                            </div>
                                                            <div class="form-group">
                                                                <center>
                                                                    <label class="control-label text-muted" for="departamento">
                                                                        Departamento: {{$Empleado->departamento}}
                                                                    </label>
                                                                    <select style="width: 45%" class="form-control" id="departamento" name="departamento">
                                                                        <option value="">
                                                                            Seleccione una opción
                                                                        </option>
                                                                    @foreach($departamentos as $departamento)
                                                                        <option value="{{$departamento->id}} {{$departamento->descripcion}}">
                                                                            {{$departamento->id}} {{$departamento->descripcion}}
                                                                        </option>
                                                                    @endforeach
                                                                    </select>
                                                                </center>
                                                            </div>
                                                            

                                                        

                                                        {{-- Edicion de archivos personales --}}

                                                        <div class="form-group text-muted">
                                                            <h3>
                                                                Documentos Personales
                                                            </h3>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="text-dark">
                                                                @if($Empleado->contrato==null)
                                                                    <label class="control-label text-muted" for="contrato">
                                                                       ----------Ingresar Contrato----------  
                                                                    </label>
                                                                @else
                                                                    <label class="control-label text-muted" for="contrato">
                                                                       ---------Actualizar Contrato---------
                                                                    </label>
                                                                @endif
                                                                <input style="width: 71%" accept="application/pdf" name="contrato" type="file">
                                                                    <label for="contrato">
                                                                    </label>
                                                                </input>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="form-group">
                                                            <div class="text-dark">
                                                                @if($Empleado->creden_elect==null)
                                                                    <label class="control-label text-muted" for="creden_elect">
                                                                       ---Ingresar Credencial de Elector----    
                                                                    </label>
                                                                @else
                                                                    <label class="control-label text-muted" for="creden_elect">
                                                                       --Actualizar Credencial de Elector---        
                                                                    </label>
                                                                @endif
                                                                <input style="width: 71%" accept="application/pdf" name="creden_elect" type="file">
                                                                    <label for="creden_elect">
                                                                    </label>
                                                                </input>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="form-group">
                                                            <div class="text-dark">
                                                                @if($Empleado->acta_nac==null)
                                                                    <label class="control-label text-muted" for="acta_nac">
                                                                       -----Ingresar Acta de Nacimiento-----  
                                                                    </label>
                                                                @else
                                                                    <label class="control-label text-muted" for="acta_nac">
                                                                       ----Actualizar Acta de Nacimiento----
                                                                    </label>
                                                                @endif
                                                                <input style="width: 71%" accept="application/pdf" name="acta_nac" type="file">
                                                                    <label for="acta_nac">
                                                                    </label>
                                                                </input>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="form-group ">
                                                            <div class="text-dark">
                                                                @if($Empleado->curriculum==null)
                                                                    <label class="control-label text-muted" for="curriculum">
                                                                       ---------Ingresar Curriculum---------  
                                                                    </label>
                                                                @else
                                                                    <label class="control-label text-muted" for="curriculum">
                                                                       --------Actualizar Curriculum--------
                                                                    </label>
                                                                @endif
                                                                <input style="width: 71%" accept="application/pdf" name="curriculum" type="file">
                                                                    <label for="curriculum">
                                                                    </label>
                                                                </input>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="form-group ">
                                                            <div class="text-dark">
                                                                @if($Empleado->solicitud==null)
                                                                    <label class="control-label text-muted" for="solicitud">
                                                                       ----Ingresar Solicitud de Empleo-----
                                                                    </label>
                                                                @else
                                                                    <label class="control-label text-muted" for="solicitud">
                                                                       ---Actualizar Solicitud de Empleo----
                                                                    </label>
                                                                @endif
                                                                <input style="width: 71%" accept="application/pdf" name="solicitud" type="file">
                                                                    <label for="solicitud">
                                                                    </label>
                                                                </input>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="form-group ">
                                                            <div class="text-dark">
                                                                @if($Empleado->cert_medico==null)
                                                                    <label class="control-label text-muted" for="cert_medico">
                                                                       -----Ingresar Certificado Medico-----
                                                                    </label>
                                                                @else
                                                                    <label class="control-label text-muted" for="cert_medico">
                                                                       ----Actualizar Certificado Medico----
                                                                    </label>
                                                                @endif
                                                                <input style="width: 71%" accept="application/pdf" name="cert_medico" type="file">
                                                                    <label for="cert_medico">
                                                                    </label>
                                                                </input>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="form-group ">
                                                            <div class="text-dark">
                                                                @if($Empleado->cart_recomend==null)
                                                                    <label class="control-label text-muted" for="cart_recomend">
                                                                       ---Ingresar Carta de Recomendacion---  
                                                                    </label>
                                                                @else
                                                                    <label class="control-label text-muted" for="cart_recomend">
                                                                       --Actualizar Carta de Recomendacion--
                                                                    </label>
                                                                @endif
                                                                <input style="width: 71%" accept="application/pdf" name="cart_recomend" type="file">
                                                                    <label for="cart_recomend">
                                                                    </label>
                                                                </input>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="form-group">
                                                            <div class="text-dark">
                                                                @if($Empleado->fotografia==null)
                                                                    <label class="control-label text-muted" for="fotografia">
                                                                       ---------Ingresar Fotografia---------  
                                                                    </label>
                                                                @else
                                                                    <label class="control-label text-muted" for="fotografia">
                                                                       --------Actualizar Fotografia--------
                                                                    </label>
                                                                @endif
                                                                <input style="width: 71%" accept="application/pdf" name="fotografia" type="file">
                                                                    <label for="fotografia">
                                                                    </label>
                                                                </input>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="form-group ">
                                                            <div class="text-dark">
                                                                @if($Empleado->const_Noinhab==null)
                                                                    <label class="control-label text-muted" for="const_Noinhab">
                                                                       Ingresar Constancia No Inhabilitacion  
                                                                    </label>
                                                                @else
                                                                    <label class="control-label text-muted" for="const_Noinhab">
                                                                     Actualizar Constancia No Inhabilitacion
                                                                    </label>
                                                                @endif

                                                                <input style="width: 71%" accept="application/pdf" name="const_Noinhab" type="file">
                                                                    <label for="const_Noinhab">
                                                                    </label>
                                                                </input>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="form-group ">
                                                            <div class="text-dark">
                                                                @if($Empleado->comp_Dom==null)
                                                                    <label class="control-label text-muted" for="comp_Dom">
                                                                       --Ingresar Comprobante de Domicilio--  
                                                                    </label>
                                                                @else
                                                                    <label class="control-label text-muted" for="comp_Dom">
                                                                       -Actualizar Comprobante de Domicilio-
                                                                    </label>
                                                                @endif

                                                                <input style="width: 71%" accept="application/pdf" name="comp_Dom" type="file">
                                                                    <label for="comp_Dom">
                                                                    </label>
                                                                </input>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="form-group ">
                                                            <div class="text-dark">
                                                                @if($Empleado->licencia==null)
                                                                    <label class="control-label text-muted" for="licencia">
                                                                       ----Ingresar Licencia de Conducir----
                                                                    </label>
                                                                @else
                                                                    <label class="control-label text-muted" for="licencia">
                                                                       ---Actualizar Licencia de Conducir---
                                                                    </label>
                                                                @endif

                                                                <input style="width: 71%" accept="application/pdf" name="licencia" type="file">
                                                                    <label for="licencia">
                                                                    </label>
                                                                </input>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="form-group text-dark">
                                                                @if($Empleado->nss==null)
                                                                    <label class="control-label text-muted" for="nss">
                                                                       ---Ingresar Numero de Seguro Social--
                                                                    </label>
                                                                @else
                                                                    <label class="control-label text-muted" for="nss">
                                                                       --Actualizar Numero de Seguro Social--
                                                                    </label>
                                                                @endif
                                                                <input style="width: 71%" accept="application/pdf" name="nss" type="file">
                                                                    <label for="nss">
                                                                    </label>
                                                                </input>
                                                        </div>
                                                        <br>
                                                        <div class="form-group">
                                                            <div class="text-dark">
                                                                @if($Empleado->infonavit==null)
                                                                    <label class="control-label text-muted" for="infonavit">
                                                                       ---------Ingresar Infonavit----------
                                                                    </label>
                                                                @else
                                                                    <label class="control-label text-muted" for="infonavit">
                                                                       --------Actualizar Infonavit---------
                                                                    </label>
                                                                @endif
                                                                <input style="width: 71%" accept="application/pdf" name="infonavit" type="file">
                                                                    <label for="infonavit">
                                                                    </label>
                                                                </input>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="form-group">
                                                            <div class="text-dark">
                                                                @if($Empleado->rfc_doc==null)
                                                                    <label class="control-label text-muted" for="rfc_doc">
                                                                       -----Ingresar Comprobante de RFC-----
                                                                    </label>
                                                                @else
                                                                    <label class="control-label text-muted" for="rfc_doc">
                                                                       ----Actualizar Comprobante de RFC----
                                                                    </label>
                                                                @endif
                                                                <input style="width: 71%" accept="application/pdf" name="rfc_doc" type="file">
                                                                    <label for="rfc_doc">
                                                                    </label>
                                                                </input>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="form-group">
                                                            <div class="text-dark">
                                                                @if($Empleado->cartilla==null)
                                                                    <label class="control-label text-muted" for="cartilla">
                                                                       --Ingresar Cartilla Militar Liberada--
                                                                    </label>
                                                                @else
                                                                    <label class="control-label text-muted" for="cartilla">
                                                                       -Actualizar Cartilla Militar Liberada-
                                                                    </label>
                                                                @endif
                                                                <input style="width: 71%" accept="application/pdf" name="cartilla" type="file">
                                                                    <label for="cartilla">
                                                                    </label>
                                                                </input>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="form-group">
                                                            <div class="text-dark">
                                                                @if($Empleado->curp==null)
                                                                    <label class="control-label text-muted" for="curp">
                                                                       ----Ingresar Comprobante de CURP-----
                                                                    </label>
                                                                @else
                                                                    <label class="control-label text-muted" for="curp">
                                                                       ---Actualizar Comprobante de CURP----
                                                                    </label>
                                                                @endif
                                                                <input style="width: 71%" accept="application/pdf" name="curp" type="file">
                                                                    <label for="curp">
                                                                    </label>
                                                                </input>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="form-group">
                                                            <div class="text-dark">
                                                                @if($Empleado->diploma==null)
                                                                    <label class="control-label text-muted" for="diploma">
                                                                       --Ingresar Diploma Grado de Estudio--
                                                                    </label>
                                                                @else
                                                                    <label class="control-label text-muted" for="diploma">
                                                                       -Actualizar Diploma Grado de Estudio-
                                                                    </label>
                                                                @endif
                                                                <input style="width: 71%" accept="application/pdf" name="diploma" type="file">
                                                                    <label for="diploma">
                                                                    </label>
                                                                </input>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="form-group">
                                                            <div class="text-dark">
                                                                @if($Empleado->nombramiento==null)
                                                                    <label class="control-label text-muted" for="nombramiento">
                                                                       --------Ingresar Nombramiento--------  
                                                                    </label>
                                                                @else
                                                                    <label class="control-label text-muted" for="nombramiento">
                                                                       -------Actualizar Nombramiento-------
                                                                    </label>
                                                                @endif
                                                                <input style="width: 71%" accept="application/pdf" name="nombramiento" type="file">
                                                                    <label for="nombramiento">
                                                                    </label>
                                                                </input>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="form-group">
                                                            <div class="text-dark">
                                                                @if($Empleado->dictamen==null)
                                                                    <label class="control-label text-muted" for="dictamen">
                                                                       ----------Ingresar Dictamen----------  
                                                                    </label>
                                                                @else
                                                                    <label class="control-label text-muted" for="dictamen">
                                                                       ---------Actualizar Dictamen---------
                                                                    </label>
                                                                @endif
                                                                <input style="width: 71%" accept="application/pdf" name="dictamen" type="file">
                                                                    <label for="dictamen">
                                                                    </label>
                                                                </input>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="form-group">
                                                            <div class="text-dark">
                                                                <h5>
                                                                    Agrega Documento Adicional
                                                                </h5>
                                                                <input style="width: 71%" accept="application/pdf" name="adicional" type="file">
                                                                    <label for="adicional">
                                                                    </label>
                                                                </input>
                                                            </div>
                                                        </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-primary" type="submit">
                                                            Guardar
                                                        </button>
                                                        <button class="btn btn-secondary" data-dismiss="modal" type="button">Cancelar</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    </td>

                                    {{-- Boton de Eliminar --}}
                                    @if(Auth::user()->role_id==2)
                                    <td>
                                        <a class="btn btn-danger pull-right" data-target="#DeleteUsuario{{$Empleado->id}}" data-toggle="modal" href="#" type="submit">
                                           <i class="fas fa-user-times"></i>
                                            </i>
                                        </a>
                                        <div aria-hidden="true" aria-labelledby="exampleModalLabl" class="modal fade" id="DeleteUsuario{{$Empleado->id}}" tabindex="-1">
                                            <div class="modal-dialog modal-sm">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h3 class="text-center" style="color:black">
                                                            Selecciona la fecha y causa de la baja
                                                        </h3>
                                                    </div>
                                                        <div class="modal-body">
                                                            <form action="{{route ('empleado.disable',$Empleado->id)}}" method="post">
                                                                    {{csrf_field()}} {{method_field('put')}}
                                                                    <div class="form-group col-md-12">
                                                                        <label style="color:black">
                                                                            Fecha de baja
                                                                        </label>
                                                                        <input class="form-control" id="fecha_baja" name="fecha_baja" type="date" value="{{date('Y-m-d')}}">
                                                                        </input>
                                                                    </div>
                                                                    <div class="form-group col-md-12">
                                                                        <label style="color:black">
                                                                            Causa de baja
                                                                        </label>
                                                                        <textarea name="causa_baja" rows="3" cols="30" value="{{old('causa_baja')}}" required></textarea>
                                                                    </div>
                                                                <div class="modal-footer">
                                                                    <button class="btn btn-primary" type="submit">
                                                                        Guardar
                                                                    </button>
                                                                    <button class="btn btn-secondary" data-dismiss="modal" type="button">Cancelar</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
                                    {{-- Tabla de empleados inactivos --}}
        <h2 class="text-center" style="color: black">
            Inactivos
        </h2>
                    <div class="table-responsive" style="width:100%;overflow:auto; max-height:430px;">
                        <table class="table table-dark ">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">
                                        N° de Trabajador
                                    </th>
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
                                        Fecha Baja
                                    </th>
                                    <th scope="col">
                                        Causa Baja
                                    </th>
                                    <th scope="col">
                                        Ver
                                    </th>
                                    <th scope="col">
                                        Editar
                                    </th>
                                    @if(Auth::user()->role_id==2)
                                    <th scope="col">
                                        Activar
                                    </th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($empleados as $Empleado)
                                @if($Empleado->estatus == 'inactivo')
                                <tr>
                                    <td>
                                        {{$Empleado->id}}
                                    </td>
                                    <td>
                                        {{$Empleado->RFC}}
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
                                        @if($Empleado->fecha_baja==null)
                                            Sin fecha de baja
                                        @else
                                        {{Date::parse($Empleado->fecha_baja)->format('j \d\e F \d\e Y')}}
                                        @endif
                                    </td>
                                    <td>
                                        @if($Empleado->causa_baja==null)
                                            Sin causa de baja
                                        @else
                                        {{$Empleado->causa_baja}}
                                        @endif
                                    </td>
                                    {{-- Boton de Ver Informacion --}}
                                    <td>
                                        <form action="{{ route('empleados.busqueda')}}"   method="get">
                                            <button class="btn btn-success float-left" name="id"  type="submit" value={{$Empleado->id}}>
                                                <i class="fas fa-user-check"></i>
                                            </button>
                                        </form>
                                    </td>

                                    {{-- Boton de Editar Informacion --}}

                                    <td>
                                        <a class="btn btn-warning pull-right" data-target="#EditUsuario{{$Empleado->id}}" data-toggle="modal" href="#" type="submit">
                                           <i class="fas fa-user-edit"></i>
                                            </i>
                                        </a>
                                        <div aria-hidden="true" aria-labelledby="exampleModalLabl" class="modal fade" id="EditUsuario{{$Empleado->id}}" tabindex="-1">
                                            <div class="modal-dialog ">
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
                                                    <div class="modal-body carta">
                                                        <form action="{{route ('empleado.update',$Empleado->id)}}"  enctype="multipart/form-data" method="post">
                                                        {{csrf_field()}} {{method_field('put')}}
                                                            <div class="form-group">
                                                                <center>
                                                                    <label class="control-label text-muted" for="id">
                                                                        Numero de Trabajador
                                                                    </label>
                                                                    <input style="width: 45%" class="form-control"  value="{{$Empleado->id}}" name="id" type="text" disabled>
                                                                    </input>
                                                                </center>
                                                            </div>
                                                            @if(Auth::user()->role_id==2)
                                                            <div class="form-group">
                                                                <center>
                                                                    <label class="control-label text-muted" for="nombre">
                                                                        Nombre
                                                                    </label>
                                                                    <input style="width: 45%" class="form-control" id="nombre" name="nombre" type="text" value="{{$Empleado->nombre}}" >
                                                                    </input>
                                                                </center>
                                                            </div>
                                                            <div class="form-group">
                                                                <center>
                                                                    <label class="control-label text-muted" for="ap_paterno">
                                                                        Apellido Paterno
                                                                    </label>
                                                                    <input style="width: 45%" class="form-control" id="ap_paterno" name="ap_paterno" type="text" value="{{$Empleado->ap_paterno}}">
                                                                    </input>
                                                                </center>
                                                            </div>
                                                            <div class="form-group">
                                                                <center>
                                                                    <label class="control-label text-muted" for="ap_materno">
                                                                        Apellido Materno
                                                                    </label>
                                                                    <input style="width: 45%" class="form-control" id="ap_materno" name="ap_materno" type="text" value="{{$Empleado->ap_materno}}">
                                                                    </input>
                                                                </center>
                                                            </div>
                                                            @endif
                                                            @if(Auth::user()->role_id==1)
                                                            <label class="text-danger" for="nombre">
                                                                !! Para editar el nombre ingresa como administrador !!
                                                            </label>
                                                            <div class="form-group">
                                                                <center>
                                                                    <label class="control-label text-muted" for="nombre">
                                                                        Nombre
                                                                    </label>
                                                                    <input style="width: 45%" class="form-control" id="nombre" name="nombre" type="text" value="{{$Empleado->nombre}}" disabled>
                                                                    </input>
                                                                </center>
                                                            </div>
                                                            <div class="form-group">
                                                                <center>
                                                                    <label class="control-label text-muted" for="ap_paterno">
                                                                        Apellido Paterno
                                                                    </label>
                                                                    <input style="width: 45%" class="form-control" id="ap_paterno" name="ap_paterno" type="text" value="{{$Empleado->ap_paterno}}" disabled>
                                                                    </input>
                                                                </center>
                                                            </div>
                                                            <div class="form-group">
                                                                <center>
                                                                    <label class="control-label text-muted" for="ap_materno">
                                                                        Apellido Materno
                                                                    </label>
                                                                    <input style="width: 45%" class="form-control" id="ap_materno" name="ap_materno" type="text" value="{{$Empleado->ap_materno}}" disabled>
                                                                    </input>
                                                                </center>
                                                            </div>
                                                            @endif
                                                            <div class="form-group">
                                                                <center>
                                                                    <label class="control-label text-muted" for="fecha_alta">
                                                                        Fecha de Alta : 
                                                                    </label>
                                                                    <label class="control-label text-muted" for="fecha_alta">
                                                                        {{Date::parse($Empleado->fecha_alta)->format('l j \d\e F \d\e Y')}}
                                                                    </label>
                                                                    <input style="width: 45%" class="form-control" id="fecha_alta" name="fecha_alta" type="date" value={{$Empleado->fecha_alta}}>
                                                                    </input>
                                                                </center>
                                                            </div>
                                                            <div class="form-group">
                                                                <center>
                                                                    <label class="control-label text-muted" for="Tcontrato">
                                                                        Relacion Laboral:
                                                                    </label>
                                                                    <label class="form-label text-muted">
                                                                        @if($Empleado->Tcontrato=='base')
                                                                            PERSONAL DE BASE
                                                                        @elseif($Empleado->Tcontrato=='contrato')
                                                                            PERSONAL DE CONTRATO
                                                                        @elseif($Empleado->Tcontrato=='nombremientoConfianza')
                                                                            NOMBRAMIENTO CONFIANZA
                                                                        @elseif($Empleado->Tcontrato=='mandosMedios')
                                                                            MANDOS MEDIOS
                                                                        @elseif($Empleado->Tcontrato=='contratoConfianza')
                                                                            CONTRATO CONFIANZA
                                                                        @endif                                    
                                                                    </label>
                                                                    <select onChange="prueba()" style="width: 45%" class="form-control" id="Tcontrato" name="Tcontrato">
                                                                        <option value="">
                                                                            Seleccione una opción
                                                                        </option>
                                                                        <option value="base">
                                                                            PERSONAL DE BASE
                                                                        </option>
                                                                        <option value="contrato">
                                                                            PERSONAL DE CONTRATO
                                                                        </option>
                                                                        <option value="nombremientoConfianza">
                                                                            NOMBRAMIENTO CONFIANZA
                                                                        </option>
                                                                        <option value="mandosMedios">
                                                                            MANDOS MEDIOS
                                                                        </option>
                                                                        <option value="contratoConfianza">
                                                                            CONTRATO CONFIANZA
                                                                        </option>
                                                                    </select>
                                                                </center>
                                                            </div>
                                                            <div class="form-group">
                                                                <center>
                                                                    <label class="control-label text-muted" for="fecha_nombramiento">
                                                                        Fecha de Nombramiento:
                                                                    </label>
                                                                    <label class="control-label text-muted" for="fecha_nombramiento">
                                                                        @if($Empleado->fecha_nombramiento==null)
                                                                        @else
                                                                            {{Date::parse($Empleado->fecha_nombramiento)->format('l j \d\e F \d\e Y')}}
                                                                        @endif
                                                                    </label>
                                                                    <input style="width: 45%" class="form-control" id="fecha_nombramiento" name="fecha_nombramiento" type="date" value="{{$Empleado->fecha_nombramiento}}" disabled>
                                                                    </input>
                                                                </center>
                                                            </div>
                                                            <div class="form-group">
                                                                <center>
                                                                    <label class="control-label text-muted" for="RFC">
                                                                        RFC
                                                                    </label>
                                                                    <input style="text-transform:uppercase;width: 45%;" class="form-control" id="RFC" name="RFC" type="text" value="{{$Empleado->RFC}}">
                                                                    </input>
                                                                </center>
                                                            </div>
                                                            <div class="form-group">
                                                                <center>
                                                                    <label class="control-label text-muted" for="telefono">
                                                                        Telefono
                                                                    </label>
                                                                    <input style="width: 45%"class="form-control" id="telefono" name="telefono" type="text" value="{{$Empleado->telefono}}">
                                                                    </input>
                                                                </center>
                                                            </div>
                                                            <div class="form-group">
                                                                <center>
                                                                    <label class="control-label text-muted" for="genero">
                                                                        Genero: {{$Empleado->genero}}
                                                                    </label>
                                                                    <select style="width: 45%" class="form-control" id="genero" name="genero">
                                                                        <option value="">
                                                                            Seleccione una opción
                                                                        </option>
                                                                        <option value="Hombre">
                                                                            Hombre
                                                                        </option>
                                                                        <option value="Mujer">
                                                                            Mujer
                                                                        </option>
                                                                    </select>
                                                                </center>
                                                            </div>
                                                            <div class="form-group">
                                                                <center>
                                                                    <label class="control-label text-muted" for="correo">
                                                                        Correo
                                                                    </label>
                                                                    <input style="width: 45%" class="form-control" id="correo" name="correo" type="text" value="{{$Empleado->correo}}">
                                                                    </input>
                                                                </center>
                                                            </div>
                                                            <div class="form-group">
                                                                <center>
                                                                    <label class="control-label text-muted" for="puesto">
                                                                        Categoria
                                                                    </label>
                                                                    <input style="width: 45%" class="form-control" id="puesto" name="puesto" type="text" value="{{$Empleado->puesto}}">
                                                                    </input>
                                                                </center>
                                                            </div>
                                                            <div class="form-group">
                                                                <center>
                                                                    <label class="control-label text-muted" for="departamento">
                                                                        Departamento: {{$Empleado->departamento}}
                                                                    </label>
                                                                    <select style="width: 45%" class="form-control" id="departamento" name="departamento">
                                                                        <option value="">
                                                                            Seleccione una opción
                                                                        </option>
                                                                    @foreach($departamentos as $departamento)
                                                                        <option value="{{$departamento->id}} {{$departamento->descripcion}}">
                                                                            {{$departamento->id}} {{$departamento->descripcion}}
                                                                        </option>
                                                                    @endforeach
                                                                    </select>
                                                                </center>
                                                            </div>
                                                            

                                                        

                                                        {{-- Edicion de archivos personales --}}

                                                        <div class="form-group text-muted">
                                                            <h3>
                                                                Documentos Personales
                                                            </h3>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="text-dark">
                                                                @if($Empleado->contrato==null)
                                                                    <label class="control-label text-muted" for="contrato">
                                                                       ----------Ingresar Contrato----------  
                                                                    </label>
                                                                @else
                                                                    <label class="control-label text-muted" for="contrato">
                                                                       ---------Actualizar Contrato---------
                                                                    </label>
                                                                @endif
                                                                <input style="width: 71%" accept="application/pdf" name="contrato" type="file">
                                                                    <label for="contrato">
                                                                    </label>
                                                                </input>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="form-group">
                                                            <div class="text-dark">
                                                                @if($Empleado->creden_elect==null)
                                                                    <label class="control-label text-muted" for="creden_elect">
                                                                       ---Ingresar Credencial de Elector----    
                                                                    </label>
                                                                @else
                                                                    <label class="control-label text-muted" for="creden_elect">
                                                                       --Actualizar Credencial de Elector---        
                                                                    </label>
                                                                @endif
                                                                <input style="width: 71%" accept="application/pdf" name="creden_elect" type="file">
                                                                    <label for="creden_elect">
                                                                    </label>
                                                                </input>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="form-group">
                                                            <div class="text-dark">
                                                                @if($Empleado->acta_nac==null)
                                                                    <label class="control-label text-muted" for="acta_nac">
                                                                       -----Ingresar Acta de Nacimiento-----  
                                                                    </label>
                                                                @else
                                                                    <label class="control-label text-muted" for="acta_nac">
                                                                       ----Actualizar Acta de Nacimiento----
                                                                    </label>
                                                                @endif
                                                                <input style="width: 71%" accept="application/pdf" name="acta_nac" type="file">
                                                                    <label for="acta_nac">
                                                                    </label>
                                                                </input>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="form-group ">
                                                            <div class="text-dark">
                                                                @if($Empleado->curriculum==null)
                                                                    <label class="control-label text-muted" for="curriculum">
                                                                       ---------Ingresar Curriculum---------  
                                                                    </label>
                                                                @else
                                                                    <label class="control-label text-muted" for="curriculum">
                                                                       --------Actualizar Curriculum--------
                                                                    </label>
                                                                @endif
                                                                <input style="width: 71%" accept="application/pdf" name="curriculum" type="file">
                                                                    <label for="curriculum">
                                                                    </label>
                                                                </input>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="form-group ">
                                                            <div class="text-dark">
                                                                @if($Empleado->solicitud==null)
                                                                    <label class="control-label text-muted" for="solicitud">
                                                                       ----Ingresar Solicitud de Empleo-----
                                                                    </label>
                                                                @else
                                                                    <label class="control-label text-muted" for="solicitud">
                                                                       ---Actualizar Solicitud de Empleo----
                                                                    </label>
                                                                @endif
                                                                <input style="width: 71%" accept="application/pdf" name="solicitud" type="file">
                                                                    <label for="solicitud">
                                                                    </label>
                                                                </input>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="form-group ">
                                                            <div class="text-dark">
                                                                @if($Empleado->cert_medico==null)
                                                                    <label class="control-label text-muted" for="cert_medico">
                                                                       -----Ingresar Certificado Medico-----
                                                                    </label>
                                                                @else
                                                                    <label class="control-label text-muted" for="cert_medico">
                                                                       ----Actualizar Certificado Medico----
                                                                    </label>
                                                                @endif
                                                                <input style="width: 71%" accept="application/pdf" name="cert_medico" type="file">
                                                                    <label for="cert_medico">
                                                                    </label>
                                                                </input>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="form-group ">
                                                            <div class="text-dark">
                                                                @if($Empleado->cart_recomend==null)
                                                                    <label class="control-label text-muted" for="cart_recomend">
                                                                       ---Ingresar Carta de Recomendacion---  
                                                                    </label>
                                                                @else
                                                                    <label class="control-label text-muted" for="cart_recomend">
                                                                       --Actualizar Carta de Recomendacion--
                                                                    </label>
                                                                @endif
                                                                <input style="width: 71%" accept="application/pdf" name="cart_recomend" type="file">
                                                                    <label for="cart_recomend">
                                                                    </label>
                                                                </input>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="form-group">
                                                            <div class="text-dark">
                                                                @if($Empleado->fotografia==null)
                                                                    <label class="control-label text-muted" for="fotografia">
                                                                       ---------Ingresar Fotografia---------  
                                                                    </label>
                                                                @else
                                                                    <label class="control-label text-muted" for="fotografia">
                                                                       --------Actualizar Fotografia--------
                                                                    </label>
                                                                @endif
                                                                <input style="width: 71%" accept="application/pdf" name="fotografia" type="file">
                                                                    <label for="fotografia">
                                                                    </label>
                                                                </input>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="form-group ">
                                                            <div class="text-dark">
                                                                @if($Empleado->const_Noinhab==null)
                                                                    <label class="control-label text-muted" for="const_Noinhab">
                                                                       Ingresar Constancia No Inhabilitacion  
                                                                    </label>
                                                                @else
                                                                    <label class="control-label text-muted" for="const_Noinhab">
                                                                     Actualizar Constancia No Inhabilitacion
                                                                    </label>
                                                                @endif

                                                                <input style="width: 71%" accept="application/pdf" name="const_Noinhab" type="file">
                                                                    <label for="const_Noinhab">
                                                                    </label>
                                                                </input>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="form-group ">
                                                            <div class="text-dark">
                                                                @if($Empleado->comp_Dom==null)
                                                                    <label class="control-label text-muted" for="comp_Dom">
                                                                       --Ingresar Comprobante de Domicilio--  
                                                                    </label>
                                                                @else
                                                                    <label class="control-label text-muted" for="comp_Dom">
                                                                       -Actualizar Comprobante de Domicilio-
                                                                    </label>
                                                                @endif

                                                                <input style="width: 71%" accept="application/pdf" name="comp_Dom" type="file">
                                                                    <label for="comp_Dom">
                                                                    </label>
                                                                </input>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="form-group ">
                                                            <div class="text-dark">
                                                                @if($Empleado->licencia==null)
                                                                    <label class="control-label text-muted" for="licencia">
                                                                       ----Ingresar Licencia de Conducir----
                                                                    </label>
                                                                @else
                                                                    <label class="control-label text-muted" for="licencia">
                                                                       ---Actualizar Licencia de Conducir---
                                                                    </label>
                                                                @endif

                                                                <input style="width: 71%" accept="application/pdf" name="licencia" type="file">
                                                                    <label for="licencia">
                                                                    </label>
                                                                </input>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="form-group text-dark">
                                                                @if($Empleado->nss==null)
                                                                    <label class="control-label text-muted" for="nss">
                                                                       ---Ingresar Numero de Seguro Social--
                                                                    </label>
                                                                @else
                                                                    <label class="control-label text-muted" for="nss">
                                                                       --Actualizar Numero de Seguro Social--
                                                                    </label>
                                                                @endif
                                                                <input style="width: 71%" accept="application/pdf" name="nss" type="file">
                                                                    <label for="nss">
                                                                    </label>
                                                                </input>
                                                        </div>
                                                        <br>
                                                        <div class="form-group">
                                                            <div class="text-dark">
                                                                @if($Empleado->infonavit==null)
                                                                    <label class="control-label text-muted" for="infonavit">
                                                                       ---------Ingresar Infonavit----------
                                                                    </label>
                                                                @else
                                                                    <label class="control-label text-muted" for="infonavit">
                                                                       --------Actualizar Infonavit---------
                                                                    </label>
                                                                @endif
                                                                <input style="width: 71%" accept="application/pdf" name="infonavit" type="file">
                                                                    <label for="infonavit">
                                                                    </label>
                                                                </input>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="form-group">
                                                            <div class="text-dark">
                                                                @if($Empleado->rfc_doc==null)
                                                                    <label class="control-label text-muted" for="rfc_doc">
                                                                       -----Ingresar Comprobante de RFC-----
                                                                    </label>
                                                                @else
                                                                    <label class="control-label text-muted" for="rfc_doc">
                                                                       ----Actualizar Comprobante de RFC----
                                                                    </label>
                                                                @endif
                                                                <input style="width: 71%" accept="application/pdf" name="rfc_doc" type="file">
                                                                    <label for="rfc_doc">
                                                                    </label>
                                                                </input>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="form-group">
                                                            <div class="text-dark">
                                                                @if($Empleado->cartilla==null)
                                                                    <label class="control-label text-muted" for="cartilla">
                                                                       --Ingresar Cartilla Militar Liberada--
                                                                    </label>
                                                                @else
                                                                    <label class="control-label text-muted" for="cartilla">
                                                                       -Actualizar Cartilla Militar Liberada-
                                                                    </label>
                                                                @endif
                                                                <input style="width: 71%" accept="application/pdf" name="cartilla" type="file">
                                                                    <label for="cartilla">
                                                                    </label>
                                                                </input>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="form-group">
                                                            <div class="text-dark">
                                                                @if($Empleado->curp==null)
                                                                    <label class="control-label text-muted" for="curp">
                                                                       ----Ingresar Comprobante de CURP-----
                                                                    </label>
                                                                @else
                                                                    <label class="control-label text-muted" for="curp">
                                                                       ---Actualizar Comprobante de CURP----
                                                                    </label>
                                                                @endif
                                                                <input style="width: 71%" accept="application/pdf" name="curp" type="file">
                                                                    <label for="curp">
                                                                    </label>
                                                                </input>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="form-group">
                                                            <div class="text-dark">
                                                                @if($Empleado->diploma==null)
                                                                    <label class="control-label text-muted" for="diploma">
                                                                       --Ingresar Diploma Grado de Estudio--
                                                                    </label>
                                                                @else
                                                                    <label class="control-label text-muted" for="diploma">
                                                                       -Actualizar Diploma Grado de Estudio-
                                                                    </label>
                                                                @endif
                                                                <input style="width: 71%" accept="application/pdf" name="diploma" type="file">
                                                                    <label for="diploma">
                                                                    </label>
                                                                </input>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="form-group">
                                                            <div class="text-dark">
                                                                @if($Empleado->nombramiento==null)
                                                                    <label class="control-label text-muted" for="nombramiento">
                                                                       --------Ingresar Nombramiento--------  
                                                                    </label>
                                                                @else
                                                                    <label class="control-label text-muted" for="nombramiento">
                                                                       -------Actualizar Nombramiento-------
                                                                    </label>
                                                                @endif
                                                                <input style="width: 71%" accept="application/pdf" name="nombramiento" type="file">
                                                                    <label for="nombramiento">
                                                                    </label>
                                                                </input>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="form-group">
                                                            <div class="text-dark">
                                                                @if($Empleado->dictamen==null)
                                                                    <label class="control-label text-muted" for="dictamen">
                                                                       ----------Ingresar Dictamen----------  
                                                                    </label>
                                                                @else
                                                                    <label class="control-label text-muted" for="dictamen">
                                                                       ---------Actualizar Dictamen---------
                                                                    </label>
                                                                @endif
                                                                <input style="width: 71%" accept="application/pdf" name="dictamen" type="file">
                                                                    <label for="dictamen">
                                                                    </label>
                                                                </input>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="form-group">
                                                            <div class="text-dark">
                                                                <h5>
                                                                    Agrega Documento Adicional
                                                                </h5>
                                                                <input style="width: 71%" accept="application/pdf" name="adicional" type="file">
                                                                    <label for="adicional">
                                                                    </label>
                                                                </input>
                                                            </div>
                                                        </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-primary" type="submit">
                                                            Guardar
                                                        </button>
                                                        <button class="btn btn-secondary" data-dismiss="modal" type="button">Cancelar</button>
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
