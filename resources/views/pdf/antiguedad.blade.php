<img height="90" src="img/CEVILOGO2020.jpg" width="428" style="margin-top:0px;"></img>
<h4 style="text-align: left;">
    Generado: {{Date::parse(now())->format('j \d\e F \d\e Y')}}<br>
    Usuario: {{Auth::user()->name}}
</h4>
<h3>
    Antigüedad de Empleados
</h3>
    <table  border="1" align="center" cellspacing="0" cellpadding="1" style="text-align: center;">
        <thead>
            <tr>
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
                    {{Date::parse($Empleado->fecha_alta)->format('j \d\e F \d\e Y')}}
                </td>
                <td>
                    {{Date::parse($Empleado->fecha_alta)->age}} Años
                    
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
