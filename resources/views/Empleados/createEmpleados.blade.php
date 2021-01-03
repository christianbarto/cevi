@extends('layouts.app2')
@section('content')
<div class="container-fluid" style="background-color:#7D3C98">
    <h1>
        Nuevo Empleado
    </h1>
    <div class="card">
        <div class="card-body">
            <div class="row justify-content-center">
                <form action="{{route('empleado.store')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <div class="text-dark">
                            <label class="control-label text-muted" for="id">
                                Avatar
                            </label>
                            <input name="avatar" type="file">
                                <label for="avatar">
                                </label>
                            </input>
                        </div>
                    </div>
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
                            <input class="form-control" id="name" name="name" required="" type="text">
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
                            <input class="form-control" disabled="" id="fecha_alta" name="fecha_alta" required="" type="text" value="{{date('Y-m-d')}}">
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
                                <option value="H">
                                    Hombre
                                </option>
                                <option value="M">
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
                            <input class="form-control" id="Tcontrato" name="Tcontrato" required="" type="text">
                            </input>
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
