<?php

namespace App\Http\Controllers;

use App\Empleado;
use App\Departamentos;
use App\files;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Jenssegers\Date\Date;

class EmpleadoController extends Controller
{
    public function __construct()
    {
       Date::setLocale('es');
    }
    

     public function index()
    
    {
        $empleados = Empleado::all();
        $departamentos = Departamentos::all();
        return view('Empleados/IndexEmpleado',compact('empleados','departamentos'));
    }

    public function create()
    {   
        $departamentos = Departamentos::all();
        return view('Empleados/createEmpleados',compact('departamentos'));
    }

    public function show (Request $request)
    {
        $empleados = Empleado::findOrFail($request->id);
        $adicionales = DB::table('files')->Where('empleado_id','like','%'.$empleados->RFC.'%')->get();
        $seleccion = null;
        $extra = null;
        $nombre = null;
        $campo='default';
        return view('Empleados/showEmpleado',compact('empleados','seleccion','campo','adicionales','extra','nombre'));
    }

    public function documento(Request $request)
    {
        $empleados = Empleado::findOrFail($request->idF);
        $adicionales = DB::table('files')->Where('empleado_id','like','%'.$empleados->RFC.'%')->get();
        $campo = $request->seleccion;
        $seleccion = $empleados->$campo;
        $extra = null;
        $nombre = null;
        return view('Empleados/showEmpleado',compact('empleados','seleccion','campo','adicionales','extra','nombre'));
    }

