<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Perfil;
use App\Models\Recibo;
use App\Models\User;
use App\Models\Suministro;
use App\Models\Concepto;
use Carbon\Carbon;

class PerfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $solicitudes = Perfil::where('estadoPago', 'pendiente')->get();
        return view('admin.pages.usuarios.solicitudes')->with(compact('solicitudes'));
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
    {   //dd($request);
        if($request->hasFile("imgDniFront")){
            $file = $request->file('imgDniFront');
            $imgDniFront = $file->getClientOriginalName();
            $ruta = "img/dni/";
            // dd($ruta);
            $file->move($ruta,$imgDniFront);
            //copy($imagen->getRealPath(),$ruta.$nombreimagen);
            
            // $imagen = $nombreimagen;            
            
        }
        if($request->hasFile("imgDniBack")){
            $file = $request->file('imgDniBack');
            $imgDniBack = $file->getClientOriginalName();
            $ruta = "img/dni/";
            // dd($ruta);
            $file->move($ruta,$imgDniBack);
            //copy($imagen->getRealPath(),$ruta.$nombreimagen);
            
            // $imagen = $nombreimagen;            
            
        }
        if($request->hasFile("imgEscritura")){
            $file = $request->file('imgEscritura');
            $imgEscritura = $file->getClientOriginalName();
            $ruta = "img/escritura/";
            // dd($ruta);
            $file->move($ruta,$imgEscritura);
            //copy($imagen->getRealPath(),$ruta.$nombreimagen);
            
            // $imagen = $nombreimagen;            
            
        }
        $perfil = Perfil::create([
            'nombres' => $request->nombres,
            'apellidoPaterno' => $request->apellidoPaterno,
            'apellidoMaterno' => $request->apellidoMaterno,
            'dni' => $request->dni,
            'imgDniFront' => $imgDniFront,
            'imgDniBack' => $imgDniBack,
            'direccion' => $request->direccion,
            'idDepartamento' => $request->idDepartamento,
            'idProvincia' => $request->idProvincia,
            'idDistrito' => $request->idDistrito,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'imgEscritura' => $imgEscritura,
            'estado' => 'inactivo',
            'estadoPago' => 'pendiente'
        ]);

        return redirect()->route('/');
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
        $perfil = Perfil::find($id);
        $perfil->delete();

        return back();
    }

    public function activaUsuario($id){

        $date = Carbon::now();
        $fechaActual = $date->format('Y-m-d');
        //dd($date->format('Y-m-d'));

        $perfil = Perfil::find($id);
        $perfil->estado = 'activo';
        $perfil->estadoPago = 'pagado';
        $perfil->save();

        $user = User::create([
            'idPerfil' => $perfil->id,
            'idRol' => 2,
            'usuario' => $perfil->dni,
            'password' => bcrypt($perfil->dni),
            'estado' => 'activo',
        ]);

        $suministros = Suministro::all();
        $indice = count($suministros) + 1;
        //$numerito = count($suministros);
        $numeroConCeros = str_pad($indice, 5, "0", STR_PAD_LEFT);
        //dd($numeroConCeros);

        $suministro = Suministro::create([
            'numero' => $indice,
            'codigo' => $numeroConCeros,
            'idUsuario' => $user->id,
            'direccion' => $perfil->direccion,
            'estado' => 'activo',
        ]);

        $concepto = Concepto::where('concepto','Pago de inscripcion')->first();
        
        $recibo = Recibo::create([
            'idSuministro' => $suministro->id,
            'concepto' => 'Pago por instalacion de suministro',
            'cantidad' => 1,
            'valor' => $concepto->valor,
            'total' => $concepto->valor * 1,
            'fechaEmision' => $fechaActual,
            'estado' => 'pendiente',
            'fechaVencimiento' => date("Y-m-d", strtotime($fechaActual."+ 1 week")),
        ]);

        return back();
    }
}
