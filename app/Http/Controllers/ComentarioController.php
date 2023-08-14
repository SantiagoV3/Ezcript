<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class ComentarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['comentarios']=Comentario::paginate(5);
        return view('comentario.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('comentario.create');
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
        //$datoscomentarios = request()->all();
        $datoscomentarios = request()->except('_token');
        if($request->hasFile('Correccion')){
            $datoscomentarios['Correccion']=$request->file('Correccion')->store('uploads','public');
        }
        Comentario::insert($datoscomentarios);
        /* return response()->json($datoscomentarios); */
        return redirect('comentario')->with('mensaje','Comentario agregado con exito');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comentario  $comentario
     * @return \Illuminate\Http\Response
     */
    public function show(Comentario $comentario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comentario  $comentario
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $comentario=Comentario::findOrFail($id);
        return view('comentario.edit', compact('comentario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comentario  $comentario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->id;
        $datoscomentarios = request()->except('_token','_method');
        if($request->hasFile('Correccion')){
            $comentario=Comentario::findOrFail($id);
            //Storage::delete('public/'.$comentario->Correcion);
            $datoscomentarios['Correccion']=$request->file('Correccion')->store('uploads','public');
        }
        Comentario::where('id','=',$id)->update($datoscomentarios);
        //$datos['comentarios']=Comentario::paginate(5);
        $datos['comentarios']=Comentario::paginate(5);
        return view('comentario.index',$datos);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comentario  $comentario
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $comentario=Comentario::findOrFail($id);
        if(Storage::delete('public/'.$comentario->Correcion)){

            Comentario::destroy($id);
        }
        Comentario::destroy($id);
        /* return redirect('comentario');  */
        return redirect('comentario')->with('mensaje','Comentario eliminado con exito');
    }
}
