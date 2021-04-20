<html>
  <head>
    <title></title>
    <meta content="">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Exo&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script type="text/javascript" src="{{ asset('js/detalleTitulo.js') }}"></script>
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
      <p class="lead">
      <h3>Nuevo registro de evento</h3>
      <a class="btn btn-default"  href="{{ asset('/Evento/index') }}">Atras</a></p>
      @if (count($errors) > 0)
        <div class="alert alert-danger">
         <button type="button" class="close" data-dismiss="alert">×</button>
         <ul>
          @foreach ($errors->all() as $error)
           <li>{{ $error }}</li>
          @endforeach
         </ul>
        </div>
       @endif
       @if ($message = Session::get('success'))
       <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>{{ $message }}</strong>
       </div>
       @endif
      <div class="col-md-6">
        <form action="{{ asset('/Evento/create/') }}" method="post">
          @csrf
          <div class="fomr-group">
            <label>Titulo</label>
            <select class="form-control" id="titulo" name="titulo" onChange="detalleTitulo()" required>
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
            <label>Detalle Titulo</label>
            <select class="form-control" id="detalle" name="detalle" value=""></select>
          </div>
          <div class="fomr-group" style="margin-top: 10px;">
            <label>Empleado</label>
            <select class="form-control" id="empleado" name="empleado" value="" required>
              <option value="" >
                Seleccione un empleado
              </option>
              @foreach($empleados as $empleado)
                <option value="{{$empleado->id}}">
                  {{$empleado->nombre}} {{$empleado->ap_paterno}} {{$empleado->ap_materno}}
                </option>
              @endforeach
            </select>
          </div>
          <div class="fomr-group" style="margin-top: 10px;">
            <label>Descripcion</label>
            <input type="text" class="form-control" name="descripcion" 
            required value="{{old('titulo')}}" onkeyup="javascript:this.value=this.value.toUpperCase();">
          </div>
          <div class="form-row"  style="margin-top: 10px;">
            <label>Periodo:</label>
            <div class="fomr-group" style="margin-top: 30px;margin-right: 10px;">
              <label>Fecha Inicio</label>
              <input type="date" class="form-control" name="fecha_inicio" min={{now()}} value={{now()}}>
            </div>
            <div class="fomr-group" style="margin-top: 30px;">
              <label>Fecha Fin</label>
              <input type="date" class="form-control" name="fecha_fin" min={{now()}} value={{now()}}>
            </div>
          </div>
          <br>
          <input type="submit" class="btn btn-info" value="Guardar">
        </form>
      </div>
    </div>
</body>
</html>