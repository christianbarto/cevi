<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Reloj;
use App\User;
use App\Empleado;
use Carbon\Carbon;
use App\Event;
use Jenssegers\Date\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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
        if(Auth::User()->respuesta == null)
        {
            return view('user/cambioContrasena');
        }
        else{
            $date = Carbon::now();
            $Relojs = Reloj::orderBy('fecha','asc')->get();
            $Empleados = Empleado::all();
            $lengh = Empleado::count();
            for($i=0;$i<$lengh;$i++){
                if($Empleados[$i]->estatus=='activo'){
                    if($Empleados[$i]->Tcontrato=='base' 
                    || $Empleados[$i]->Tcontrato=='nombremientoConfianza'
                    || $Empleados[$i]->Tcontrato=='mandosMedios'){
                        if(!$Empleados[$i]->fecha_nombramiento==null){
                            $fecha=$Empleados[$i]->fecha_nombramiento;
                            $diff=$date->diff($fecha);
                            $diferencia=$diff->y;
                            settype($diferencia, 'int');
                            $total = $diferencia / 5;
                            $entero = explode('.',$total);
                            $quinquenio = $entero[0];
                            if($Empleados[$i]->quinquenio<$quinquenio){
                                $Empleado = Empleado::findOrFail($Empleados[$i]->id);
                                $Empleado->quinquenio=$quinquenio;
                                $Empleado->save();
                            }
                        }
                    }
                }
            }
            $eventos = Event::all();
            foreach ($eventos as $evento) {
                if($evento->fecha==date('Y-m-d')){
                   toastr()->info("Tienes un evento programado para el dia de hoy: <a href='Evento/details/$evento->id' >$evento->titulo</a> <br /><br /><button class='btn-success' type='button' >Ok</button>",
                            "",['positionClass' => 'toast-bottom-left','closeButton'=>true,'timeOut'=>0,
                            'extendedTimeOut'=>0]);
                }
            }
            
            return view('HomeAdmin',compact('Relojs','Empleados'));
        }
                                    
    }
             // if($dateBefore>=$fecha && $fecha>=$date){
             //     $nombre = $Empleados[$i]->nombre.' '.$Empleados[$i]->ap_paterno.' '.$Empleados[$i]->ap_materno;
             //     toastr()->warning("El empleado $nombre Esta proximo a cumplir un periodo de quinquenio <br /><br /><button type='button' >Ok</button>",
             //                "",['positionClass' => 'toast-bottom-left','closeButton'=>true,'timeOut'=>0,
             //                'extendedTimeOut'=>0]);
    
}
