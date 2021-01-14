@extends('layouts.app2')
@section('content')
<div class="container-fluid" style="background-color:#7D3C98">
    <h1>
        Nuevo Empleado
    </h1>
    <div class="card">
        <div class="card-body">
            <div class="row justify-content-center">
                <form action="{{route('empleados.store')}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label class="control-label text-muted" for="id">
                                Numero de trabajador
                            </label>
                            <input class="form-control" id="id" name="id" required="" type="text">
                            </input>
                        </div>
                        <div class="form-group col-md-3" style="">
                            <label class="control-label text-muted" for="nombre">
                                Nombre
                            </label>
                            <input class="form-control" id="nombre" name="nombre" required="" type="text">
                            </input>
                        </div>
                        <div class="form-group col-md-3" style="">
                            <label class="control-label text-muted" for="ap_paterno">
                                Apellido Paterno
                            </label>
                            <input class="form-control" id="ap_paterno" name="ap_paterno" required="" type="text">
                            </input>
                        </div>
                        <div class="form-group col-md-3">
                            <label class="control-label text-muted" for="ap_materno">
                                Apellido Materno
                            </label>
                            <input class="form-control" id="ap_materno" name="ap_materno" required="" type="text">
                            </input>
                        </div>
                        <div class="form-group col-md-3">
                            <label class="control-label text-muted" for="fecha_alta">
                                Fecha de Alta
                            </label>
                            <input class="form-control" id="fecha_alta" name="fecha_alta" required="" type="date" value="{{date('Y-m-d')}}">
                            </input>
                        </div>
                        <div class="form-group col-md-3">
                            <label class="control-label text-muted" for="correo">
                                Correo Electronico
                            </label>
                            <input class="form-control" id="correo" name="correo" required="" type="text">
                            </input>
                        </div>
                        <div class="form-group col-md-3">
                            <label class="control-label text-muted" for="telefono">
                                Numero Telefonico
                            </label>
                            <input class="form-control" id="telefono" name="telefono" required="" type="text">
                            </input>
                        </div>
                        <div class="form-group col-md-3">
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
                        <div class="form-group col-md-3">
                            <label class="control-label text-muted" for="RFC">
                                RFC
                            </label>
                            <input class="form-control" id="RFC" name="RFC" required="" type="text">
                            </input>
                        </div>
                        <div class="form-group col-md-3">
                            <label class="control-label text-muted" for="puesto">
                                Puesto
                            </label>
                            <input class="form-control" id="puesto" name="puesto" required="" type="text">
                            </input>
                        </div>
                        <div class="form-group col-md-3">
                            <label class="control-label text-muted" for="Tcontrato">
                                Tipo de contrato
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
                    {{-- aqui inicia la parte de los archivos --}}
                    <div class="form-row">
                        <div class="form-group col-md-3">
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
                        <div class="form-group col-md-3">
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
                        <div class="form-group col-md-3">
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
                        <div class="form-group col-md-3">
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
                        <div class="form-group col-md-3">
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
                        <div class="form-group col-md-3">
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
                        <div class="form-group col-md-3">
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
                        <div class="form-group col-md-3">
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
                        <div class="form-group col-md-3">
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
                        <div class="form-group col-md-3">
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
                        <div class="form-group col-md-3">
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
                        <div class="form-group col-md-3">
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
                        <div class="form-group col-md-3">
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
                        <div class="form-group col-md-3">
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
                        <div class="form-group col-md-3">
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
                        <div class="form-group col-md-3">
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
                        <div class="form-group col-md-3">
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
@endsection
