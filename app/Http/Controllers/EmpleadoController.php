<?php

namespace App\Http\Controllers;

class EmpleadoController extends Controller
{
    public function index()
    {
        return view('Empleados/createEmpleados');
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
