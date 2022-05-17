<?php

namespace App\Http\Controllers\Usuario;

use App\Http\Controllers\Controller;
use App\Models\Perfil;
use App\Models\User;
use Illuminate\Http\Request;

class DatosController extends Controller
{
    public function index() {
        $perfil = Perfil::find(auth()->user()->idPerfil);
        $usuario = User::find(auth()->user()->id);
        return view('usuario.pages.datos')->with(compact('perfil', 'usuario'));
    }

    public function update(Request $request, $id){
        $perfil = Perfil::find($id);

        $perfil->nombres = $request->nombres;
        $perfil->dni = $request->dni;
        $perfil->email = $request->email;
        $perfil->direccion = $request->direccion;
        $perfil->idDepartamento = $request->idDepartamento;
        $perfil->idProvincia = $request->idProvincia;
        $perfil->idDistrito = $request->idDistrito;
        $perfil->save();

        return back();
    }
}
