<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Incidencia extends Model
{
    protected $fillable = [
        'id','RFC', 'nombre','incidencia',
    ];
}
