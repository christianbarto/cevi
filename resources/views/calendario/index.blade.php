<!DOCTYPE html>
<html>

  <head>
    <script crossorigin="anonymous" src="https://kit.fontawesome.com/afca8b434b.js">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Fonts -->
    <link href="//fonts.gstatic.com" rel="dns-prefetch"/>
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/estilos.css') }}" rel="stylesheet"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Exo&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  </head>
    <style>
    body{
      font-family: 'Exo', sans-serif;
      background-image: url({{ asset('img/fondo-.png') }});
      background-attachment: fixed;
      text-align: center;
      background-position: center center;
      background-size: cover;
      
      overflow-x: hidden;
    }
    .header-col{
      background: #E3E9E5;
      color:#536170;
      text-align: center;
      font-size: 20px;
      font-weight: bold;
    }
    .header-calendar{
      background: #622779;color:white;
    }
    .box-day{
      border:1px solid #E3E9E5;
      height:150px;
    }
    .box-dayoff{
      border:1px solid #E3E9E5;
      height:150px;
      background-color: #ccd1ce;
    }
    </style>

  <body>
    <div class="row">
                <img alt="Comisión Estatal de Vivienda" class="img-fluid" src={{ asset('img/texturaSuperior.png') }}>
                </img>
            </div>
            <div class="row">
                <img alt="" class="img-fluid" src={{ asset('img/barra-colores-footer.png') }} >
                </img>
            </div>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm "> 
                <div class="container-fluid d-flex justify-content-around">
                    @if(Auth::user()->role_id==2)
                    <a class="navbar-brand navbar-collapse bg-dark" href="{{route('home')}}">
                        Bienvenido Administrador
                    </a>
                    @else
                    <a class="navbar-brand navbar-collapse bg-dark" href="{{route('home')}}">
                        Bienvenido
                    </a>
                    @endif
                    <div class="navbar-nav ">
                        <ul class="navbar-nav ">
                            <li class="nav-item">
                                <a class="nav-link active" href="{{route('home')}}">
                                    Inicio
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
                                <a class="nav-link" href="{{ url('/IndexDepartamento')}}">
                                    Departamentos
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/IndexCategorias')}}">
                                    Categorias
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
                    <div class="navbar-collapse">
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                            <li class="nav-item">
                                <label class="alert-danger" for="">
                                    Su Sesion ha caducado
                                </label>
                                <a class="nav-link" href="{{ route('login') }}">
                                    {{ __('Login') }}
                                </a>
                            </li>
                            @else
                            <li class="nav-item dropdown">
                                <a aria-expanded="false" aria-haspopup="true" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="navbarDropdown" role="button" v-pre="">
                                    {{ Auth::user()->name }} {{ Auth::user()->ap_paterno }} {{ Auth::user()->ap_materno }}
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
    <div class="container" align="center">
      <p class="lead">
      <h3>Calendario</h3>

      <hr>

      <div class="row header-calendar"  >

        <div class="col" style="display: flex; justify-content: space-between; padding: 10px;">
          <a  href="{{ asset('/Calendar/event/') }}/<?= $data['last']; ?>" style="margin:10px;">
            <i class="fas fa-chevron-circle-left" style="font-size:30px;color:white;"></i>
          </a>
          <h2 style="font-weight:bold;margin:10px;"><?= $mespanish; ?> <small><?= $data['year']; ?></small></h2>
          <a  href="{{ asset('/Calendar/event/') }}/<?= $data['next']; ?>" style="margin:10px;">
            <i class="fas fa-chevron-circle-right" style="font-size:30px;color:white;"></i>
          </a>
        </div>

      </div>
      <div class="row">
        <div class="col header-col">Lunes</div>
        <div class="col header-col">Martes</div>
        <div class="col header-col">Miercoles</div>
        <div class="col header-col">Jueves</div>
        <div class="col header-col">Viernes</div>
        <div class="col header-col">Sabado</div>
        <div class="col header-col">Domingo</div>
      </div>
      <!-- inicio de semana -->
      @foreach ($data['calendar'] as $weekdata)
        <div class="row">
          <!-- ciclo de dia por semana -->
          @foreach  ($weekdata['datos'] as $dayweek)

          @if  ($dayweek['mes']==$mes)
            <div class="col box-day">
              {{ $dayweek['dia']  }}
            </div>
          @else
          <div class="col box-dayoff">
          </div>
          @endif


          @endforeach
        </div>
      @endforeach
      </body>
    </div> <!-- /container -->
</html>