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
                    <form action="{{route ('empleado.update',$empleados->id)}}"  enctype="multipart/form-data" method="post">
                                                        {{csrf_field()}} {{method_field('put')}}
                        <div class="form-group col-md-5  text-muted ">
                            <h2>
                                Editar Datos
                            </h2>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label class="control-label text-muted" for="id">
                                    Numero de Trabajador
                                </label>
                                <input class="form-control"  value="{{$empleados->id}}" name="id" type="text" disabled>
                                </input>
                            </div>
                                @if(Auth::user()->role_id==2)
                                    <div class="form-group col-md-3">
                                        <label class="control-label text-muted" for="nombre">
                                            Nombre
                                        </label>
                                        <input class="form-control" id="nombre" name="nombre" type="text" value="{{$empleados->nombre}}">
                                        </input>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="control-label text-muted" for="ap_paterno">
                                            Apellido Paterno
                                        </label>
                                        <input class="form-control" id="ap_paterno" name="ap_paterno" type="text" value="{{$empleados->ap_paterno}}">
                                        </input>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="control-label text-muted" for="ap_materno">
                                            Apellido Materno
                                        </label>
                                        <input class="form-control" id="ap_materno" name="ap_materno" type="text" value="{{$empleados->ap_materno}}">
                                        </input>
                                    </div>
                                @endif
                                @if(Auth::user()->role_id==1)
                                    <div class="form-group col-md-3">
                                        <label class="control-label text-muted" for="nombre">
                                            Nombre
                                        </label>
                                        <input disabled class="form-control" id="nombre" name="nombre" type="text" value="{{$empleados->nombre}}">
                                        </input>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="control-label text-muted" for="ap_paterno">
                                            Apellido Paterno
                                        </label>
                                        <input disabled class="form-control" id="ap_paterno" name="ap_paterno" type="text" value="{{$empleados->ap_paterno}}">
                                        </input>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="control-label text-muted" for="ap_materno">
                                            Apellido Materno
                                        </label>
                                        <input disabled class="form-control" id="ap_materno" name="ap_materno" type="text" value="{{$empleados->ap_materno}}">
                                        </input>
                                    </div>
                                @endif
                            <div class="form-group col-md-3">
                                <label class="control-label text-muted" for="fecha_alta">
                                    Alta : 
                                </label>
                                <label class="control-label text-muted" for="fecha_alta">
                                    {{Date::parse($empleados->fecha_alta)->format('j \d\e F \d\e Y')}}
                                </label>
                                <input class="form-control" id="fecha_alta" name="fecha_alta" type="date" min="1980-01-01" value={{$empleados->fecha_alta}}  max={{now()}}>
                                </input>
                            </div>
                            <div class="form-group col-md-3">
                                <label class="control-label text-muted" for="Tcontrato">
                                    Relacion Laboral:
                                </label>
                                <label class="form-label text-muted">
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
                                <select onChange="prueba()" class="form-control" id="Tcontrato" name="Tcontrato">
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
                            </div>
                            <div class="form-group col-md-3">
                                <label class="control-label text-muted" >
                                    Nombramiento:
                                </label>
                                    <label class="control-label text-muted">                                                                        
                                        @if($empleados->fecha_nombramiento==null)
                                        @else
                                            {{Date::parse($empleados->fecha_nombramiento)->format('j \d\e F \d\e Y')}}
                                        @endif
                                    </label>
                                    <input  disabled class="form-control" id="fecha_nombramiento" name="fecha_nombramiento" type="date" min="1980-01-01" max={{now()}} value={{$empleados->fecha_nombramiento}}>
                                    </input>
                            </div>
                            <div class="form-group col-md-3">
                                <label class="control-label text-muted" for="RFC">
                                    RFC
                                </label>
                                <input style="text-transform:uppercase;" class="form-control" id="RFC" name="RFC" type="text" value="{{$empleados->RFC}}" maxlength="13">
                                </input>
                            </div>
                            <div class="form-group col-md-3">
                                <label class="control-label text-muted" for="telefono">
                                    Telefono
                                </label>
                                <input class="form-control" id="telefono" name="telefono" type="number" value="{{$empleados->telefono}}" min="0" max="9999999999">
                                </input>
                            </div>
                            <div class="form-group col-md-3">
                                <label class="control-label text-muted" for="genero">
                                    Genero: {{$empleados->genero}}
                                </label>
                                <select class="form-control" id="genero" name="genero">
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
                            </div>
                            <div class="form-group col-md-3">
                                <label class="control-label text-muted" for="correo">
                                    Correo
                                </label>
                                <input class="form-control" id="correo" name="correo" type="text" value="{{$empleados->correo}}">
                                </input>
                                </div>
                            <div class="form-group col-md-3">
                                <label class="control-label text-muted" for="puesto">
                                    Categoria: {{$empleados->puesto}}
                                </label>
                                <select class="form-control" id="puesto" name="puesto" value="{{$empleados->puesto}}">
                                    <option value="">Seleccione una opción</option>                                   @foreach($categorias as $categoria)
                                        <option value="{{$categoria->descripcion}}">
                                            {{$categoria->identificador}}---{{$categoria->descripcion}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label class="control-label text-muted" for="departamento">
                                    Departamento: {{$empleados->departamento}}
                                </label>
                                <select class="form-control" id="departamento" name="departamento">
                                    <option value="">
                                            Seleccione una opción
                                    </option>
                                    @foreach($departamentos as $departamento)
                                        <option value="{{$departamento->descripcion}}">
                                            {{$departamento->id}} {{$departamento->descripcion}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-md-5  text-muted ">
                            <h2>
                                Editar Documentos 
                            </h2>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <div class="text-dark">
                                    @if($empleados->contrato==null)
                                        <label class="control-label text-muted" for="contrato">
                                        Ingresar Contrato  
                                        </label>
                                    @else
                                        <label class="control-label text-muted" for="contrato">
                                        Actualizar Contrato
                                        </label>
                                    @endif
                                    <input style="width: 92%" accept="application/pdf" name="contrato" type="file">
                                        <label for="contrato">
                                        </label>
                                    </input>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <div class="text-dark">
                                    @if($empleados->creden_elect==null)
                                        <label class="control-label text-muted" for="creden_elect">
                                        Ingresar Credencial de Elector    
                                        </label>
                                    @else
                                        <label class="control-label text-muted" for="creden_elect">
                                        Actualizar Credencial de Elector        
                                        </label>
                                    @endif
                                    <input style="width: 92%" accept="application/pdf" name="creden_elect" type="file">
                                    <label for="creden_elect">
                                    </label>
                                    </input>
                                    </div>
                                </div>
                            <div class="form-group col-md-4">
                                <div class="text-dark">
                                    @if($empleados->acta_nac==null)
                                        <label class="control-label text-muted" for="acta_nac">
                                        Ingresar Acta de Nacimiento 
                                        </label>
                                    @else
                                        <label class="control-label text-muted" for="acta_nac">
                                        Actualizar Acta de Nacimiento
                                        </label>
                                    @endif
                                    <input style="width: 92%" accept="application/pdf" name="acta_nac" type="file">
                                    <label for="acta_nac">
                                    </label>
                                    </input>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <div class="text-dark">
                                    @if($empleados->curriculum==null)
                                        <label class="control-label text-muted" for="curriculum">
                                            Ingresar Curriculum
                                        </label>
                                    @else
                                        <label class="control-label text-muted" for="curriculum">
                                            Actualizar Curriculum
                                        </label>
                                    @endif
                                    <input style="width: 92%" accept="application/pdf" name="curriculum" type="file">
                                    <label for="curriculum">
                                    </label>
                                    </input>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                                            <div class="text-dark">
                                                                @if($empleados->solicitud==null)
                                                                    <label class="control-label text-muted" for="solicitud">
                                                                       ----Ingresar Solicitud de Empleo-----
                                                                    </label>
                                                                @else
                                                                    <label class="control-label text-muted" for="solicitud">
                                                                       ---Actualizar Solicitud de Empleo----
                                                                    </label>
                                                                @endif
                                                                <input style="width: 92%" accept="application/pdf" name="solicitud" type="file">
                                                                    <label for="solicitud">
                                                                    </label>
                                                                </input>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="form-group col-md-4">
                                                            <div class="text-dark">
                                                                @if($empleados->cert_medico==null)
                                                                    <label class="control-label text-muted" for="cert_medico">
                                                                       -----Ingresar Certificado Medico-----
                                                                    </label>
                                                                @else
                                                                    <label class="control-label text-muted" for="cert_medico">
                                                                       ----Actualizar Certificado Medico----
                                                                    </label>
                                                                @endif
                                                                <input style="width: 92%" accept="application/pdf" name="cert_medico" type="file">
                                                                    <label for="cert_medico">
                                                                    </label>
                                                                </input>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="form-group col-md-4">
                                                            <div class="text-dark">
                                                                @if($empleados->cart_recomend==null)
                                                                    <label class="control-label text-muted" for="cart_recomend">
                                                                       ---Ingresar Carta de Recomendacion---  
                                                                    </label>
                                                                @else
                                                                    <label class="control-label text-muted" for="cart_recomend">
                                                                       --Actualizar Carta de Recomendacion--
                                                                    </label>
                                                                @endif
                                                                <input style="width: 92%" accept="application/pdf" name="cart_recomend" type="file">
                                                                    <label for="cart_recomend">
                                                                    </label>
                                                                </input>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="form-group col-md-4">
                                                            <div class="text-dark">
                                                                @if($empleados->fotografia==null)
                                                                    <label class="control-label text-muted" for="fotografia">
                                                                       ---------Ingresar Fotografia---------  
                                                                    </label>
                                                                @else
                                                                    <label class="control-label text-muted" for="fotografia">
                                                                       --------Actualizar Fotografia--------
                                                                    </label>
                                                                @endif
                                                                <input style="width: 92%" accept="application/pdf" name="fotografia" type="file">
                                                                    <label for="fotografia">
                                                                    </label>
                                                                </input>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="form-group col-md-4">
                                                            <div class="text-dark">
                                                                @if($empleados->const_Noinhab==null)
                                                                    <label class="control-label text-muted" for="const_Noinhab">
                                                                       Ingresar Constancia No Inhabilitacion  
                                                                    </label>
                                                                @else
                                                                    <label class="control-label text-muted" for="const_Noinhab">
                                                                     Actualizar Constancia No Inhabilitacion
                                                                    </label>
                                                                @endif

                                                                <input style="width: 92%" accept="application/pdf" name="const_Noinhab" type="file">
                                                                    <label for="const_Noinhab">
                                                                    </label>
                                                                </input>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="form-group col-md-4">
                                                            <div class="text-dark">
                                                                @if($empleados->comp_Dom==null)
                                                                    <label class="control-label text-muted" for="comp_Dom">
                                                                       --Ingresar Comprobante de Domicilio--  
                                                                    </label>
                                                                @else
                                                                    <label class="control-label text-muted" for="comp_Dom">
                                                                       -Actualizar Comprobante de Domicilio-
                                                                    </label>
                                                                @endif

                                                                <input style="width: 92%" accept="application/pdf" name="comp_Dom" type="file">
                                                                    <label for="comp_Dom">
                                                                    </label>
                                                                </input>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="form-group col-md-4">
                                                            <div class="text-dark">
                                                                @if($empleados->licencia==null)
                                                                    <label class="control-label text-muted" for="licencia">
                                                                       ----Ingresar Licencia de Conducir----
                                                                    </label>
                                                                @else
                                                                    <label class="control-label text-muted" for="licencia">
                                                                       ---Actualizar Licencia de Conducir---
                                                                    </label>
                                                                @endif

                                                                <input style="width: 92%" accept="application/pdf" name="licencia" type="file">
                                                                    <label for="licencia">
                                                                    </label>
                                                                </input>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="form-group col-md-4 text-dark">
                                                                @if($empleados->nss==null)
                                                                    <label class="control-label text-muted" for="nss">
                                                                       ---Ingresar Numero de Seguro Social--
                                                                    </label>
                                                                @else
                                                                    <label class="control-label text-muted" for="nss">
                                                                       --Actualizar Numero de Seguro Social--
                                                                    </label>
                                                                @endif
                                                                <input style="width: 92%" accept="application/pdf" name="nss" type="file">
                                                                    <label for="nss">
                                                                    </label>
                                                                </input>
                                                        </div>
                                                        <br>
                                                        <div class="form-group col-md-4">
                                                            <div class="text-dark">
                                                                @if($empleados->infonavit==null)
                                                                    <label class="control-label text-muted" for="infonavit">
                                                                       ---------Ingresar Infonavit----------
                                                                    </label>
                                                                @else
                                                                    <label class="control-label text-muted" for="infonavit">
                                                                       --------Actualizar Infonavit---------
                                                                    </label>
                                                                @endif
                                                                <input style="width: 92%" accept="application/pdf" name="infonavit" type="file">
                                                                    <label for="infonavit">
                                                                    </label>
                                                                </input>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="form-group col-md-4">
                                                            <div class="text-dark">
                                                                @if($empleados->rfc_doc==null)
                                                                    <label class="control-label text-muted" for="rfc_doc">
                                                                       -----Ingresar Comprobante de RFC-----
                                                                    </label>
                                                                @else
                                                                    <label class="control-label text-muted" for="rfc_doc">
                                                                       ----Actualizar Comprobante de RFC----
                                                                    </label>
                                                                @endif
                                                                <input style="width: 92%" accept="application/pdf" name="rfc_doc" type="file">
                                                                    <label for="rfc_doc">
                                                                    </label>
                                                                </input>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="form-group col-md-4">
                                                            <div class="text-dark">
                                                                @if($empleados->cartilla==null)
                                                                    <label class="control-label text-muted" for="cartilla">
                                                                       --Ingresar Cartilla Militar Liberada--
                                                                    </label>
                                                                @else
                                                                    <label class="control-label text-muted" for="cartilla">
                                                                       -Actualizar Cartilla Militar Liberada-
                                                                    </label>
                                                                @endif
                                                                <input style="width: 92%" accept="application/pdf" name="cartilla" type="file">
                                                                    <label for="cartilla">
                                                                    </label>
                                                                </input>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="form-group col-md-4">
                                                            <div class="text-dark">
                                                                @if($empleados->curp==null)
                                                                    <label class="control-label text-muted" for="curp">
                                                                       ----Ingresar Comprobante de CURP-----
                                                                    </label>
                                                                @else
                                                                    <label class="control-label text-muted" for="curp">
                                                                       ---Actualizar Comprobante de CURP----
                                                                    </label>
                                                                @endif
                                                                <input style="width: 92%" accept="application/pdf" name="curp" type="file">
                                                                    <label for="curp">
                                                                    </label>
                                                                </input>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="form-group col-md-4">
                                                            <div class="text-dark">
                                                                @if($empleados->diploma==null)
                                                                    <label class="control-label text-muted" for="diploma">
                                                                       --Ingresar Diploma Grado de Estudio--
                                                                    </label>
                                                                @else
                                                                    <label class="control-label text-muted" for="diploma">
                                                                       -Actualizar Diploma Grado de Estudio-
                                                                    </label>
                                                                @endif
                                                                <input style="width: 92%" accept="application/pdf" name="diploma" type="file">
                                                                    <label for="diploma">
                                                                    </label>
                                                                </input>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="form-group col-md-4">
                                                            <div class="text-dark">
                                                                @if($empleados->nombramiento==null)
                                                                    <label class="control-label text-muted" for="nombramiento">
                                                                       --------Ingresar Nombramiento--------  
                                                                    </label>
                                                                @else
                                                                    <label class="control-label text-muted" for="nombramiento">
                                                                       -------Actualizar Nombramiento-------
                                                                    </label>
                                                                @endif
                                                                <input style="width: 92%" accept="application/pdf" name="nombramiento" type="file">
                                                                    <label for="nombramiento">
                                                                    </label>
                                                                </input>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="form-group col-md-4">
                                                            <div class="text-dark">
                                                                @if($empleados->dictamen==null)
                                                                    <label class="control-label text-muted" for="dictamen">
                                                                       ----------Ingresar Dictamen----------  
                                                                    </label>
                                                                @else
                                                                    <label class="control-label text-muted" for="dictamen">
                                                                       ---------Actualizar Dictamen---------
                                                                    </label>
                                                                @endif
                                                                <input style="width: 92%" accept="application/pdf" name="dictamen" type="file">
                                                                    <label for="dictamen">
                                                                    </label>
                                                                </input>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="form-group col-md-4">
                                                            <div class="text-dark">
                                                                <h5>
                                                                    Agrega Documento Adicional
                                                                </h5>
                                                                <input style="width: 92%" accept="application/pdf" name="adicional" type="file">
                                                                    <label for="adicional">
                                                                    </label>
                                                                </input>
                                                            </div>
                                                        </div>
                                                    </div>
                                                        <button class="btn btn-primary" type="submit">
                                                            Guardar
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
