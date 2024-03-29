@extends('layouts.app2')
@section('content')
<div class="row justify-content-center">
    <div class="form-group col-md-9">
        <div class="card">
            <div class="card-header" style="color:black">
                <h1>
                   Registrar Usuario
                </h1>
            </div>
            <div class="card-body" style="background-color: #DCDCDC">
                <div class="row justify-content-center">
                    <form action="{{route('empleado.store')}}" method="POST">
                        @csrf
                        @if(session('verifi'))
                            <div class="alert alert-danger" role="alert">
                                {{session('verifi')}}
                            </div>
                        @endif
                        <div class="form-row"  style="margin-left: 130px;">
                            <!-- Full Name -->
                            <div class="form-group col-md-2">
                                <label class="control-label" for="name" style="color:black">
                                    Nombre
                                </label>
                                <input class="form-control" id="name" name="name" 
                                value="{{old('name')}}" type="text" required onkeyup="javascript:this.value=this.value.toUpperCase();">
                                </input>
                            </div>
                            <div class="form-group col-md-2">
                                <label class="control-label" for="ap_paterno" style="color:black">
                                    Apellido Paterno
                                </label>
                                <input class="form-control" id="ap_paterno" name="ap_paterno" 
                                value="{{old('ap_paterno')}}" type="text" required onkeyup="javascript:this.value=this.value.toUpperCase();">
                                </input>
                            </div>
                            <div class="form-group col-md-2">
                                <label class="control-label" for="ap_materno" style="color:black">
                                    Apellido Materno
                                </label>
                                <input class="form-control" id="ap_materno" name="ap_materno" 
                                value="{{old('ap_materno')}}" type="text" required onkeyup="javascript:this.value=this.value.toUpperCase();">
                                </input>
                            </div>
                            <div class="form-group col-md-2">
                                <label class="control-label" for="username" style="color:black">
                                    Usuario
                                </label>
                                <input class="form-control" type="text" id="email" name="email" 
                                value="{{old('email')}}" type="text" required>
                                </input>
                            </div>
                            <div class="form-group col-md-2">
                                <label class="control-label" for="password" style="color:black">
                                    Contraseña
                                </label>
                                <input class="form-control" id="password" name="password" type="password" required>
                                </input>
                            </div>
                            <div class="input-group-append form-group" style="margin-top: 30px;margin-right: -25px;margin-left: -10px;">
                                <button id="show_password" class="btn btn-success" type="button" onclick="mostrarPassword()"> 
                                    <span class="fa fa-eye-slash icon"></span> 
                                </button>
                            </div>
                            <div class="form-group col-md-2">
                                <label class="control-label" for="role_id" style="color:black">
                                    Role
                                </label>
                                <select class="form-control" id="role_id" name="role_id" style="color:black">
                                    <option value="2">
                                        Administrador
                                    </option>
                                    <option value="1">
                                        Usuario
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <!-- Submit Button -->
                            <button class="btn btn-primary " type="submit">
                                Guardar
                            </button>
                            <a class="btn btn-danger" href="{{ asset('/usuarios') }}">
                                Cancelar
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
