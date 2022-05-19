<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Documento;
use App\Models\TipoDocumento;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DocumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documentos = Documento::all();
        $tipos = TipoDocumento::all();
        return view('admin.pages.documentos.index')->with(compact('documentos','tipos'));
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
            $nombreDocumento = Str::slug($request->titulo).".".$documento->guessExtension();
            $ruta = public_path("documentos/");

            $documento->move($ruta,$nombreDocumento);
            //copy($imagen->getRealPath(),$ruta.$nombreimagen);

            //$post->imagen = $nombreimagen;            
            
        }
        $documento = Documento::create([
            'idTipoDocumento' => $request->idTipo,
            'titulo' => $request->titulo,
            'fecha' => $request->fecha,
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
        $documento = Documento::find($id);
        if($request->hasFile("documento")){

            $documento = $request->file("documento");
            $nombreDocumento = Str::slug($request->titulo).".".$documento->guessExtension();
            $ruta = public_path("documentos/");

            $documento->move($ruta,$nombreDocumento);
            //copy($imagen->getRealPath(),$ruta.$nombreimagen);

            //$post->imagen = $nombreimagen;            
            
        }else {
            $nombreDocumento = $documento->documento;
        }

        $documento->idTipoDocumento = $request->idTipo;
        $documento->titulo = $request->titulo;
        $documento->fecha = $request->fecha;
        $documento->documento = $nombreDocumento;
        $documento->save();

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
        $documento = Documento::find($id);
        $documento->delete();

        return back();
    }
}
