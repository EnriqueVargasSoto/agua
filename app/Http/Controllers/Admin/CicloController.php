<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ciclo;
use App\Models\Concepto;
use App\Models\DetalleCiclo;
use App\Models\Suministro;
use App\Models\User;

class CicloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ciclos = Ciclo::all();
        return view('admin.pages.ciclos.ciclos')->with(compact('ciclos'));
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
        $ciclo = Ciclo::create([
            'anio' => $request->anioNew,
            'mes' => $request->mesNew,
            'estado' => '0'
        ]);

        $usuarios = User::where('idRol', '2')->get();
        $suministros = Suministro::all();

        $concepto = Concepto::where('concepto', 'Precio metro cúbico')->first();

        foreach ($suministros as $key => $suministro) {


            DetalleCiclo::create([
                'idCiclo' => $ciclo->id,
                'idSuministro' => $suministro->id,
                'precio' => $concepto->valor,
                'cantidad' =>  0.0,
                'total' => 0.0
            ]);
        }

        return back();
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
        $ciclo = Ciclo::find($id);
        $ciclo->delete();

        return back();
    }
}
