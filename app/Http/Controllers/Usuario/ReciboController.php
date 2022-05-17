<?php

namespace App\Http\Controllers\Usuario;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Recibo;

class ReciboController extends Controller
{
    public function listarRecibos($id){
        $recibos = Recibo::where('idSuministro', $id)->get();
        return $recibos;
    }
}
