<h1>Asistencia del periodo:</h1>
<h2>{{Date::parse($inicio)->format('l j \d\e F \d\e Y')}} al {{Date::parse($fin)->format('l j \d\e F \d\e Y')}}</h2>
<div class="table-responsive">
            <table class="table table-dark ">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">
                            #
                        </th>
                        <th scope="col">
                            Nombre
                        </th>
                        <th scope="col">
                            RFC
                        </th>
                        <th scope="col">
                            Fecha
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
                        <th>
                            {{$loop->iteration}}
                        </th>
                        <td>
                            {{$Reloj->nombre}}
                        </td>
                        <td>
                            {{$Reloj->RFC}}
                        </td>
                        <td>
                            {{Date::parse($Reloj->fecha)->format('l j \d\e F \d\e Y')}}
                        </td>
                        <td>
                            @if(($Reloj->entrada)===('00:00:00'))
                            
                                N/A
                            
                            @else
                            
                                {{$Reloj->entrada}}
                               
                            @endif                            
                        </td>
                        <td>
                            @if(($Reloj->salida)===('00:00:00'))
                            
                                N/A
                            
                            @else
                            
                                {{$Reloj->salida}}

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