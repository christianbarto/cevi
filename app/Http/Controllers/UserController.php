<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function formulario()
    {
        return view('/user/RegistrarUsuario');
    }

    public function store(Request $request)
    {
        $verifiUsername = User::Where('email','like','%'.$request->email.'%')->count();

        if($verifiUsername>0){   
            return back()->with('verifi','El Usuario '.$request->email.' Ya esta registrado')->withInput();
        }
        User::create([
            'name'          => request('name'),
            'ap_paterno'    => request('ap_paterno'),
            'ap_materno'    => request('ap_materno'),
            'email'         => request('email'),
            'password'      => bcrypt(request('password')),
            'role_id'       => request('role_id'),
        ]);
        return redirect('/usuarios');
    }

    public function index()
    {
        $usuarios = User::all();
        return view('user/IndexUser',compact('usuarios'));
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
