<?php

namespace App\Http\Controllers;

use App\Models\Problemas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User;

class ProblemasController extends Controller{
    public function index(){
    }
    public function create(){
      return view('problemas.enviar');
    }
    public function store(Request $request){
      $pef_id = Auth::user()->id;
      Problemas::insert([
        'PEF_ID' => $pef_id,
        'PBM_ASUNTO' => ($request->asunto),
        'PBM_DESCRIPCION' => ($request->descripcion)
      ]);
      return redirect('home')->with('eliminar','alumno-eliminado');
    }
    public function show(Problemas $problemas){
    }
    public function edit($PBM_ID){
    }
    public function update(Request $request, $PBM_ID){
    }
    public function destroy(Problemas $problemas){
    }
}
