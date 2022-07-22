<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Perfil;
use App\Models\Suministro;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Recibo;
use App\Models\Reclamo;
use Consulta\Laravel\Consulta;

class WebController extends Controller
{
    public function index(){
        return view('web.pages.index');
    }

    public function nosotros(){
        return view('web.pages.nosotros');
    }

    public function comite(){
        return view('web.pages.comite');
    }

    public function contactanos(){
        return view('web.pages.contactanos');
    }

    public function formAfiliado(){
        return view('web.pages.form');
    }

    public function buscarPersona($dni){
        //$person = Consulta::reniec()->find('70848421');
        $token = 'apis-token-1.aTSI1U7KEuT-6bbbCguH-4Y8TI6KS73N';
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.apis.net.pe/v1/dni?numero=' . $dni,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
              'Referer: http://apis.net.pe/api-ruc',
              'Authorization: Bearer ' . $token
            ),
          ));

        $respuesta  = curl_exec($curl);
        curl_close($curl);

        $leer_respuesta = json_decode($respuesta, true);

        return $leer_respuesta;
    }

    public function reclamos(){
        return view('web.pages.reclamos');
    }

    public function buscar(Request $request){
        $suministro = Suministro::where('codigo', $request->codigo)->first();
        if ($suministro != null) {
            $usuario = User::find($suministro->idUsuario);
            $perfil = Perfil::find($usuario->idPerfil);

            $recibos = Recibo::where('idSuministro', $suministro->id)->get();
            
            return view('web.pages.resultado')->with(compact('suministro', 'usuario', 'perfil','recibos'));
        } else {
            return view('web.pages.error1');
        }
        
    }

    public function reclamoStore(Request $request){
        Reclamo::create([
            'nombres' => $request->nombres,
            'email' => $request->email,
            'asunto' => $request->asunto,
            'mensaje' => $request->mensaje
        ]);

        return back();
    }

}
