<?php
namespace App\Http\Controllers;

use App\Empleado;
use App\User;
use App\Reloj;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Jenssegers\Date\Date;
use Illuminate\Support\Facades\Hash;
use \PDF;

class ReportesController extends Controller
{
     public function __construct()
     {
       Date::setLocale('es');
     }

     public function index()
     {
       return view('Reportes/IndexReportes');
     }

     public function usuarios()
     {
       $usuarios = User::all();
       $pdf = PDF::loadView('pdf/IndexUser',compact('usuarios'));
       return $pdf->stream('Reporte de Usuarios.pdf');
     }

     public function empleadosA()
     {
       $empleados = Empleado::all();
       $pdf = PDF::loadView('pdf/IndexEmpleadoA',compact('empleados'));
       return $pdf->stream('Reporte de Empleados.pdf');
     }

     public function empleadosI()
     {
       $empleados = Empleado::all();
       $pdf = PDF::loadView('pdf/IndexEmpleadoI',compact('empleados'));
       return $pdf->stream('Reporte de Empleados.pdf');
     }

     public function asistenciasE(Request $request)
     {
       $nombre=$request->nombre;
       $empleados = DB::table('relojs')->Where('nombre','like','%'.$nombre.'%')->get();
       $pdf = PDF::loadView('pdf/asistenciasE',compact('empleados'));
       return $pdf->stream('Reporte por Empleado.pdf');
     }

     public function asistenciasP(Request $request)
     {
       $inicio=$request->inicio;
       $fin=$request->fin;
       $Relojes = DB::table('relojs')->whereBetween('fecha',[$inicio,$fin])->get();
       $pdf = PDF::loadView('pdf/asistenciasP',compact('Relojes','inicio','fin'));
                     
       return $pdf->stream('Reporte por Periodo.pdf');
     }
}
