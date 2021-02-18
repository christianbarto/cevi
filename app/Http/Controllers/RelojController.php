<?php

namespace App\Http\Controllers;

use App\Reloj;
use App\Imports\RelojImport;
use Maatwebsite\Excel\Facades\Excel; 
use Illuminate\Http\Request;


class relojController extends Controller
{
    public function index()
    {
      $Relojes = $Relojs = Reloj::orderBy('fecha','desc')->Paginate(10);;
      return view('Reloj/IndexXml')->with('Relojes',$Relojes);
    }

    public function import(Request $request)
    {
     $request->validate([
            'Excel' => 'required',
           ]);

      $file = $request->file('Excel');
      Excel::import(new RelojImport,$file);

      return back()->with('message','Importacion de usuarios completada');
    }

    public function importxml(Request $request)
    {
      $incidencia=null;
      $request->validate([
            'xml' => 'required|mimes:application/xml,xml'],
           ['xml.required' => 'Selecciona Un Documento']
         );
      $control = simplexml_load_file($request->xml);  
      //dd($control);    
      $total_empleados=count($control->CONTROL);
      //echo $total_empleados;

      for($x=0;$x<$total_empleados;$x++)
      {
         $fecha   = $control->CONTROL[$x]->fecha;
         $fecha   = substr($fecha, 0, 10);
         $entrada = $control->CONTROL[$x]->MAE;
         $entrada = substr($entrada, 11, 18);
         $salida  = $control->CONTROL[$x]->MAS;
         $salida  = substr($salida, 11, 18);
         $id      = $control->CONTROL[$x]->id;
         $RFC     = $control->CONTROL[$x]->rfc;
         $nombre  = $control->CONTROL[$x]->Nombre;



         $incidenciaentrada = $control->CONTROL[$x]->MAEIT;
         $incidenciasalida  = $control->CONTROL[$x]->MASIT;

         if (strcmp($incidenciaentrada,$incidenciasalida) === 0){
          $incidencia = $incidenciasalida;
          }else{
          $incidencia = 'Entrada:'.$incidenciaentrada.' - '.' Salida: '.$incidenciasalida;   
          }

          Reloj::create([
            'id'         => $id,
            'RFC'        => $RFC,
            'nombre'     => $nombre,
            'entrada'    => $entrada,
            'salida'     => $salida,
            'fecha'      => $fecha,
            'incidencia' => $incidencia,
            
        ]);

      
      }
      return back()->with('message','Importacion de usuarios completada');
    }

}
