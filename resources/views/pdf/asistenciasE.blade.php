<h1 style="text-align: center">
    Asistencia por Empleados
</h1>
<div class="table-responsive">
    <table class="table table-dark ">
        <thead class="thead-light">
            <tr>
                <th scope="col">
                    #Empleado
                </th>
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
                <th>
                    {{$Empleado->id}}
                </th>
                <td>
                    {{$Empleado->nombre}}
                </td>
                <td>
                    {{$Empleado->RFC}}
                </td>
                <td>
                    {{$Empleado->fecha}}
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
