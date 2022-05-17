<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Suministro;
use App\Models\Recibo;
use App\Models\Concepto;
use Carbon\Carbon;

class SuministroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suministros = Suministro::all();
        return view('admin.pages.suministros.suministros')->with(compact('suministros'));
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
        $date = Carbon::now();
        $fechaActual = $date->format('Y-m-d');

        $suministros = Suministro::all();
        $indice = count($suministros) + 1;
        //$numerito = count($suministros);
        $numeroConCeros = str_pad($indice, 5, "0", STR_PAD_LEFT);
        //dd($numeroConCeros);

        $suministro = Suministro::create([
            'numero' => $indice,
            'codigo' => $numeroConCeros,
            'idUsuario' => $request->idUsuario,
            'direccion' => $request->direccion,
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
        //
    }
}
