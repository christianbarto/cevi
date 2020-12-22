<?php

namespace App\Http\Controllers;

class EmpleadoController extends Controller
{
    public function formulario()
    {
        return view('RegistrarUsuario');
    }

    public function RegistrarEmpleado()
    {
        return view('RegistrarEmpleado');
    }

    public function store()
    {
        return request();
    }
}
