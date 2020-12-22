@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="text-center">
                <font color="white" size="12px">
                    Iniciar sesión
                </font>
            </div>
            <div align="center" class="img">
                <img class="border border-dark" src="img/oficina.jpg" width="60%">
                </img>
            </div>
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right" for="email">
                        {{ __('Usuario') }}
                    </label>
                    <div class="col-md-5">
                        <input autocomplete="off" autofocus="" class="form-control @error('email') is-invalid @enderror" id="entrada_text" name="email" type="text" value="{{ old('email') }}">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>
                                    Usuario invalido
                                </strong>
                            </span>
                            @enderror
                        </input>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right" for="password">
                        {{ __('Contraseña') }}
                    </label>
                    <div class="col-md-5">
                        <input autocomplete="current-password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required="" type="password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                            @enderror
                        </input>
                    </div>
                </div>
                <div align="center">
                    <button class="btn btn-primary" type="submit">
                        {{ __('Login') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
