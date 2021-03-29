<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class UserController extends Controller
{
    public function formulario()
    {
        return view('/user/RegistrarUsuario');
    }

    public function store(Request $request)
    {
        $verifiUsername = User::Where('email','like','%'.$request->email.'%')->count();
        $verifiName = User::Where('name','like',$request->name)
                          ->Where('ap_paterno','like','%'.$request->ap_paterno.'%')
                          ->Where('ap_materno','like','%'.$request->ap_materno.'%')->count();
        if($verifiName>0){   
            return back()->with('verifi',$request->name.' '.$request->ap_paterno.' '.$request->ap_materno.' Ya esta registrado')->withInput();
        }
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

    public function updateContrasena()
    {
        return view('user/cambioContrasena');
    }

    public function resetPassword()
    {
        return view('userResetPassword');
    }

    public function search(Request $request)
    {

        $verificador = DB::table('users')->Where('email','=',$request->usuario)->count();
        if($verificador>0)
        {   
            $usuario = DB::table('users')->Where('email','=',$request->usuario)->get();
            return view('user/ResetPassword',compact('usuario'));
        }
        else 
        {
            return back()->with('verifi',$request->usuario.' no se encuentra registrado')->withInput();
        }
    }

    public function submit(Request $request)
    {    
        $usuario = User::findOrFail($request->id);
        if($usuario->respuesta==$request->respuesta)
        {   
            return view('user/updatePassword',compact('usuario'));
        }
        else 
        {
            return back()->with('verifi','Respuesta incorrecta, intente denuevo')->withInput();
        }
    }

    public function recuperar(Request $request)
    {
        // Validar los datos
        $this->validate($request, [
            'password' => 'confirmed|min:6',
        ],
        ['password.confirmed'=>'Los campos de Contraseña deben ser iguales'],
        ['password.min'=>'La contraseña debe ser almenos de 6 caracteres']);
        // Note la regla de validación "confirmed", que solicitará que usted agregue un campo extra llamado password_confirm


        $user = $usuario = User::findOrFail($request->id);

        $password = bcrypt($request->password); // Encripte el password


        $user->password = $password; // Rellene el usuario con el nuevo password ya encriptado
        $user->pregunta = $request->pregunta;
        $user->respuesta = $request->respuesta;
        $user->save(); // Guarde el usuario
        return redirect('/login');
    }

    public function cambioContrasena(Request $request)
    {
        // Validar los datos
        $this->validate($request, [
            'password' => 'confirmed|min:6',
        ],
        ['password.confirmed'=>'Los campos de Contraseña deben ser iguales'],
        ['password.min'=>'La contraseña debe ser almenos de 6 caracteres']);
        // Note la regla de validación "confirmed", que solicitará que usted agregue un campo extra llamado password_confirm


        $user = Auth::user(); // Obtenga la instancia del usuario en sesión

        $password = bcrypt($request->password); // Encripte el password


        $user->password = $password; // Rellene el usuario con el nuevo password ya encriptado
        $user->pregunta = $request->pregunta;
        $user->respuesta = $request->respuesta;
        $user->save(); // Guarde el usuario
        return redirect('/home');
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
