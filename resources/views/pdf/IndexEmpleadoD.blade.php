<head>
<style type="text/css">
    .color{
        background-color: #D4EFDF;
    }
    tr:nth-child(even){
        background-color: #ddd;
    }
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
    <div class="container-fluid" style="margin-top:   50px;
                                        margin-right: 100px;
                                        margin-left:  100px;">
        <img height="90" src="img/CEVILOGO2020.jpg" width="428" style="margin-top:0px;"></img>
        <h3 style="text-align: center;">
            Empleados por Departamento <br>
        </h3>
        <h4 style="text-align: right;">
            <div style="text-align: left;">
                <a href="{{ asset('/IndexReportes') }}">
                    <button style="background: #D4E6F1;border-radius: 7px;">Atras</button>
                </a>
                <form action="{{ asset('/EmpleadosReportes/Exportar/'.$departamento)}}" method="get">
                    <button  type="submit" style="background: #D4E6F1;border-radius: 7px;margin-top: 10px;">
                        Descargar
                    </button>
                </form>
            </div>
            Generado: {{Date::parse(now())->format('j \d\e F \d\e Y')}}<br>
            Usuario: {{Auth::user()->name}}
        </h4>
        <h4>
            Departamento: <br>
            {{$departamento}}
        </h4>
        <table border="1" align="center" cellspacing="0" cellpadding="1" style="text-align: center;">
            <thead class="thead-light">
                <tr class="color">
                    <th scope="col">
                        RFC
                    </th>
                    <th scope="col">
                        Nombre(s)
                    </th>
                    <th scope="col">
                        Apellido Paterno
                    </th>
                    <th scope="col">
                        Apellido Materno
                    </th>
                    <th scope="col">
                        Relacion Laboral
                    </th>
                    <th scope="col">
                        Departamento
                    </th>
                    <th scope="col">
                        Categoria
                    </th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach($empleados as $Empleado)
                @if($Empleado->departamento==$departamento)
                <tr>
                    <td>
                        {{$Empleado->RFC}}
                    </td>
                    <td>
                        {{$Empleado->nombre}}
                    </td>
                    <td>
                        {{$Empleado->ap_paterno}}
                    </td>
                    <td>
                        {{$Empleado->ap_materno}}
                    </td>
                    <td>
                        @if($Empleado->Tcontrato=='base')
                            PERSONAL DE BASE
                        @elseif($Empleado->Tcontrato=='contrato')
                            PERSONAL DE CONTRATO
                        @elseif($Empleado->Tcontrato=='nombremientoConfianza')
                            NOMBRAMIENTO CONFIANZA
                        @elseif($Empleado->Tcontrato=='mandosMedios')
                            MANDOS MEDIOS
                        @elseif($Empleado->Tcontrato=='contratoConfianza')
                            CONTRATO CONFIANZA
                        @endif                                    
                    </td>
                    <td>
                        {{$Empleado->departamento}}
                    </td>
                    <td>
                        {{$Empleado->puesto}}
                    </td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
</body>