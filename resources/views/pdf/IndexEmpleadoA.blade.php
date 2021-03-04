<img height="90" src="img/CEVILOGO2020.jpg" width="428" style="margin-top:0px;"></img>
<h4 style="text-align: left;">
    Generado: {{Date::parse(now())->format('j \d\e F \d\e Y')}}<br>
    Usuario: {{Auth::user()->name}}
</h4>
<h3>
    Empleados Activos
</h3>
    <table border="1" align="center" cellspacing="0" cellpadding="1" style="text-align: center;">
        <thead class="thead-light">
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
                    Relacion Laboral
                </th>
                <th scope="col">
                    Departamento
                </th>
                <th scope="col">
                    Categoria
                </th>
                
            </tr>
        </thead>
        <tbody>
            @foreach($empleados as $Empleado)
            @if($Empleado->estatus == 'activo')
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
                    @if($Empleado->Tcontrato=='base')
                        PERSONAL DE BASE
                    @elseif($Empleado->Tcontrato=='contrato')
                        PERSONAL DE CONTRATO
                    @elseif($Empleado->Tcontrato=='nombremientoConfianza')
                        NOMBRAMIENTO CONFIANZA
                    @elseif($Empleado->Tcontrato=='mandosMedios')
                        MANDOS MEDIOS
                    @elseif($Empleado->Tcontrato=='contratoConfianza')
                        CONTRATO CONFIANZA
                    @endif                                    
                </td>
                <td>
                    {{$Empleado->departamento}}
                </td>
                <td>
                    {{$Empleado->puesto}}
                </td>
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>
