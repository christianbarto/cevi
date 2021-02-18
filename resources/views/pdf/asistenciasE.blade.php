<img height="140" src="img/CEVILOGO2020.jpg" width="460"></img>
<h1 style="text-align: center">
    Asistencia por Empleado
</h1>
<div class="table-responsive">
    <table border="1" style="margin: 0 auto;">
        <thead class="thead-light">
            <tr>
                <th scope="col">
                    Nombre(s)
                </th>
                <th scope="col">
                    RFC
                </th>
                <th scope="col">
                    Fecha
                </th>
                <th scope="col">
                    Hora de entrada
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
            @foreach($empleados as $Empleado)
            <tr>
                <td>
                    {{$Empleado->nombre}}
                </td>
                <td>
                    {{$Empleado->RFC}}
                </td>
                <td>
                    {{Date::parse($Empleado->fecha)->format('l j \d\e F \d\e Y')}}
                </td>
                <td>
                    {{$Empleado->entrada}}
                </td>
                <td>
                    {{$Empleado->salida}}
                </td>
                <td>
                    {{$Empleado->incidencia}}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
