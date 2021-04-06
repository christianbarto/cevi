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
<img height="90" src="img/CEVILOGO2020.jpg" width="428" style="margin-top:0px;"></img>
<h3 style="text-align: center;">
    Asistencias por Empleado
</h3>
<h4 style="text-align: right;">
    Generado: {{Date::parse(now())->format('j \d\e F \d\e Y')}}<br>
    Usuario: {{Auth::user()->name}}
</h4>
    <table border="1" align="center" cellspacing="0" cellpadding="1" style="text-align: center;">
                    <thead>
                        <tr class="color">
                            <th scope="col">
                                RFC
                            </th>
                            <th scope="col">
                                Nombre(s)
                            </th>
                            <th scope="col">
                                Ap. Paterno
                            </th>
                            <th scope="col">
                                Ap. Materno
                            </th>
                            <th scope="col">
                                Fecha
                            </th>
                            <th scope="col">
                                Hora Entrada
                            </th>
                            <th scope="col">
                                Hora salida
                            </th>
                            <th scope="col">
                                Incidencia
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($empleados as $empleado)
                        <tr>
                            <td>
                                {{$empleado->RFC}}
                            </td>
                            <td>
                                {{$empleado->nombre}}
                            </td>
                            <td>
                                {{$empleado->ap_paterno}}
                            </td>
                            <td>
                                {{$empleado->ap_materno}}
                            </td>
                            <td>
                                {{Date::parse($empleado->fecha)->format('j \d\e F \d\e Y')}}
                            </td>
                            <td>
                                @if(($empleado->entrada)===('00:00:00'))
                                    N/A
                                @else
                                    {{Date::parse($empleado->entrada)->isoFormat('h:mm A')}}   
                                @endif                            
                            </td>
                            <td>
                                @if(($empleado->salida)===('00:00:00'))
                                    N/A
                                @else
                                    {{Date::parse($empleado->salida)->isoFormat('h:mm A')}}
                                @endif
                            </td>
                            <td>
                                {{$empleado->incidencia}}
                            </td>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
</body>