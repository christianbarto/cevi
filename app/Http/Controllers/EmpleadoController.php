<?php

namespace App\Http\Controllers;

use App\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\BD;

class EmpleadoController extends Controller
{
     public function index()
    {
        $empleados = Empleado::all();
        return view('Empleados/IndexEmpleado')->with('empleados',$empleados);
    }

    public function create()
    {
        return view('Empleados/createEmpleados');
    }

    public function show ($id)
    {
        $empleados = Empleado::findOrFail($id);
        return view('Empleados/showEmpleado',compact('empleados'));
    }

    public function store(Request $request)
    {
        $urlAvatar='/storage/avatardefalut.png';
        $request->validate([
            'contrato'      => 'required',
            'creden_elect'  => 'required',
            'acta_nac'      => 'required',
            'curriculum'    => 'required',
            'solicitud'     => 'required',
            'cert_medico'   => 'required',
            'cart_recomend' => 'required',
            'fotografia'    => 'required',
            'const_Noinhab' => 'required',
            'comp_Dom'      => 'required',
            'licencia'      => 'required',
            'nss'           => 'required',
            'infonavit'     => 'required',
            'rfc_doc'       => 'required',
            'cartilla'      => 'required',
            'curp'          => 'required',
            'diploma'       => 'required',
        ]);
        if ($request->file('avatar') != null) {
            $avatar    = $request->file('avatar')->store('public');
            $urlAvatar = Storage::url($avatar);
        }

        $contrato    = $request->file('contrato')->store('public');
        $urlcontrato = Storage::url($contrato);

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

        $licencia    = $request->file('licencia')->store('public');
        $urllicencia = Storage::url($licencia);

        $nss    = $request->file('nss')->store('public');
        $urlnss = Storage::url($nss);

        $infonavit    = $request->file('infonavit')->store('public');
        $urlinfonavit = Storage::url($infonavit);

        $rfc_doc    = $request->file('rfc_doc')->store('public');
        $urlrfc_doc = Storage::url($rfc_doc);

        $cartilla    = $request->file('cartilla')->store('public');
        $urlcartilla = Storage::url($cartilla);

        $curp    = $request->file('curp')->store('public');
        $urlcurp = Storage::url($curp);

        $diploma    = $request->file('diploma')->store('public');
        $urldiploma = Storage::url($diploma);

        Empleado::create([
            'id'            => request('id'),
            'fecha_alta'    => request('fecha_alta'),
            'RFC'           => request('RFC'),
            'telefono'      => request('telefono'),
            'genero'        => request('genero'),
            'ap_paterno'    => request('ap_paterno'),
            'ap_materno'    => request('ap_materno'),
            'nombre'        => request('nombre'),
            'correo'        => request('correo'),
            'puesto'        => request('puesto'),
            'Tcontrato'     => request('Tcontrato'),
            'avatar'        => $urlAvatar,
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
        ]);
        return redirect('/IndexEmpleado');

    }

    public function edit($id)
    {

    }

    public function destroy($id)
    {

    }

    public function update(Request $request, User $user)
    {

    }
}
