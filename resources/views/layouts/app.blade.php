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
                    <script src="https://kit.fontawesome.com/afca8b434b.js" crossorigin="anonymous"></script>
                    <!-- Fonts -->
                    <link href="//fonts.gstatic.com" rel="dns-prefetch"/>
                    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"/>
                    <!-- Styles -->
                    <link href="{{ asset('css/app.css') }}" rel="stylesheet"/>
                    <link href="{{ asset('css/estilos.css') }}" rel="stylesheet"/>
                    </link>
                </meta>
            </meta>
        </meta>
        <style>
            body{
                background-image: url(img/fondo.png);

                background-color: rgba(0,0,0,0.6);;
                background-size: 2100px;
                text-align: center;
                background-position: center center;
                background-size: cover;
                background-repeat: no-repeat;
                position: relative;
            }
        </style>
    </head>
    <body>
        <div class="row">
            <img alt="Comisión Estatal de Vivienda" class="img-fluid logo-dep" height="100" src="img/texturaSuperior.png" width="1566">
            </img>
        </div>
        <main class="py-3">
            @yield('content')
        </main>
    </body>
</html>