<img height="90" src="img/CEVILOGO2020.jpg" width="428" style="margin-top:0px;"></img>
<h4 style="text-align: left;">
    Generado: {{Date::parse(now())->format('j \d\e F \d\e Y')}}<br>
    Usuario: {{Auth::user()->name}}
</h4>
<h3>
    Usuarios Activos
</h3>
    <table border="1" align="center" cellspacing="0" cellpadding="1" style="text-align: center;">
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
                    Correo
                </th>
                <th scope="col">
                    Role
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($usuarios as $User)
            <tr>
                <td>
                    {{$User->name}}
                </td>
                <td>
                    {{$User->ap_paterno}}
                </td>
                <td>
                    {{$User->ap_materno}}
                </td>
                <td>
                    {{$User->email}}
                </td>
                <td>
                    @if(($User->role_id) > 1)
                                    Administrador
                                @else
                                    Usuario
                                @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
