<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Departamentos;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Jenssegers\Date\Date;

class DepartamentosController extends Controller
{
    public function __construct()
       {
          Date::setLocale('es');
       }

    public function index()
    
    {
        $departamentos = Departamentos::orderBy('departamentos.id','asc')->get();
        return view('Departamentos/IndexDepartamentos')->with('departamentos',$departamentos);
    }
     
    public function create()
    {   
        return view('Departamentos/createDepartamentos');
    }

    public function search(Request $request)
    {   $departamentos=null;
        $seleccion = $request->seleccion;
        $valor = $request->search;
        if($seleccion==='id')
            $departamentos = Departamentos::orderBy('departamentos.id','asc')->Where('id','like','%'.$valor.'%')->get();
        if($seleccion==='descripcion')
            $departamentos = Departamentos::orderBy('departamentos.id','asc')->Where('descripcion','like','%'.$valor.'%')->get();
        
        return view('Departamentos/IndexDepartamentos', compact('departamentos'));
    }

    public function store(Request $request)
    {
        $verifiDescripcion = Departamentos::Where('descripcion','like',$request->descripcion)->count();
        $verifiId          = Departamentos::Where('id','like',$request->id)->count();
        if($verifiDescripcion>0){   
            return back()->with('verifi','El departamento: "'.$request->descripcion.'" '.' Ya esta registrado')->withInput();
        }

        if($verifiId>0){   
            return back()->with('verifi','El Id: '.$request->id.' Ya esta registrado')->withInput();
        }

        Departamentos::create([
            'id'          => request('id'),
            'descripcion' => request('descripcion'),
        ]);
        return redirect('/IndexDepartamento');
    }

    public function update(Request $request, $id)
    {
        $Departamentos = Departamentos::findOrFail($id);

        $Departamentos->update($request->only('descripcion'));

        return redirect('/IndexDepartamento');
    }

    public function destroy($id)
    {
        Departamentos::destroy($id);
        return redirect('/IndexDepartamento')->with('eliminar','ok');

    }

}
