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
                    <script src="{{ asset('js/app.js') }}"></script>
                    <script crossorigin="anonymous" src="https://kit.fontawesome.com/afca8b434b.js">
                    </script>
                    <script type="text/javascript" src="{{ asset('js/mostrar.js') }}">
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
                font-family: 'Exo', sans-serif;
                background-image: url({{ asset('img/fondo-.png') }});
                background-attachment: fixed;
                text-align: center;
                background-position: center center;
                background-size: cover;
            }
    </style>
    <body>
        <div class="row">
            <img alt="Comisión Estatal de Vivienda" class="img-fluid" src="img/texturaSuperior.png">
            </img>
        </div>
        <div class="row">
                <img alt="" class="img-fluid" src="img/barra-colores-footer.png">
                </img>
            </div>
            <div id='app'></div>
        <main class="py-3">
            @yield('content')
        </main>
        @yield('js')
    </body>
</html>