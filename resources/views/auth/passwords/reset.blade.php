<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
            <meta content="width=device-width,user-scalable=no, initial-scale=1, maximum-scale=1.0" name="viewport">
                <!-- CSRF Token -->
                <meta content="{{ csrf_token() }}" name="csrf-token">
                    <title>
                        {{'CEVI'}}
                    </title>
                    <!-- Scripts -->
                    <script defer="" src="{{ asset('js/app.js') }}">
                    </script>
                    <script crossorigin="anonymous" src="https://kit.fontawesome.com/afca8b434b.js">
                    </script>
                    <!-- Fonts -->
                    <link href="//fonts.gstatic.com" rel="dns-prefetch"/>
                    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"/>
                    <!-- Styles -->
                    <link href="{{ asset('css/app.css') }}" rel="stylesheet"/>
                    <link href="{{ asset('css/estilos.css') }}" rel="stylesheet"/>
    </head>
    <style>
        body{
                background-image: url(img/fondo.png);
                background-color: rgba(0,0,0,0.6);
                background-size: 4000px;
                text-align: center;
                background-position: center center;
                background-size: cover;
                background-repeat: repeat-x;
                position: relative;
            }
    </style>
    <br>
    <body>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card" >
                        <div class="card-header" >
                            <h5 style="color: black">
                                Reestablecer Contraseña
                            </h5>
                        </div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('password.update') }}">
                                @csrf

                                <input type="hidden" name="token" value="{{ $token }}">

                                <div class="form-group row">
                                    <label for="email" style="color: black" class="col-md-4 col-form-label text-md-right">Direccion de Correo</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right" style="color: black">Contraseña</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right" style="color: black">Confirmar Contraseña</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            Reestablecer Contraseña
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
