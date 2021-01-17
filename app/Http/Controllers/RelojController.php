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
      $Relojes = Reloj::all();
      return view('Reloj/IndexReloj')->with('Relojes',$Relojes);
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
}
