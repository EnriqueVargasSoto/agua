<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ciclo;
use Illuminate\Http\Request;
use App\Models\DetalleCiclo;
use App\Models\Recibo;
use App\Models\Suministro;
use Carbon\Carbon;

class DetalleCicloController extends Controller
{
    public function detalle($id){
        $ciclo = Ciclo::find($id);
        //dd($ciclo);
        $detalle = DetalleCiclo::where('idCiclo', $id)->get();
        return view('admin.pages.ciclos.detalle')->with(compact('ciclo', 'detalle'));
    }

    public function creaRecibo(Request $request){
        $suministros = Suministro::where('estado','activo')->get();

        $date = Carbon::now();
        $fechaActual = $date->format('Y-m-d');
        
        foreach ($suministros as $key => $suministro) {
            $clave = 'cantidad'.$suministro->id;
            $suministro->medidaInicio = $suministro->medidaFin;
            $suministro->medidaFin = $request->$clave;
            $suministro->save();

            $detalleCiclo = DetalleCiclo::where('idSuministro', $suministro->id)->where('idCiclo', $request->idCiclo)->first();
            //dd($suministros[1]);
            //dd(2-2.00);
            $resta = $suministro->medidaFin - $suministro->medidaInicio;
            //dd($resta);
            $detalleCiclo->cantidad = $resta;
            $detalleCiclo->total = $detalleCiclo->cantidad * $detalleCiclo->precio;
            $detalleCiclo->estado = 'inactivo';
            $detalleCiclo->save();

            $ciclo = Ciclo::find($request->idCiclo);
            $ciclo->estado = '1';
            $ciclo->save();

            $fechaVencimiento = date("Y-m-d",strtotime($fechaActual."+ 21 days"));
            Recibo::create([
                'idSuministro' => $suministro->id,
                'concepto' => $ciclo->mes.' '.$ciclo->anio,
                'cantidad' => $detalleCiclo->cantidad,
                'valor' => $detalleCiclo->precio,
                'total' => $detalleCiclo->total,
                'estado' => 'pendiente',
                'fechaEmision' => $fechaActual,
                'fechaVencimiento' => $fechaVencimiento,
            ]);
        }
        //dd($request->$clave);
        return redirect()->route('ciclos.index');
    }
}
