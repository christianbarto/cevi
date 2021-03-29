@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="container" id="mycontainer">
        <div class="row justify-content-center">
            <div class="col-md-8 logo-dep" style="background-color: #D5DBDB">
                <div class="img">
                    <img class="img-fluid" src="img/cevi20.png" width="30%">
                    </img>
                </div>
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right" for="email">
                            {{ "" }}
                        </label>
                        <div class="col-md-4">
                            <input style="background-color: #F2F4F4" class="form-control" id="entrada_text" 
                            name="email" type="text" value="{{ old('email') }}" placeholder="Usuario" required>
                            </input>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right" for="password">
                            {{ "" }}
                        </label>
                        <div class="col-md-4">
                            <input autocomplete="current-password" class="form-control @error('password') is-invalid @enderror" style="background-color: #F2F4F4 " id="password" name="password" required="" type="password" placeholder="Contraseña">
                            </input>
                        </div>
                    </div>
                    @if ($errors->any())
                        <div class="form-group row justify-content-center">
                            <div class="col-md-4" style="margin-top: 8px;">
                                    <strong style="color: red">
                                        <p>Usuario o contraseña invalidos</p>
                                    </strong>
                            </div>
                        </div>
                    @endif
                        <div class="col-md-10" style="margin-top: 8px;">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember" style="color: black;">
                                        <h6>Recordarme</h6>
                                    </label>
                                </div>
                        </div>

                    <div class="form-group" align="center">
                        <button class="btn btn-primary" type="submit">
                            {{ __('Login') }}
                        </button>
                    </div>

                        <a class="btn btn-link" href="{{ route('resetPassword') }}">
                        ¿Olviaste tu Contraseña?
                        </a>
                    <br>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
