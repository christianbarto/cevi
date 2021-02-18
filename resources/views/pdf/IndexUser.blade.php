<img height="140" src="img/CEVILOGO2020.jpg" width="460"></img>
<div align="center">
    <h1>
        Usuarios
    </h1>
</div>
<div align="center">
    <table border="1" style="margin: 0 auto;">
        <thead class="thead-light">
            <tr>
                <th scope="col">
                    #
                </th>
                <th scope="col">
                    Nombre
                </th>
                <th scope="col">
                    Username
                </th>
                <th scope="col">
                    Role
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($usuarios as $User)
            <tr>
                <th>
                    {{$loop->iteration}}
                </th>
                <td>
                    {{$User->name}}
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
