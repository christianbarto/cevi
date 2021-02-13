<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reloj;
use App\Empleado;
use Carbon\Carbon;
use Jenssegers\Date\Date;

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
        $date = Carbon::now()->toDateString();
        $dateEnd = Carbon::now()->addDay(5)->toDateString();
        $Relojs = Reloj::all();
        $lengh = Empleado::count();
        $Empleados = Empleado::all();
        for($i=0;$i<$lengh;$i++){
            $fecha=$Empleados[$i]->fecha_alta;
            $fecha=$fecha->addYear(5)->toDateString();
            if($dateEnd>=$fecha && $fecha>=$date){
                $nombre = $Empleados[$i]->nombre.' '.$Empleados[$i]->ap_paterno.' '.$Empleados[$i]->ap_materno;
                toastr()->warning("El empleado $nombre Esta proximo a cumplir un periodo de quinquenio <br /><br /><button type='button' >Ok</button>",
                           "",['positionClass' => 'toast-bottom-left','closeButton'=>true,'timeOut'=>0,
                           'extendedTimeOut'=>0]);
                

                return view('HomeAdmin')->with('Relojs',$Relojs);
            }
        }
    return view('HomeAdmin')->with('Relojs',$Relojs);

    }
}
