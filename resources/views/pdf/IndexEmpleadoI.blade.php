<h1 class="text-center">
    Empleados Inactivos
</h1>
<div class="table-responsive">
    <table class="table table-dark ">
        <thead class="thead-light">
            <tr>
                <th scope="col">
                    #
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
                    Estatus
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($empleados as $Empleado)
            @if($Empleado->estatus == 'inactivo')
            <tr>
                <th>
                    {{$loop->iteration}}
                </th>
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
                    {{$Empleado->estatus}}
                </td>
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>
</div>