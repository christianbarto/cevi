<h1 style="text-align: center">
    Antiguedad de los empleados
</h1>
<div class="table-responsive">
    <table class="table table-dark ">
        <thead class="thead-light">
            <tr>
                <th scope="col">
                    N° de Empleado
                </th>
                <th scope="col">
                    Nombre
                </th>
                <th scope="col">
                    Fecha de ingreso
                </th>
                <th scope="col">
                    Antiguedad
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($Empleados as $Empleado)
            <tr>
                <th>
                    {{$Empleado->id}}
                </th>
                <td>
                    {{$Empleado->nombre}} {{$Empleado->ap_paterno}} {{$Empleado->ap_materno}}
                </td>
                <th>
                    {{Date::parse($Empleado->fecha_alta)->format('l j \d\e F \d\e Y')}}
                </th>
                <td>
                    {{Date::parse($Empleado->fecha_alta)->age}} Años
                    
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
