<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HitorialMedida extends Model
{
    use HasFactory;

    protected $table = 'historial_medida';
    protected $fillable = [
        'id',
        'idSuministro',
        'montoInicio',
        'montoFin',
        'total'
    ];
}