    public function documentoAdicional(Request $request)
    {
        $empleados = Empleado::findOrFail($request->adi);
        $adicionales = DB::table('files')->Where('empleado_id','like','%'.$empleados->RFC.'%')->get();
        $extra = $request->select;
        $fichero = DB::table('files')->Where('dir','like','%'.$extra.'%')->get();
        $conteo= DB::table('files')->Where('dir','like','%'.$extra.'%')->count();
        $seleccion = null;
        $campo='default';
        $nombre = null;
        if($conteo>0){
            $nombre = $fichero[0]->nombre;
        }
        return view('Empleados/showEmpleado',compact('empleados','seleccion','campo','adicionales','extra','nombre'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'Tcontrato' => 'required'
         ]);

        $verifiName = Empleado::Where('nombre','like',$request->nombre)
                                            ->Where('ap_paterno','like','%'.$request->ap_paterno.'%')
                                            ->Where('ap_materno','like','%'.$request->materno.'%')->count();
        $verifiRFC = DB::table('empleados')->Where('RFC','like','%'.$request->RFC.'%')->count();

        if($verifiName>0){   
            return back()->with('verifi',$request->nombre.' '.$request->ap_paterno.' '.$request->ap_materno.' Ya esta registrado')->withInput();
        }

        if($verifiRFC>0){   
            return back()->with('verifi','El RFC: '.$request->RFC.' Ya esta registrado')->withInput();
        }

        $fecha_actual = Carbon::now();
        $fecha_tope   = Carbon::now()->subYears(40);
        if($request->fecha_alta>$fecha_actual || $request->fecha_alta<$fecha_tope){
            return back()->with('verifi','Fecha de alta Invalida')->withInput();
        }

        if($request->fecha_nombramiento != null){
            if($request->fecha_nombramiento>$fecha_actual || $request->fecha_nombramiento<$fecha_tope){
                return back()->with('verifi','Fecha de nombramiento Invalida')->withInput();
            }
        }

        $validacion = strtoupper($request->RFC);
        if ($this->validarRFC($validacion)==0) {
                return back()->with('verifi','RFC Invalido')->withInput();
            }

        $idEmpleado = $request->RFC;

        if ($request->hasFile('contrato')) {
            $contrato    = $request->file('contrato')->store('public');
            $urlcontrato = Storage::url($contrato);
        }else{
            $urlcontrato = null;
        }

        $creden_elect    = $request->file('creden_elect')->store('public');
        $urlcreden_elect = Storage::url($creden_elect);

        $acta_nac    = $request->file('acta_nac')->store('public');
        $urlacta_nac = Storage::url($acta_nac);

        $curriculum    = $request->file('curriculum')->store('public');
        $urlcurriculum = Storage::url($curriculum);

        $solicitud    = $request->file('solicitud')->store('public');
        $urlsolicitud = Storage::url($solicitud);

        $cert_medico    = $request->file('cert_medico')->store('public');
        $urlcert_medico = Storage::url($cert_medico);

        $cart_recomend    = $request->file('cart_recomend')->store('public');
        $urlcart_recomend = Storage::url($cart_recomend);

        $fotografia    = $request->file('fotografia')->store('public');
        $urlfotografia = Storage::url($fotografia);

        $const_Noinhab    = $request->file('const_Noinhab')->store('public');
        $urlconst_Noinhab = Storage::url($const_Noinhab);

        $comp_Dom    = $request->file('comp_Dom')->store('public');
        $urlcomp_Dom = Storage::url($comp_Dom);

        if ($request->hasFile('licencia')) {
            $licencia    = $request->file('licencia')->store('public');
            $urllicencia = Storage::url($licencia);
        }else{
            $urllicencia = null;
        }

        $nss    = $request->file('nss')->store('public');
        $urlnss = Storage::url($nss);

        if ($request->hasFile('infonavit')) {
            $infonavit    = $request->file('infonavit')->store('public');
            $urlinfonavit = Storage::url($infonavit);
        }else{
            $urlinfonavit = null;
        }

        $rfc_doc    = $request->file('rfc_doc')->store('public');
        $urlrfc_doc = Storage::url($rfc_doc);

        if ($request->hasFile('cartilla')) {
            $cartilla    = $request->file('cartilla')->store('public');
            $urlcartilla = Storage::url($cartilla);
        }else{
            $urlcartilla = null;
        }

        $curp    = $request->file('curp')->store('public');
        $urlcurp = Storage::url($curp);

        $diploma    = $request->file('diploma')->store('public');
        $urldiploma = Storage::url($diploma);

        if ($request->hasFile('nombramiento')) {
            $nombramiento    = $request->file('nombramiento')->store('public');
            $urlnombramiento = Storage::url($nombramiento);
        }else{
            $urlnombramiento = null;
        }

        $dictamen    = $request->file('dictamen')->store('public');
        $urldictamen = Storage::url($dictamen);

        if ($request->hasFile('adicionales')) {
            $file=$request->file('adicionales');
            $adicionales = Storage::putFileAs('/public/'.$idEmpleado,$file,
                                $file->getClientOriginalName());
            $urladicionales = Storage::url($adicionales);
            files::create([
                'nombre'      => $file->getClientOriginalName(),
                'empleado_id' => $idEmpleado,
                'dir'         => $urladicionales,

            ]);
        }

        Empleado::create([
            'fecha_alta'    => request('fecha_alta'),
        'fecha_nombramiento'=> request('fecha_nombramiento'),
            'RFC'           => $validacion,
            'telefono'      => request('telefono'),
            'genero'        => request('genero'),
            'ap_paterno'    => request('ap_paterno'),
            'ap_materno'    => request('ap_materno'),
            'nombre'        => request('nombre'),
            'correo'        => request('correo'),
            'puesto'        => request('puesto'),
            'Tcontrato'     => request('Tcontrato'),
            'departamento'  => request('departamento'),
            'contrato'      => $urlcontrato,
            'creden_elect'  => $urlcreden_elect,
            'acta_nac'      => $urlacta_nac,
            'curriculum'    => $urlcurriculum,
            'solicitud'     => $urlsolicitud,
            'cert_medico'   => $urlcert_medico,
            'cart_recomend' => $urlcart_recomend,
            'fotografia'    => $urlfotografia,
            'const_Noinhab' => $urlconst_Noinhab,
            'comp_Dom'      => $urlcomp_Dom,
            'licencia'      => $urllicencia,
            'nss'           => $urlnss,
            'infonavit'     => $urlinfonavit,
            'rfc_doc'       => $urlrfc_doc,
            'cartilla'      => $urlcartilla,
            'curp'          => $urlcurp,
            'diploma'       => $urldiploma,
            'dictamen'      => $urldictamen ,        
            'nombramiento'  => $urlnombramiento,
        ]);
        return redirect('/IndexEmpleado');

    }


    public function disable(Request $request,$id)
    {   
        $fecha_actual = Carbon::now();
        $fecha_tope   = Carbon::now()->subYears(40);
        if($request->fecha_baja<=$fecha_actual && $request->fecha_baja>=$fecha_tope){
            $Empleado = Empleado::findOrFail($id);
            $Empleado->estatus='inactivo';
            $Empleado->fecha_baja = $request->fecha_baja;
            $Empleado->causa_baja = $request->causa_baja;
            $Empleado->save();
            return redirect('/IndexEmpleado');
        }else{
            return back()->with('verifi','Fecha de baja invalida')->withInput();
        }
    }

    public function enable($id)
    {
        $Empleado = Empleado::findOrFail($id);
        $Empleado->estatus='activo';
        $Empleado->save();
        return redirect('/IndexEmpleado');
    }

