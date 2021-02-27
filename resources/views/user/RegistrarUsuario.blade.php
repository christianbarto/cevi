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
                        <div class="form-row">
                            <!-- Full Name -->
                            <div class="form-group col-md-3">
                                <label class="control-label" for="name" style="color:black">
                                    Nombre
                                </label>
                                <input class="form-control" id="name" name="name" value="{{old('name')}}" type="text" required>
                                </input>
                            </div>
                            <div class="form-group col-md-3">
                                <label class="control-label" for="username" style="color:black">
                                    Username
                                </label>
                                <input class="form-control" id="email" name="email" value="{{old('email')}}" type="text" required>
                                </input>
                            </div>
                            <div class="form-group col-md-3">
                                <label class="control-label" for="password" style="color:black">
                                    Password
                                </label>
                                <input class="form-control" id="password" name="password" type="password" required>
                                </input>
                            </div>
                            <div class="form-group">
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
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
