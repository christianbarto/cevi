@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="form-group col-md-9">
        <div class="card">
            <div class="card-header" style="color:black">
                <h1>
                   Cambia tus Credenciales
                </h1>
            </div>
            <div class="card-body" style="background-color: #DCDCDC">
                <div class="row justify-content-center">
                    <form action="{{route('user.updateContrasena')}}" method="POST">
                        @csrf
                        @if(session('verifi'))
                            <div class="alert alert-danger" role="alert">
                                {{session('verifi')}}
                            </div>
                        @endif
                        @if($errors->any())
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    {{$error}}
                                @endforeach
                            </div>
                        @endif
                        <div class="justify-content-center row">
                            <div class="col-md-6" style="margin: 0 -7px;">
                                <input class="form-control" id="password" name="password" type="password" placeholder="Contraseña" required>
                                </input>
                            </div>
                            <div class="input-group-append" style="margin: 0 -8px;">
                                <button id="show_password" class="btn btn-success col" type="button" onclick="mostrarPassword()"> 
                                    <span class="fa fa-eye-slash icon"></span> 
                                </button>
                            </div>
                        </div>
                        <div class="justify-content-center row" style="margin-top: 5px; margin-left: -35px;">
                            <div class="col-md-6">
                                <input class="form-control" id="password_confirmation" name="password_confirmation" type="password" placeholder="Confirmar Contraseña" required>
                                </input>
                            </div>
                        </div>
                        <div class="justify-content-center row" style="margin-top: 20px;">
                            <div class="col-md-10">
                                <select class="form-control" id="pregunta" name="pregunta" style="color:black">
                                    <option value="">
                                        Selecciona una pregunta de seguridad
                                    </option>
                                    <option value="¿Cual fue su primer trabajo?">
                                        ¿Cuál fue su primer trabajo?
                                    </option>
                                    <option value="¿Cual era el nombre de su primera mascota?">
                                        ¿Cuál era el nombre de su primera mascota?
                                    </option>
                                    <option value="¿Cual es su comida favorita?">
                                        ¿Cuál es su comida favorita?
                                    </option>
                                    <option value="¿Cual es el segundo apellido de su padre?">
                                        ¿Cuál es el segundo apellido de su padre?
                                    </option>
                                    <option value="¿Cual era la marca y modelo de su primer coche?">
                                        ¿Cuál era la marca y modelo de su primer coche?
                                    </option>
                                    <option value="¿Como se llamaba la primera escuela a la que asistió?">
                                        ¿Cómo se llamaba la primera escuela a la que asistió?
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="justify-content-center row" style="margin-top: 5px;">
                            <div class="col-md-10">
                                <input class="form-control" id="respuesta" name="respuesta" type="text" 
                                value="{{old('respuesta')}}" required placeholder="Ingresa tu respuesta">
                                </input>
                            </div>
                        </div>
                        <div class="justify-content-center row" style="margin-top: 5px;">
                            <div class="col-md-10">
                                <button class="btn btn-primary" id="id" name="id" type="submit" >
                                    Guardar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection