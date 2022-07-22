<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleCiclo extends Model
{
    use HasFactory;

    protected $table = 'detalle_ciclo';
    protected $fillable = [
        'id',
        'idCiclo',
        'idSuministro',
        'precio',
        'cantidad',
        'total',
        'estado'
    ];
}
