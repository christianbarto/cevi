<html>
  <head>
    <title></title>
    <meta content="">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Exo&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script defer="" src="{{ asset('js/app.js') }}"></script>
    <style>
    body{
      font-family: 'Exo', sans-serif;
      background-image: url({{ asset('img/fondo-.png') }});
      background-attachment: fixed;
      background-position: center center;
      background-size: cover;
    }
    .header-col{
      background: #E3E9E5;
      color:#536170;
      text-align: center;
      font-size: 20px;
      font-weight: bold;
    }
    .header-calendar{
      background: #EE192D;color:white;
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

  </head>
  <body>
    <div class="row">
      <img alt="Comisión Estatal de Vivienda" class="img-fluid" src={{ asset('img/texturaSuperior.png') }}>
      </img>
    </div>
    <div class="row">
      <img alt="" class="img-fluid" src={{ asset('img/barra-colores-footer.png') }} >
      </img>
    </div>

    <div class="container">
      <div class="fomr-group">
        <h5 style="margin-top: 10px;">Detalles de evento</h5>
        <a class="btn btn-default"  style="margin-top: -5px;" href="{{ asset('/Evento/index') }}">Atras</a>
      </div>
      <div class="col-md-6">
          <div class="fomr-group">
            <h4>Titulo</h4>
            {{ $event->titulo }}
          </div>
          <div class="fomr-group">
            <h4 style="margin-top: 12px;">Empleado</h4>
            {{ $event->empleado }}
          </div>
          <div class="fomr-group">
            <h4 style="margin-top: 12px;">Descripcion del Evento</h4>
            {{ $event->descripcion }}
          </div>
          <div class="fomr-group">
            <h4 style="margin-top: 12px;">Fecha</h4>
            {{Date::parse($event->fecha)->format('j \d\e F \d\e Y')}}
          </div>
          <br>
          <a class="btn btn-warning pull-right" data-target="#EditEvento{{$event->id}}" data-toggle="modal" href="#" type="submit">
            <i class="fas fa-pencil-alt"></i>
          </a>
          <div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="EditEvento{{$event->id}}" tabindex="-1">
            <div class="modal-dialog modal-sm">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title text-dark">
                    Editar Evento
                  </h5>
                  <button class="close" data-dismiss="modal" type="button">
                    <span>
                      &times;
                    </span>
                  </button>
                </div>
                <div class="modal-body" style="background-color: #DCDCDC">
                  <form action="{{route ('evento.update',$event->id)}}" method="post">
                    {{csrf_field()}} {{method_field('post')}}
                    <div class="form-group">
                      <label for="" class="text-dark float-left">Titulo</label>
                      <input type="text" name ="titulo" class="form-control" value="{{$event->titulo}}">
                      </input>
                    </div>
                    <div class="fomr-group">
                      <label>
                        Empleado:<br>
                        {{$event->empleado}}
                      </label>
                      <select class="form-control" id="empleado" name="empleado">
                        <option value="" >
                          Seleccione un empleado
                        </option>
                        @foreach($empleados as $empleado)
                          <option value="{{$empleado->nombre}} {{$empleado->ap_paterno}} {{$empleado->ap_materno}}">
                            {{$empleado->nombre}} {{$empleado->ap_paterno}} {{$empleado->ap_materno}}
                          </option>
                        @endforeach
                      </select>
                    </div>
                    <div class="fomr-group" style="margin-top: 10px;"> 
                      <label>Descripcion:<br>
                        {{$event->descripcion}}</label>
                      <select class="form-control" id="descripcion" name="descripcion">
                        <option value="" >
                          Seleccione una opción
                        </option>
                        <option value="Vacaciones" >
                          Vacaciones
                        </option>
                        <option value="Ausencia">
                          Ausencia
                        </option>
                        <option value="Permiso">
                          Permiso
                        </option>
                        <option value="Plan de carrera">
                          Plan de carrera
                        </option>
                      </select>
                    </div>
                    <div class="fomr-group" style="margin-top: 10px;">
                      <label>Fecha:<br>
                        {{Date::parse($event->fecha)->format('j \d\e F \d\e Y')}}
                      </label>
                      <input type="date" class="form-control" name="fecha" min={{now()}} value={{$event->fecha}}>
                    </div>
                    <div class="modal-footer">
                      <button class="btn btn-primary" type="submit">
                        Guardar
                      </button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div> 
  </body>
</html>