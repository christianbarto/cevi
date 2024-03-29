<?php
namespace App\Http\Controllers;

use App\Empleado;
use App\Departamentos;
use App\User;
use App\Reloj;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Jenssegers\Date\Date;
use Illuminate\Support\Facades\Hash;
use \PDF;
use Mpdf\Mpdf;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\RelojExport;


class ReportesController extends Controller
{
     public function __construct()
     {
       Date::setLocale('es');
     }

     public function index()
     {
       $departamentos = Departamentos::orderBy('departamentos.descripcion')->get();
       return view('Reportes/IndexReportes',compact('departamentos'));
     }

     public function usuarios()
     {
       $usuarios = User::all();
       $pdf = PDF::loadView('pdf/IndexUser',compact('usuarios'));
       set_time_limit(300); 
       return $pdf->setPaper('a4', 'landscape')->stream('Reporte de Usuarios.pdf');
     }

     public function empleadosA()
     {
       $empleados = Empleado::all();
       $pdf = PDF::loadView('pdf/IndexEmpleadoA',compact('empleados'));
       set_time_limit(300); 
       return $pdf->setPaper('a4', 'landscape')->stream('Reporte de Empleados Activos.pdf');
     }

     public function empleadosI()
     {
       $empleados = Empleado::all();
       $pdf = PDF::loadView('pdf/IndexEmpleadoI',compact('empleados'));
       set_time_limit(300); 
       return $pdf->setPaper('a4', 'landscape')->stream('Reporte de Empleados.pdf');
     }

     public function asistenciasE(Request $request)
     {
       $nombre=$request->nombre;
       $empleados = DB::table('relojs')->Where('nombre','like','%'.$nombre.'%')
                                       ->Where('ap_paterno','like','%'.$request->ap_paterno.'%')
                                       ->Where('ap_materno','like','%'.$request->ap_materno.'%')
                                       ->orderBy('fecha','desc')->get();
       $pdf = PDF::loadView('pdf/asistenciasE',compact('empleados'));
       set_time_limit(300); 
       return $pdf->setPaper('a4', 'landscape')->stream('Reporte por Empleado.pdf');
     }

     public function asistenciasP(Request $request)
     {
       $inicio=$request->inicio;
       $fin=$request->fin;
       if($inicio>$fin){
        return back()->with('verifi','La fecha de inicio es mayor a la fecha final')->withInput();
       }
       $Relojes = Reloj::orderBy('relojs.fecha','asc')->whereBetween('fecha',[$inicio,$fin])->get();
       ini_set("pcre.backtrack_limit", "10000000");
       return view('pdf/asistenciasP',compact('Relojes','inicio','fin')); 
     }

     public function asistenciasPExportar(Request $request)
     {
       $inicio=$request->inicio;
       $fin=$request->fin;
       $Relojes = Reloj::orderBy('relojs.fecha','asc')->whereBetween('fecha',[$inicio,$fin])->get();
       $html = view('pdf/asistenciasP',compact('Relojes','inicio','fin'))->render();
       ini_set("pcre.backtrack_limit", "10000000");
       $mpdf = new \Mpdf\Mpdf(["format" => "A4-L"]);
       $mpdf->WriteHTML($html);
       $mpdf->Output('Reporte por Periodo.pdf',"D");
     }

     public function asistenciasEP(Request $request)
     {
       $nombre=strtoupper($request->nombre).' '.strtoupper($request->ap_paterno).' '.strtoupper($request->ap_materno);
       $inicio=$request->inicio;
       $fin=$request->fin;
       $ap_paterno = $request->ap_paterno;
       $ap_materno = $request->ap_materno;
       $Relojes = DB::table('relojs')->whereBetween('fecha',[$inicio,$fin])
                                     ->where('nombre','LIKE','%'.$request->nombre.'%')
                                     ->Where('ap_paterno','like','%'.$request->ap_paterno.'%')
                                     ->Where('ap_materno','like','%'.$request->ap_materno.'%')->get();
       return view('pdf/asistenciasEP',compact('Relojes','inicio','fin','nombre','ap_paterno','ap_materno')); 
     }

     public function asistenciasEPExportar(Request $request)
     {
       $nombre=strtoupper($request->nombre).' '.strtoupper($request->ap_paterno).' '.strtoupper($request->ap_materno);
       $inicio=$request->inicio;
       $fin=$request->fin;
       $ap_paterno = $request->ap_paterno;
       $ap_materno = $request->ap_materno;
       $Relojes = DB::table('relojs')->whereBetween('fecha',[$inicio,$fin])
                                     ->where('nombre','LIKE','%'.$request->nombre.'%')
                                     ->Where('ap_paterno','like','%'.$request->ap_paterno.'%')
                                     ->Where('ap_materno','like','%'.$request->ap_materno.'%')->get();
       $pdf = PDF::loadView('pdf/asistenciasEP',compact('Relojes','inicio','fin','nombre','ap_paterno','ap_materno'));        
       return $pdf->setPaper('a4', 'landscape')->download('Reporte por Periodo y Empleado.pdf');
     }

     public function antiguedad()
     {
        $Empleados = Empleado::orderBy('nombre','asc')->get();
        $pdf = PDF::loadView('pdf/antiguedadT',compact('Empleados'));
        set_time_limit(300); 
        return $pdf->setPaper('a4', 'landscape')->stream('Reporte de antiguedad de empleados.pdf');
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

        return view('pdf/antiguedad', compact('Empleados','valor','seleccion')); 
     }

     public function antiguedadEExportar(Request $request)
     {
        $seleccion = $request->seleccion;
        $valor = $request->valor;

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

        $pdf = PDF::loadView('pdf/antiguedad', compact('Empleados','valor','seleccion'));
        set_time_limit(300); 
        return $pdf->setPaper('a4', 'landscape')->download('Reporte de antiguedad del empleado '.$valor.'.pdf');
     }

     public function empleadosQuinquenio()
     {
       $empleados = Empleado::all();
       $pdf = PDF::loadView('pdf/IndexEmpleadoQ',compact('empleados'));
       set_time_limit(300); 
       return $pdf->setPaper('a4', 'landscape')->stream('Reporte de Quinquenios.pdf');
     }

     public function empleadosDepartamento(Request $request)
     {
      $departamento=$request->departamento;
      $empleados = Empleado::all();
      return view('pdf/IndexEmpleadoD',compact('empleados','departamento'));
     }

     public function empleadosDepartamentoExportar($departamento)
     {
        $empleados = Empleado::all();
        $html = view('pdf/IndexEmpleadoD',compact('empleados','departamento'))->render();
        ini_set("pcre.backtrack_limit", "10000000");
        $mpdf = new \Mpdf\Mpdf(["format" => "A4-L"]);
        $mpdf->WriteHTML($html);
        $mpdf->Output('Reporte empleados de cada departamento.pdf',"D");
     }

     public function empleadosDepartamentoT(Request $request)
     {
        $empleados = Empleado::all();
        $departamentos = Departamentos::orderBy('departamentos.descripcion')->get();
        $html = view('pdf/IndexEmpleadoTD',compact('empleados','departamentos'))->render();
        ini_set("pcre.backtrack_limit", "10000000");
        $mpdf = new \Mpdf\Mpdf(["format" => "A4-L"]);
        $mpdf->WriteHTML($html);
        $mpdf->Output('Reporte empleados de cada departamento.pdf',"I");
     }
}
  