<?php

namespace App\Http\Controllers;

use App\Models\Nivel;
use Illuminate\Http\Request;

class NivelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $curso= $request->id;
        $niveles = Nivel::where('cur_id',$curso)->get();
        return view('niveles.menu-niveles', compact('niveles'));
    }

    public function mostrar(Request $request)
    {
        $curso= $request->id;
        $niveles = Nivel::where('cur_id',$curso)->get();
        return view('niveles.bloquear-niveles', compact('niveles'));
    }


    public function ActualizarEstado(Request $request)
    {
        $estadoNivel = Nivel::findOrFail($request->id)->update(['niv_activo'=>$request->niv_activo]);

        if($request->niv_activo == 1){
            $nuevoestado = '<button type="button" class="btn btn-sm btn-success">Habilitado</button>';
        }else{
            $nuevoestado = '<button type="button" class="btn btn-sm btn-danger">Deshabilitado</button>';
        }

        return response()->json(['var'=>''.$nuevoestado.'']);
    }


}
