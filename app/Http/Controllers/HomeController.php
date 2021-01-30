<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reloj;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $Relojs = Reloj::all();
        return view('HomeAdmin')->with('Relojs',$Relojs);
    }
}
