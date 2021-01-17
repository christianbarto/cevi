<?php

namespace App\Imports;

use App\Reloj;
use Maatwebsite\Excel\Concerns\ToModel;

class RelojImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Reloj([
            'id'      => $row[0],
            'RFC'     => $row[1],
            'nombre'  => $row[2],
            'entrada' => $row[3],
            'salida'  => $row[4],
        ]);
    }
}
