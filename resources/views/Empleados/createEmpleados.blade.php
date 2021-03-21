@extends('layouts.app2')
@section('content')
<div class="row justify-content-center overflow-auto">
        <div class="form-group col-md-9">
        <div class="card">
            <div class="card-header">
                <h1 style="color: black">
                    Nuevo Empleado
                </h1>
                @error('Tcontrato')
                    <div class="alert alert-danger">{{'Seleccione una Relacion Laboral' }}</div>
                @enderror
            </div>
            <div class="card-body" style="background-color: #DCDCDC">
                <div class="row justify-content-center">
                    @if(session('verifi'))
                        <div class="alert alert-danger" role="alert">
                            {{session('verifi')}}
                        </div>
                    @endif
                    <form action="{{route('empleados.store')}}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-3" style="">
                                <label class="control-label text-muted" for="nombre">
                                    Nombre
                                </label>
                                <input class="form-control" id="nombre" name="nombre" required type="text" value="{{ old('nombre') }}" >
                                </input>
                            </div>
                            <div class="form-group col-md-3" style="">
                                <label class="control-label text-muted" for="ap_paterno">
                                    Apellido Paterno
                                </label>
                                <input  class="form-control" id="ap_paterno" name="ap_paterno" value="{{old('ap_paterno')}}"  required type="text">
                                </input>
                            </div>
                            <div class="form-group col-md-3">
                                <label class="control-label text-muted" for="ap_materno">
                                    Apellido Materno
                                </label>
                                <input class="form-control" id="ap_materno" name="ap_materno" value="{{old('ap_materno')}}"  required type="text">
                                </input>
                            </div>
                            <div class="form-group col-md-3">
                                <label class="control-label text-muted" for="fecha_alta">
                                    Fecha de Alta
                                </label>
                                <input class="form-control" id="fecha_alta" name="fecha_alta" type="date" value="{{date('Y-m-d')}}" min="1980-01-01" max={{now()}}>
                                </input>
                            </div>
                            <div class="form-group col-md-3">
                                <label class="control-label text-muted" for="Tcontrato">
                                    Relacion Laboral
                                </label>
                                <select onChange="prueba()" class="form-control" id="Tcontrato" name="Tcontrato">
                                    <option value="" >
                                        Seleccione una opción
                                    </option>
                                    <option value="base" >
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
                                <label class="control-label text-muted" for="fecha_nombramiento" >
                                    Fecha de Nombramiento
                                </label>
                                <input class="form-control" id="fecha_nombramiento" name="fecha_nombramiento" value="{{old('fecha_nombramiento')}}" 
                                type="date" disabled min="1980-01-01" max={{now()}}>
                                </input>
                            </div>
                            <div class="form-group col-md-3">
                                <label class="control-label text-muted" for="correo">
                                    Correo Electronico
                                </label>
                                <input class="form-control" id="correo" name="correo" value="{{old('correo')}}" type="email" required >
                                </input>
                            </div>
                            <div class="form-group col-md-3">
                                <label class="control-label text-muted" for="telefono">
                                    Numero Telefonico
                                </label>
                                <input class="form-control" id="telefono" name="telefono" value="{{old('telefono')}}" min="0" max="9999999999" required  type="number">
                                </input>
                            </div>
                            <div class="form-group col-md-3">
                                <label class="control-label text-muted" for="genero">
                                    Genero
                                </label>
                                <select class="form-control" id="genero" name="genero">
                                    <option value="Hombre">
                                        HOMBRE
                                    </option>
                                    <option value="Mujer">
                                        MUJER
                                    </option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label class="control-label text-muted" for="RFC">
                                    RFC
                                </label>
                                <input class="form-control" id="RFC" name="RFC" 
                                        value="{{old('RFC')}}" style="text-transform:uppercase;" 
                                        type="text" oninput="validaRFC()"
                                         maxlength="13" required>
                                </input>
                                <label id="estatus" ></label>
                            </div>
                            <div class="form-group col-md-3">
                                <label class="control-label text-muted" for="puesto">
                                    Categoria
                                </label>
                                <select class="form-control" id="puesto" name="puesto" required>
                                @foreach($categorias as $categoria)
                                    <option value="{{$categoria->descripcion}}">
                                        {{$categoria->identificador}}---{{$categoria->descripcion}}
                                    </option>
                                @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label class="control-label text-muted" for="departamento">
                                    Departamento
                                </label>
                                <select class="form-control" id="departamento" name="departamento" required>
                                @foreach($departamentos as $departamento)
                                    <option value="{{$departamento->descripcion}}">
                                        {{$departamento->id}} {{$departamento->descripcion}}
                                    </option>
                                @endforeach
                                </select>
                            </div>
                            
                        </div>
                        {{-- aqui inicia la parte de los archivos --}}
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <div class="text-dark">
                                    <label class="control-label text-muted" for="contrato">
                                        Contrato
                                    </label>
                                    <input accept="application/pdf" name="contrato" value="{{old('contrato')}}" type="file">
                                        <label for="contrato">
                                        </label>
                                    </input>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <div class="text-dark">
                                    <label class="control-label text-muted"  for="creden_elect">
                                        Credencial de Elector
                                    </label>
                                    <input accept="application/pdf" required  name="creden_elect" value="{{old('creden_elect')}}" type="file">
                                        <label for="creden_elect">
                                        </label>
                                    </input>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <div class="text-dark">
                                    <label class="control-label text-muted" for="acta_nac">
                                        Acta de nacimiento
                                    </label>
                                    <input accept="application/pdf" required name="acta_nac" value="{{old('acta_nac')}}" type="file">
                                        <label for="acta_nac">
                                        </label>
                                    </input>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <div class="text-dark">
                                    <label class="control-label text-muted" for="curriculum">
                                        Curriculum
                                    </label>
                                    <input accept="application/pdf" required name="curriculum" value="{{old('curriculum')}}" type="file">
                                        <label for="curriculum">
                                        </label>
                                    </input>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <div class="text-dark">
                                    <label class="control-label text-muted" for="solicitud">
                                        Solicitud de Empleo
                                    </label>
                                    <input accept="application/pdf" required name="solicitud" value="{{old('solicitud')}}" type="file">
                                        <label for="solicitud">
                                        </label>
                                    </input>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <div class="text-dark">
                                    <label class="control-label text-muted" for="cert_medico">
                                        Certificado Medico
                                    </label>
                                    <input accept="application/pdf" required name="cert_medico" value="{{old('cert_medico')}}" type="file">
                                        <label for="cert_medico">
                                        </label>
                                    </input>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <div class="text-dark">
                                    <label class="control-label text-muted" for="cart_recomend">
                                        Carta de Recomendacion
                                    </label>
                                    <input accept="application/pdf" required name="cart_recomend" value="{{old('cart_recomend')}}" type="file">
                                        <label for="cart_recomend">
                                        </label>
                                    </input>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <div class="text-dark">
                                    <label class="control-label text-muted" for="fotografia">
                                        Fotografia
                                    </label>
                                    <input accept="application/pdf" required name="fotografia" value="{{old('fotografia')}}" type="file">
                                        <label for="fotografia">
                                        </label>
                                    </input>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <div class="text-dark">
                                    <label class="control-label text-muted" for="const_Noinhab">
                                        Constancia de No Inhabilitacion
                                    </label>
                                    <input accept="application/pdf" required name="const_Noinhab" value="{{old('const_Noinhab')}}" type="file">
                                        <label for="const_Noinhab">
                                        </label>
                                    </input>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <div class="text-dark">
                                    <label class="control-label text-muted" for="comp_Dom">
                                        Comprobante de Domicilio
                                    </label>
                                    <input accept="application/pdf" required name="comp_Dom" value="{{old('comp_Dom')}}" type="file">
                                        <label for="comp_Dom">
                                        </label>
                                    </input>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <div class="text-dark">
                                    <label class="control-label text-muted" for="licencia">
                                        Licencia de Conducir
                                    </label>
                                    <input accept="application/pdf" name="licencia" value="{{old('licencia')}}" type="file">
                                        <label for="licencia">
                                        </label>
                                    </input>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <div class="text-dark">
                                    <label class="control-label text-muted" for="nss">
                                        Numero de Seguro Social
                                    </label>
                                    <input accept="application/pdf" required name="nss" value="{{old('nss')}}" type="file">
                                        <label for="nss">
                                        </label>
                                    </input>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <div class="text-dark">
                                    <label class="control-label text-muted" for="infonavit">
                                        Infonavit
                                    </label>
                                    <input accept="application/pdf" name="infonavit" value="{{old('infonavit')}}" type="file">
                                        <label for="infonavit">
                                        </label>
                                    </input>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <div class="text-dark">
                                    <label class="control-label text-muted" for="rfc_doc">
                                        Constancia de RFC
                                    </label>
                                    <input accept="application/pdf" required name="rfc_doc" value="{{old('rfc_doc')}}" type="file">
                                        <label for="rfc_doc">
                                        </label>
                                    </input>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <div class="text-dark">
                                    <label class="control-label text-muted" for="cartilla">
                                        Cartilla Militar Liberada
                                    </label>
                                    <input accept="application/pdf" name="cartilla" value="{{old('cartilla')}}" type="file">
                                        <label for="cartilla">
                                        </label>
                                    </input>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <div class="text-dark">
                                    <label class="control-label text-muted"  for="curp">
                                        Clave Única de Registro de Poblacional (CURP)
                                    </label>
                                    <input accept="application/pdf" required name="curp" value="{{old('curp')}}" type="file">
                                        <label for="curp">
                                        </label>
                                    </input>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <div class="text-dark">
                                    <label class="control-label text-muted" for="diploma">
                                        Diploma de Grado de Estudio
                                    </label>
                                    <input accept="application/pdf" required name="diploma" value="{{old('diploma')}}" type="file">
                                        <label for="diploma">
                                        </label>
                                    </input>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <div class="text-dark">
                                    <label class="control-label text-muted" for="nombramiento">
                                        Nombramiento
                                    </label>
                                    <input accept="application/pdf" name="nombramiento" value="{{old('nombramiento')}}" type="file">
                                        <label for="nombramiento">
                                        </label>
                                    </input>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <div class="text-dark">
                                    <label class="control-label text-muted" for="dictamen">
                                        Dictamen
                                    </label>
                                    <input accept="application/pdf" required name="dictamen" value="{{old('dictamen')}}" type="file">
                                        <label for="dictamen">
                                        </label>
                                    </input>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <div class="text-dark">
                                    <label class="control-label text-muted" for="adicionales">
                                        Documentos Adicionales
                                    </label>
                                    <input accept="application/pdf" name="adicionales" value="{{old('adicionales')}}" type="file">
                                        <label for="adicionales">
                                        </label>
                                    </input>
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <!-- Submit Button -->
                            <button class="btn btn-primary " type="submit">
                                Guardar
                            </button>
                        </div> 
                    </form>
                </div>    
            </div>
        </div>
    </div>
</div>
@endsection

