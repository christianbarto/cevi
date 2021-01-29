<div style="text-align:center;">
    <h1>
        Usuarios
    </h1>
</div>
<div style="text-align:center;">
    <table class="table table-dark">
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