    public function search(Request $request)
    {   
        $seleccion = $request->seleccion;
        $valor = $request->search;
        if($seleccion==='id')
            $empleados = Empleado::orderBy('empleados.id','asc')->Where('id','like','%'.$valor.'%')->get();
        if($seleccion==='nombre')
            $empleados = Empleado::orderBy('empleados.id','asc')->Where('nombre','like','%'.$valor.'%')->get();
        if($seleccion==='RFC')
            $empleados = Empleado::orderBy('empleados.id','asc')->Where('RFC','like','%'.$valor.'%')->get();
        if($seleccion==='materno')
            $empleados = Empleado::orderBy('empleados.id','asc')->Where('ap_materno','like','%'.$valor.'%')->get();
        if($seleccion==='paterno')
            $empleados = Empleado::orderBy('empleados.id','asc')->Where('ap_paterno','like','%'.$valor.'%')->get();
        $departamentos = Departamentos::all();
        return view('Empleados/IndexEmpleado', compact('empleados','departamentos'));

    }

    public function update(Request $request, $id)
    {
        $Empleado = Empleado::findOrFail($id);
        $empleadoRFC = $Empleado->RFC;
        $fecha_actual = Carbon::now();
        $fecha_tope   = Carbon::now()->subYears(40);
        
            if($request->fecha_alta>$fecha_actual || $request->fecha_alta<$fecha_tope){
                return back()->with('verifi','Fecha de alta Invalida')->withInput();
            }

            if($request->fecha_nombramiento != null){
                if($request->fecha_nombramiento>$fecha_actual || $request->fecha_nombramiento<$fecha_tope){
                    return back()->with('verifi','Fecha de nombramiento Invalida')->withInput();
                }
            }
            $validar=strtoupper($request->RFC);
            if ($this->validarRFC($validar)==0) {
                return back()->with('verifi','RFC Invalido')->withInput();
            }
        
        if ($request->hasFile('contrato')) {
            $contrato    = $request->file('contrato')->store('public');
            $urlcontrato = Storage::url($contrato);
        }else{
            $urlcontrato = $Empleado->contrato;
        }

        if ($request->hasFile('creden_elect')) {
            $creden_elect    = $request->file('creden_elect')->store('public');
            $urlcreden_elect = Storage::url($creden_elect);
        }else{
            $urlcreden_elect = $Empleado->creden_elect;
        }
        
        if ($request->hasFile('acta_nac')) {
            $acta_nac    = $request->file('acta_nac')->store('public');
            $urlacta_nac = Storage::url($acta_nac);
        }else{
            $urlacta_nac = $Empleado->acta_nac;
        }

        if ($request->hasFile('curriculum')) {
            $curriculum    = $request->file('curriculum')->store('public');
            $urlcurriculum = Storage::url($curriculum);
        }else{
            $urlcurriculum = $Empleado->curriculum;
        }

        if ($request->hasFile('solicitud')) {
            $solicitud    = $request->file('solicitud')->store('public');
            $urlsolicitud = Storage::url($solicitud);
        }else{
            $urlsolicitud = $Empleado->solicitud;
        }

        if ($request->hasFile('cert_medico')) {
            $cert_medico    = $request->file('cert_medico')->store('public');
            $urlcert_medico = Storage::url($cert_medico);
        }else{
            $urlcert_medico = $Empleado->cert_medico;
        }

        if ($request->hasFile('cart_recomend')) {
            $cart_recomend    = $request->file('cart_recomend')->store('public');
            $urlcart_recomend = Storage::url($cart_recomend);
        }else{
            $urlcart_recomend = $Empleado->cart_recomend;
        }

        if ($request->hasFile('fotografia')) {
            $fotografia    = $request->file('fotografia')->store('public');
            $urlfotografia = Storage::url($fotografia);
        }else{
            $urlfotografia = $Empleado->fotografia;
        }

        if ($request->hasFile('const_Noinhab')) {
            $const_Noinhab    = $request->file('const_Noinhab')->store('public');
            $urlconst_Noinhab = Storage::url($const_Noinhab);
        }else{
            $urlconst_Noinhab = $Empleado->const_Noinhab;
        }

        if ($request->hasFile('comp_Dom')) {
            $comp_Dom    = $request->file('comp_Dom')->store('public');
            $urlcomp_Dom = Storage::url($comp_Dom);
        }else{
            $urlcomp_Dom = $Empleado->comp_Dom;
        }

        if ($request->hasFile('licencia')) {
            $licencia    = $request->file('licencia')->store('public');
            $urllicencia = Storage::url($licencia);
        }else{
            $urllicencia = $Empleado->licencia;
        }

        if ($request->hasFile('nss')) {
            $nss    = $request->file('nss')->store('public');
            $urlnss = Storage::url($nss);
        }else{
            $urlnss = $Empleado->nss;
        }

        if ($request->hasFile('infonavit')) {
            $infonavit    = $request->file('infonavit')->store('public');
            $urlinfonavit = Storage::url($infonavit);
        }else{
            $urlinfonavit = $Empleado->infonavit;
        }

        if ($request->hasFile('rfc_doc')) {
            $rfc_doc    = $request->file('rfc_doc')->store('public');
            $urlrfc_doc = Storage::url($rfc_doc);
        }else{
            $urlrfc_doc = $Empleado->rfc_doc;
        }

        if ($request->hasFile('cartilla')) {
            $cartilla    = $request->file('cartilla')->store('public');
            $urlcartilla = Storage::url($cartilla);
        }else{
            $urlcartilla = $Empleado->cartilla;
        }

        if ($request->hasFile('curp')) {
            $curp    = $request->file('curp')->store('public');
            $urlcurp = Storage::url($curp);
        }else{
            $urlcurp = $Empleado->curp;
        }

        if ($request->hasFile('diploma')) {
            $diploma    = $request->file('diploma')->store('public');
            $urldiploma= Storage::url($diploma);
        }else{
            $urldiploma = $Empleado->diploma;
        }

        if ($request->hasFile('nombramiento')) {
            $nombramiento    = $request->file('nombramiento')->store('public');
            $urlnombramiento = Storage::url($nombramiento);
        }else{
            $urlnombramiento = $Empleado->nombramiento;
        }

        if ($request->hasFile('dictamen')) {
            $dictamen    = $request->file('dictamen')->store('public');
            $urldictamen = Storage::url($dictamen);
        }else{
            $urldictamen = $Empleado->dictamen;
        }

        if ($request->hasFile('adicional')) {
            $file=$request->file('adicional');
            $adicionales = Storage::putFileAs('/public/'.$empleadoRFC,$file,
                                $file->getClientOriginalName());
            $urladicional = Storage::url($adicionales);
            
            files::create([
                'nombre'      => $file->getClientOriginalName(),
                'empleado_id' => $empleadoRFC,
                'dir'         => $urladicional,

            ]);
        }
        if($request->Tcontrato==null && $request->departamento==null){
            $Empleado->update($request->only('fecha_alta','fecha_nombramiento','telefono',
            'ap_paterno','ap_materno','nombre','correo','puesto'));
        }elseif($request->departamento==null){
            $Empleado->update($request->only('fecha_alta','fecha_nombramiento','telefono',
            'ap_paterno','ap_materno','nombre','correo','Tcontrato','puesto'));
        }elseif($request->Tcontrato==null){
            $Empleado->update($request->only('fecha_alta','fecha_nombramiento','telefono',
            'ap_paterno','ap_materno','nombre','correo','puesto','departamento'));
        }elseif($request->Tcontrato!=null && $request->departamento!=null){
            $Empleado->update($request->only('fecha_alta','fecha_nombramiento','telefono',
            'ap_paterno','ap_materno','nombre','correo','puesto','Tcontrato','departamento'));
        }
        $genero=$request->genero;
        if($request->genero!=null){
            $Empleado->genero=$genero;
        }
        $RFC=strtoupper($request->RFC);
        $Empleado->RFC=$RFC;

        $Empleado->contrato         = $urlcontrato;
        $Empleado->creden_elect     = $urlcreden_elect;
        $Empleado->acta_nac         = $urlacta_nac;
        $Empleado->curriculum       = $urlcurriculum;
        $Empleado->solicitud        = $urlsolicitud;
        $Empleado->cert_medico      = $urlcert_medico;
        $Empleado->cart_recomend    = $urlcart_recomend;
        $Empleado->fotografia       = $urlfotografia;
        $Empleado->const_Noinhab    = $urlconst_Noinhab;
        $Empleado->comp_Dom         = $urlcomp_Dom;
        $Empleado->licencia         = $urllicencia;
        $Empleado->nss              = $urlnss;
        $Empleado->infonavit        = $urlinfonavit;
        $Empleado->rfc_doc          = $urlrfc_doc;
        $Empleado->cartilla         = $urlcartilla;
        $Empleado->curp             = $urlcurp;
        $Empleado->diploma          = $urldiploma;
        $Empleado->nombramiento     = $urlnombramiento;
        $Empleado->dictamen         = $urldictamen;
        $Empleado->save();
        return redirect('/IndexEmpleado');
    }

    public function validarRFC($rfc){
        $regex = '/^([A-ZÑ\x26]{3,4}([0-9]{2})(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1]))([A-Z\d]{3})?$/';
    return preg_match($regex, $rfc);
    }
}
