<?php

namespace App\Http\Controllers\Usuario;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Suministro;

class SuministroController extends Controller
{
    public function index(){
        $suministros = Suministro::where('idUsuario', auth()->user()->id)->get();
        
        return view('usuario.pages.suministros')->with(compact('suministros'));
    }
}
