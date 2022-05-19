<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gasto;
use Illuminate\Support\Str;

class GastoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gastos = Gasto::all();
        return view('admin.pages.gastos.index')->with(compact('gastos'));
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
        if($request->hasFile("documento")){

            $documento = $request->file("documento");
            $nombreDocumento = Str::slug($request->nombre).".".$documento->guessExtension();
            $ruta = public_path("gastos/");

            $documento->move($ruta,$nombreDocumento);
            //copy($imagen->getRealPath(),$ruta.$nombreimagen);

            //$post->imagen = $nombreimagen;            
            
        }
        $gasto = Gasto::create([
            'nombre' => $request->nombre,
            'monto' => $request->monto,
            'fecha' => $request->fecha,
            'responsable' => $request->responsable,
            'documento' => $nombreDocumento
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
        $gasto = Gasto::find($id);
        if($request->hasFile("documento")){

            $documento = $request->file("documento");
            $nombreDocumento = Str::slug($request->nombre).".".$documento->guessExtension();
            $ruta = public_path("gastos/");

            $documento->move($ruta,$nombreDocumento);
            //copy($imagen->getRealPath(),$ruta.$nombreimagen);

            //$post->imagen = $nombreimagen;            
            
        }else {
            $nombreDocumento = $gasto->documento;
        }
        $gasto->nombre = $request->nombre;
        $gasto->monto = $request->monto;
        $gasto->fecha = $request->fecha;
        $gasto->responsable = $request->responsable;
        $gasto->documento = $nombreDocumento;
        $gasto->save();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gasto = Gasto::find($id);
        $gasto->delete();

        return back();
    }
}
