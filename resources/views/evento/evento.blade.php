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
            <h4 style="margin-top: 12px;">Detalle Titulo</h4>
            {{ $event->detalleTitulo }}
          </div>
          <div class="fomr-group">
            <h4 style="margin-top: 12px;">Empleado</h4>
            <div>
              {{ $seleccionado->nombre }} {{ $seleccionado->ap_paterno }} {{ $seleccionado->ap_materno }}
              <a class="btn alert-success pull-right" data-target="#empleado{{$event->id}}" data-toggle="modal" href="#" type="submit">
                <i class="fas fa-user-tie"></i>
              </a>
              <div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="empleado{{$event->id}}" tabindex="-1">
                <div class="modal-dialog modal-sm">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title text-dark">
                        Detalles del empleado 
                      </h5>
                      <button class="close" data-dismiss="modal" type="button">
                        <span>
                          &times;
                        </span>
                      </button>
                    </div>
                    <div class="modal-body" style="background-color: #DCDCDC;text-align: center;">
                      <div class="form-group">
                        <label >Nombre</label>
                        <label name ="nombre" class="form-control">
                          {{$seleccionado->nombre}} {{ $seleccionado->ap_paterno }} {{ $seleccionado->ap_materno }}
                        </label>
                      </div>
                      <div class="form-group">
                        <label>RFC</label>
                        <label name ="RFC" class="form-control">
                          {{$seleccionado->RFC}}
                        </label>
                      </div>  
                      <div class="form-group">
                        <label>Relacion laboral</label>
                        <label name ="Tcontrato" class="form-control">
                          @if($seleccionado->Tcontrato=='base')
                            PERSONAL DE BASE
                          @elseif($seleccionado->Tcontrato=='contrato')
                            PERSONAL DE CONTRATO
                          @elseif($seleccionado->Tcontrato=='nombremientoConfianza')
                            NOMBRAMIENTO CONFIANZA
                          @elseif($seleccionado->Tcontrato=='mandosMedios')
                            MANDOS MEDIOS
                          @elseif($seleccionado->Tcontrato=='contratoConfianza')
                            CONTRATO CONFIANZA
                          @endif 
                        </label>
                      </div> 
                      <div class="form-group">
                        <label>Categoria</label>
                        <label name ="Tcontrato" class="form-control">
                          {{$seleccionado->puesto}}
                        </label>
                      </div>
                      <div class="form-group">
                        <label>Departamento</label>
                        <label name ="Tcontrato" class="form-control">
                          {{$seleccionado->departamento}}
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
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

      </div>
    </div> 
  </body>
</html>