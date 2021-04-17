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
      $Relojes = $Relojs = Reloj::orderBy('fecha','asc')->orderBy('nombre', 'asc')->get();
      return view('Reloj/IndexXml')->with('Relojes',$Relojes);
    }

    public function importxml(Request $request)
    {
      $incidencia=null;
      $request->validate([
            'xml' => 'required|mimes:xml'],
           ['xml.required' => 'Selecciona Un Documento'],
         );
      $control = simplexml_load_file($request->xml);  
      $total_empleados=count($control->CONTROL);
      for($x=0;$x<$total_empleados;$x++)
      {
         $nombre = '';
         $ap_paterno = '';
         $ap_materno = '';
         $fecha   = $control->CONTROL[$x]->fecha;
         $fecha   = substr($fecha, 0, 10);
         $entrada = $control->CONTROL[$x]->MAE;
         $entrada = substr($entrada, 11, 18);
         $salida  = $control->CONTROL[$x]->MAS;
         $salida  = substr($salida, 11, 18);
         $id      = $control->CONTROL[$x]->id;
         $RFC     = $control->CONTROL[$x]->rfc;
         $name  = $control->CONTROL[$x]->Nombre;

         $RFC = strtoupper($RFC);
         $porciones = explode(" ", trim($name));
         $total_porciones = sizeof($porciones);

          if($total_porciones<3){
            $ap_paterno = $porciones[0];
            $nombre     = $porciones[1];
          }elseif($porciones[0]=='DE'){
            $ap_paterno = $porciones[0].' '.$porciones[1].' '.$porciones[2];
            $ap_materno = $porciones[3];
            $nombre     = $porciones[4];
          }elseif($total_porciones==3){
            $ap_paterno = $porciones[0];
            $ap_materno = $porciones[1];
            $nombre     = $porciones[2];
          }elseif($total_porciones==4){
            $ap_paterno = $porciones[0];
            $ap_materno = $porciones[1];
            $nombre     = $porciones[2].' '.$porciones[3];
          }elseif($total_porciones==5){
            $ap_paterno = $porciones[0];
            $ap_materno = $porciones[1];
            $nombre     = $porciones[2].' '.$porciones[3].' '.$porciones[4];
          }elseif($total_porciones==6){
            $ap_paterno = $porciones[0];
            $ap_materno = $porciones[1];
            $nombre     = $porciones[2].' '.$porciones[3].' '.$porciones[4].' '.$porciones[5];
          }

         $incidenciaentrada = $control->CONTROL[$x]->MAEIT;
         $incidenciasalida  = $control->CONTROL[$x]->MASIT;

          if (strcmp($incidenciaentrada,$incidenciasalida) === 0){
            $incidencia = $incidenciasalida;
          }else{
            $incidencia = 'Entrada:  '.$incidenciaentrada.'-'.'Salida:  '.$incidenciasalida;   
          }

          Reloj::create([
            'RFC'        => $RFC,
            'nombre'     => $nombre,
            'ap_materno' => $ap_materno,
            'ap_paterno' => $ap_paterno,
            'entrada'    => $entrada,
            'salida'     => $salida,
            'fecha'      => $fecha,
            'incidencia' => $incidencia,
            
         ]);

      
      }

      return back()->with('message','Importación de asistencias completada');
    }

}
