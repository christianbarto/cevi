<?php

namespace App\Exports;

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
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class RelojExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('pdf/asistenciasP');
    }
}
