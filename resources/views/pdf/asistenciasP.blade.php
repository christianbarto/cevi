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
        Asistencias por Periodo
    </h3>
    <h4 style="text-align: right;">
        <div style="text-align: left;">
            <a href="{{ asset('/IndexReportes') }}">
            <button style="background: #D4E6F1;border-radius: 7px;">Atras</button>
            </a>
            <form action="{{ asset('/AsistenciasP/Exportar')}}" method="get">
                <input type="hidden" name="inicio" value={{$inicio}}></input>
                <input type="hidden" name="fin" value={{$fin}}></input>
                <button  type="submit" style="background: #D4E6F1;border-radius: 7px;margin-top: 10px;">
                    Descargar
                </button>
            </form>
        </div>
        Generado: {{Date::parse(now())->format('j \d\e F \d\e Y')}}<br>
        Usuario: {{Auth::user()->name}}
    </h4>
    <h4 >Periodo:<br>
    {{Date::parse($inicio)->format('j \d\e F \d\e Y')}} al {{Date::parse($fin)->format('j \d\e F \d\e Y')}}</h4>
                    <table border="1" align="center" cellspacing="0" cellpadding="1" style="text-align: center;">
                        <thead >
                            <tr class="color">
                                <th scope="col">
                                    Fecha
                                </th>
                                <th scope="col">
                                    RFC
                                </th>
                                <th scope="col">
                                    Nombre
                                </th>
                                <th scope="col">
                                    Apellido Paterno
                                </th>
                                <th scope="col">
                                    Apellido Materno
                                </th>
                                <th scope="col">
                                    Hora de Entrada
                                </th>
                                <th scope="col">
                                    Hora de salida
                                </th>
                                <th scope="col">
                                    Incidencia
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($Relojes as $Reloj)
                            <tr>
                                <td>
                                    {{Date::parse($Reloj->fecha)->format('j \d\e F \d\e Y')}}
                                </td>
                                <td>
                                    {{$Reloj->RFC}}
                                </td>
                                <td>
                                    {{$Reloj->nombre}}
                                </td>
                                <td>
                                    {{$Reloj->ap_paterno}}
                                </td>
                                <td>
                                    {{$Reloj->ap_materno}}
                                </td>
                                <td>
                                    @if(($Reloj->entrada)===('00:00:00'))
                                        N/A
                                    @else
                                    {{Date::parse($Reloj->entrada)->isoFormat('h:mm A')}}      
                                    @endif                            
                                </td>
                                <td>
                                    @if(($Reloj->salida)===('00:00:00'))
                                        N/A
                                    @else
                                    {{Date::parse($Reloj->salida)->isoFormat('h:mm A')}}   
                                    @endif
                                </td>
                                <td>
                                    {{$Reloj->incidencia}}
                                </td>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
</body>                