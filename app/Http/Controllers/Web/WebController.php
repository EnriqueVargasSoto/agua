<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
}
