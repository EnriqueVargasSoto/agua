<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Perfil;
use App\Models\Rol;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function createUser(){
        $perfil = Perfil::create([
            'nombres' => 'Edwin',
            'email' => 'admin@gmail.com',
            'estado' => 'activo'
        ]);

        $user = User::create([
            'idPerfil' => $perfil->id,
            'idRol' => 1,
            'usuario' => 'admin',
            'password' => bcrypt(123456),
            'estado' => 'activo'
        ]);
    }
    
    public function login(Request $request){
        $user = User::where('usuario',$request->usuario)->first();
        $logueado = false;

        if (Hash::check($request->password, $user->password)) {
            Auth::login($user);
            $logueado = true;
        }

        if ($logueado == true) {
            return redirect()->route('dashboard');
        } else {
            return back();
        }
        
    }

    public function dashboard(){
        return view('admin.pages.dashboard');
    }

    public function index()
    {
        $usuarios = User::where('idRol',2)->get();
        return view('admin.pages.usuarios.usuario')->with(compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario = User::find($id);
        $usuario->delete();

        return back();
    }

    public function cambiaEstado($id){

        $usuario = User::find($id);
        if ($usuario->estado == 'activo') {
            $usuario->estado = 'inactivo';
        } else {
            $usuario->estado = 'activo';
        }
        $usuario->save();
        
        return back();
    }
}
