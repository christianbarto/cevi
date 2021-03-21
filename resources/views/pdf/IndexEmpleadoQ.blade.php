<head>
<style type="text/css">
    .color{
        background-color: #D4EFDF;
    }
    tr:nth-child(even){
        background-color: #ddd;
    }
</style>
</head>
<body>
<img height="90" src="img/CEVILOGO2020.jpg" width="428" style="margin-top:0px;"></img>
<h3 style="text-align: center;">
    Todos los Empleados y sus Quinquenios
</h3>
<h4 style="text-align: right;">
    Generado: {{Date::parse(now())->format('j \d\e F \d\e Y')}}<br>
    Usuario: {{Auth::user()->name}}
</h4>
    <table border="1" align="center" cellspacing="0" cellpadding="1" style="text-align: center;">
        <thead >
            <tr class="color">
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
                    Quinquenios
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($empleados as $Empleado)
            @if($Empleado->quinquenio>0)
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
                    {{$Empleado->quinquenio}}
                </td>
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>
</body>