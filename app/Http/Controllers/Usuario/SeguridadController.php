<?php

namespace App\Http\Controllers\Usuario;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class SeguridadController extends Controller
{
    public function index(){
        $usuario = auth()->user();
        return view('usuario.pages.seguridad')->with(compact('usuario'));
    }

    public function updatePassword(Request $request){
        $usuario = User::find(auth()->user()->id);

        if ($request->password == $request->confirm) {
            $usuario->password = bcrypt($request->password);
            $usuario->save();
        } else {
            # code...
        }

        return back();
        
    }
}
