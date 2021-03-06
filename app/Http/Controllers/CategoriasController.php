<?php

namespace App\Http\Controllers;

use App\Empleado;
use App\Departamentos;
use App\Categoria;
use App\files;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Jenssegers\Date\Date;

class CategoriasController extends Controller
{
    public function __construct()
       {
          Date::setLocale('es');
       }

    public function index()
    
    {
        $categorias = Categoria::orderBy('categorias.identificador','desc')->get();
        return view('Categorias/IndexCategorias',compact('categorias'));
    }
     
    public function search(Request $request)
    {   $categorias=null;
        $seleccion = $request->seleccion;
        $valor = $request->search;
        if($seleccion==='id'){
            $categorias = Categoria::orderBy('categorias.identificador','asc')->Where('identificador','like','%'.$valor.'%')->get();
           }
        if($seleccion==='descripcion'){
            $categorias = Categoria::orderBy('categorias.identificador','asc')->Where('descripcion','like','%'.$valor.'%')->get();
           }
        return view('Categorias/IndexCategorias',compact('categorias'));
    }

    public function store(Request $request)
    {
        $verifiDescripcion   = Categoria::Where('descripcion','like',$request->descripcion)->count();
        $verifiIdentificador = Categoria::Where('identificador','like',$request->identificador)->count();
        if($verifiDescripcion>0){   
            return back()->with('verifi','El departamento: "'.$request->descripcion.'" '.' Ya esta registrado')->withInput();
        }

        if($verifiIdentificador>0){   
            return back()->with('verifi','El Id: '.$request->identificador.' Ya esta registrado')->withInput();
        }

        Categoria::create([
            'identificador' => request('identificador'),
            'descripcion'   => request('descripcion'),
        ]);
        return redirect('/IndexCategorias');
    }

    public function update(Request $request, $id)
    {
        $Categoria = Categoria::findOrFail($id);

        $Categoria->update($request->only('descripcion'));

        return redirect('/IndexCategorias');
    }

    public function destroy($id)
    {
        Categoria::destroy($id);
        return redirect('/IndexCategorias');

    }
}
