<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    use HasFactory;
    
    protected $table = 'perfiles';
    protected $fillable = [
        'id',
        'nombres',
        'dni',
        'imgDniFront',
        'imgDniBack',
        'direccion',
        'idDepartamento',
        'idProvincia',
        'idDistrito',
        'email',
        'imgEscritura',
        'estado',
        'estadoPago',
        'apellidoPaterno',
        'apellidoMaterno',
        'telefono'
    ];
}
