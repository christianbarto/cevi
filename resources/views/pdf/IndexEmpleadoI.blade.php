<img height="140" src="img/CEVILOGO2020.jpg" width="460"></img>
<h1 style="text-align: center">
    Empleados Inactivos
</h1>
<div class="table-responsive">
    <table border="1" style="margin: 0 auto;">
        <thead class="thead-light">
            <tr>
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
                    RFC
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($empleados as $Empleado)
            @if($Empleado->estatus == 'inactivo')
            <tr>
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
                    {{$Empleado->RFC}}
                </td>
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>
</div>