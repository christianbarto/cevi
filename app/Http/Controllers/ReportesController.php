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
       set_time_limit(300); 
       return $pdf->stream('Reporte de Usuarios.pdf');
     }

     public function empleadosA()
     {
       $empleados = Empleado::all();
       $pdf = PDF::loadView('pdf/IndexEmpleadoA',compact('empleados'));
       set_time_limit(300); 
       return $pdf->stream('Reporte de Empleados.pdf');
     }

     public function empleadosI()
     {
       $empleados = Empleado::all();
       $pdf = PDF::loadView('pdf/IndexEmpleadoI',compact('empleados'));
       set_time_limit(300); 
       return $pdf->stream('Reporte de Empleados.pdf');
     }

     public function asistenciasE(Request $request)
     {
       $nombre=$request->nombre;
       $empleados = DB::table('relojs')->Where('nombre','like','%'.$nombre.'%')->orderBy('fecha','desc')->get();
       $pdf = PDF::loadView('pdf/asistenciasE',compact('empleados'));
       set_time_limit(300); 
       return $pdf->stream('Reporte por Empleado.pdf');
     }

     public function asistenciasP(Request $request)
     {
       $inicio=$request->inicio;
       $fin=$request->fin;
       $Relojes = DB::table('relojs')->whereBetween('fecha',[$inicio,$fin])->get();
       $pdf = PDF::loadView('pdf/asistenciasP',compact('Relojes','inicio','fin'));
        set_time_limit(300);          
       return $pdf->download('Reporte por Periodo.pdf');
     }

     public function asistenciasEP(Request $request)
     {
       $nombre=$request->nombre;
       $inicio=$request->inicio;
       $fin=$request->fin;
       $Relojes = DB::table('relojs')->whereBetween('fecha',[$inicio,$fin])->where('nombre','LIKE','%'.$nombre.'%')->get();
       $pdf = PDF::loadView('pdf/asistenciasEP',compact('Relojes','inicio','fin','nombre'));
       set_time_limit(300);         
       return $pdf->stream('Reporte por Periodo.pdf');
     }

     public function antiguedad()
     {
        $Empleados = Empleado::all();
        $pdf = PDF::loadView('pdf/antiguedad',compact('Empleados'));
        set_time_limit(300); 
        return $pdf->stream('Reporte de antiguedad de empleados.pdf');
     }

     public function antiguedadE(Request $request)
     {
        $seleccion = $request->seleccion;
        $valor = $request->search;
        if($seleccion==='id')
            $Empleados = Empleado::orderBy('empleados.id','asc')->Where('id','like','%'.$valor.'%')->get();
        if($seleccion==='nombre')
            $Empleados = Empleado::orderBy('empleados.id','asc')->Where('nombre','like','%'.$valor.'%')->get();
        if($seleccion==='RFC')
            $Empleados = Empleado::orderBy('empleados.id','asc')->Where('RFC','like','%'.$valor.'%')->get();
        if($seleccion==='materno')
            $Empleados = Empleado::orderBy('empleados.id','asc')->Where('ap_materno','like','%'.$valor.'%')->get();
        if($seleccion==='paterno')
            $Empleados = Empleado::orderBy('empleados.id','asc')->Where('ap_paterno','like','%'.$valor.'%')->get();

        $pdf = PDF::loadView('pdf/antiguedad', compact('Empleados'));
        set_time_limit(300); 
        return $pdf->stream('Reporte de antiguedad de empleados.pdf');
     }
}
