<?php

namespace App\Http\Controllers\Usuario;

use App\Http\Controllers\Controller;
use App\Models\Perfil;
use Illuminate\Http\Request;
use App\Models\Recibo;
use App\Models\Suministro;
use App\Models\User;
use PDF;

class ReciboController extends Controller
{
    public function listarRecibos($id){
        $recibos = Recibo::where('idSuministro', $id)->get();
        return $recibos;
    }

    public function verRecibo($id) {
        $recibo = Recibo::find($id);
        $suministro = Suministro::find($recibo->idSuministro);
        $usuario = User::find($suministro->idUsuario);
        $perfil = Perfil::find($usuario->idPerfil);
        $data = [
            'numeroSuministro' => $suministro->codigo,
            'nombres' => $perfil->nombres.' '.$perfil->apellidoPaterno.' '.$perfil->apellidoMaterno,
            'emitido' => $recibo->fechaEmision,
            
        ];
          
        //$pdf = PDF::loadView('web.pages.recibo-pdf', $data);
    
        return PDF::loadView('web.pages.recibo-pdf', $data)->stream('archivo.pdf');//$pdf->download('itsolutionstuff.pdf');
    }
}
