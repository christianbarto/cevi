<img height="90" src="img/CEVILOGO2020.jpg" width="428" style="margin-top:0px;"></img>
<h4 style="text-align: left;">
    Generado: {{Date::parse(now())->format('j \d\e F \d\e Y')}}<br>
    Usuario: {{Auth::user()->name}}
</h4>
<h3 >Asistencia del periodo:<br>
Del {{Date::parse($inicio)->format('j \d\e F \d\e Y')}} al {{Date::parse($fin)->format('j \d\e F \d\e Y')}}</h3>
                <table border="1" align="center" cellspacing="0" cellpadding="1" style="text-align: center;">
                    <thead>
                        <tr>
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