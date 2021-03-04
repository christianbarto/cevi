<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\EmpleadoController;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    /*public function __construct()
    {

        $this->middleware('guest')->except('logout');
    }*/
    
    protected $redirectTo = 'home';
    
}
