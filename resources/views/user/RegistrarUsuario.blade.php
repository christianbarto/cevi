@extends('layouts.app')
@section('content')
<h1 class="text-center" style="color:#FDFCFC">
    Registrar Usuario
</h1>
<div class="row justify-content-center">
    <form action="{{route('empleado.store')}}" method="POST">
        @csrf
        <div class="form-row">
            <!-- Full Name -->
            <div class="form-group col-md-3">
                <label class="control-label" for="name">
                    Nombre
                </label>
                <input class="form-control" id="name" name="name" type="text" required>
                </input>
            </div>
            <div class="form-group col-md-3">
                <label class="control-label" for="username">
                    Username
                </label>
                <input class="form-control" id="email" name="email" type="text" required>
                </input>
            </div>
            <div class="form-group col-md-3">
                <label class="control-label" for="password">
                    Password
                </label>
                <input class="form-control" id="password" name="password" type="password" required>
                </input>
            </div>
            <div class="form-group">
                <label class="control-label" for="role_id">
                    Role
                </label>
                <select class="form-control" id="role_id" name="role_id">
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
@endsection
