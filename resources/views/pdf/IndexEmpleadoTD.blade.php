<img height="90" src="img/CEVILOGO2020.jpg" width="428" style="margin-top:0px;"></img>
<h4 style="text-align: left;">
    Generado: {{Date::parse(now())->format('j \d\e F \d\e Y')}}<br>
    Usuario: {{Auth::user()->name}}
</h4>
<h3>
    Empleados de cada departamento
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
                    Departamento
                </th>      
                <th scope="col">
                    Total de Empleados
                </th>  
            </tr>
        </thead>
        <tbody>
           @foreach($departamentos as $departamento)
           @php
          $conteo=1;
         @endphp
             @foreach($empleados as $Empleado)
             @if($Empleado->departamento==$departamento->descripcion)
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
                     {{$Empleado->departamento}}
                 </td>
                 <td>
                     {{$conteo}}
                 </td>
                 @php
                  $conteo++;
                 @endphp
             </tr>
             @endif
             @endforeach
             {{$conteo}}
         @endforeach
        </tbody>
    </table>