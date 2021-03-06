<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reclamo extends Model
{
    use HasFactory;

    protected $table = 'reclamos';
    protected $fillable = [
        'id',
        'idUsuario',
        'asunto',
        'mensaje',
        'dni',
        'codigoSuministro'
    ];
}
