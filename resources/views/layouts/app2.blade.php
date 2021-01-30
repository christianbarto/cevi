<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
            <meta content="width=device-width, initial-scale=2" name="viewport">
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
                </meta>
            </meta>
        </meta>
    </head>
<style>
    body{
                background-image: url(img/fondo.png);
                background-color: rgba(0,0,0,0.6);;
                background-size: 4000px;
                text-align: center;
                background-position: center center;
                background-size: cover;
                background-repeat: repeat-x;
                position: relative;
            }
</style>
<body>
    <div class="row">
        <img alt="Comisión Estatal de Vivienda" class="img-fluid" height="100" src="img/texturaSuperior.png" width="1566">
        </img>
    </div>
    <br>
        <div class="row justify-content-center">
            <div class="col-md-9">
                <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                    <div class="container-fluid">
                        <a class="navbar-brand text-dark">
                            Bienvenido Administrador
                        </a>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('home')}}">
                                        Home
                                    </a>
                                </li>
                                @if(Auth::user()->role_id==2)
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('usuarios')}}">
                                        Usuarios
                                    </a>
                                </li>
                                @endif
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('empleados.index')}}">
                                        Empleados
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('checador.index')}}">
                                        Reloj
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('reportes.index')}}">
                                        Reportes
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <!-- Left Side Of Navbar -->
                            <ul class="navbar-nav mr-auto">
                            </ul>
                            <!-- Right Side Of Navbar -->
                            <ul class="navbar-nav ml-auto">
                                <!-- Authentication Links -->
                                @guest
                                <li class="nav-item">
                                    <label class="alert-danger" for="">Su Sesion ha caducado</label>
                                    <a class="nav-link" href="{{ route('login') }}">
                                        {{ __('Login') }}
                                    </a>
                                </li>
                                @else
                                <li class="nav-item dropdown">
                                    <a aria-expanded="false" aria-haspopup="true" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="navbarDropdown" role="button" v-pre="">
                                        {{ Auth::user()->name }}
                                        <span class="caret">
                                        </span>
                                    </a>
                                    <div aria-labelledby="navbarDropdown" class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                        <form action="{{ route('logout') }}" id="logout-form" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                                @endguest
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <main class="py-3">
            @yield('content')
        </main>
    </br>
</body>
