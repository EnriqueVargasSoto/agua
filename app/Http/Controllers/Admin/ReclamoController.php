<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reclamo;

class ReclamoController extends Controller
{
    public function index(){
        $reclamos = Reclamo::all();
        return view('admin.pages.reclamos.index')->with(compact('reclamos'));
    }

    public function create(){
        return view('usuario.pages.reclamos');
    }

    public function misReclamos(){
        $reclamos = Reclamo::where('idUsuario', auth()->user()->id)->get();
        return view('')->with(compact('reclamos'));
    }

    public function store(Request $request){
        $reclamo = Reclamo::create([
            'idUsuario' => auth()->user()->id,
            'asunto' => $request->asunto,
            'mensaje' => $request->mensaje,
        ]);

        return redirect()->route('reclamos.create');
    }
}
