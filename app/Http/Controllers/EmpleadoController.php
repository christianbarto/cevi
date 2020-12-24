<?php

namespace App\Http\Controllers;

class EmpleadoController extends Controller
{
    public function index()
    {
        return view('Empleados/createEmpleados');
    }

    public function store(Request $request)
    {
        User::create([
            'name'     => request('name'),
            'email'    => request('email'),
            'password' => bcrypt(request('password')),
            'role_id'  => request('role_id'),
        ]);
        return redirect('/usuarios');
    }

    public function edit($id)
    {
        $usuarios = User::findOrFail($id);
        return view('user/EditarUsuario', compact('usuarios'));
    }

    public function destroy($id)
    {
        User::destroy($id);
        return redirect('/usuarios');

    }

    public function update(Request $request, User $user)
    {
        $request->merge([
            'password' => Hash::make($request->input('password')),
        ]);
        $user->update($request->all());
        return redirect('/usuarios');
    }
}
