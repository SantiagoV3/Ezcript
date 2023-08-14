<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Asignatura;
use App\Models\Carrera;
use App\Models\Periodo;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['cursos']=Curso::paginate(6); //se guarda en la variable cursos
        $periodos= Periodo::all();
        $asignaturas= Asignatura::all();
        // return $periodos;
        return view('cursos.index',$datos,compact('periodos','asignaturas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $asignaturas = Asignatura::all();
        $carreras = Carrera::all();
        $periodos = Periodo::all();

        // return $carreras->first();

        return view('cursos.create', compact('asignaturas','carreras','periodos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $restricciones=[
            'asg_id'=> 'required',
            'car_id'=> 'required',
            'per_id'=> 'required',
            'cur_nombre' => 'required|string|min:7|max:40|regex:/^[\pL\s\-]+$/u',  // regex ocupa una expresión regular para validar que varacteres son aceptados
            'cur_profesor'=> 'required|string|max:40|regex:/^[\pL\s\-]+$/u',
            'cur_descripcion'=> 'nullable|string|min:20|max:256' //Maximo de caracteres
        ];

        $mensaje=[
            'cur_nombre.required'=>'El curso debe tener un nombre.',
            'cur_nombre.max'=>'El nombre del curso no puede ser mayor a 40 caracteres.',
            'cur_nombre.min'=>'El nombre del curso no puede ser menor a 7 caracteres.',
            'cur_nombre.regex'=>'El nombre del curso no puede tener números.',
            'cur_profesor.required'=>'Se debe especificar el nombre del profesor.',
            'cur_profesor.max'=>'El nombre del profesor no puede ser mayor a 40 caracteres.',
            'cur_profesor.regex'=>'El nombre del profesor no puede tener números.',
            'cur_descripcion.min'=>'La descripción debe tener por lo menos 20 caracteres.',
            'cur_descripcion.max'=>'La descripción no puede tener más de 256 caracteres.',

        ];


        $this->validate($request,$restricciones,$mensaje); //Se validan los datos

        $datoscurso = request()->except('_token'); //va a recibir la informacion excepto el token
        Curso::insert($datoscurso);
        //return response()->json($datoscurso);

        Alert::success('Nuevo Curso Creado', 'El curso se ha creado exitosamente'); // Mensaje de Creación de curso

        return redirect('cursos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //A traves del id se pasa la información a $curso
        //y se retorna la vista con la información del curso
        //first topa primer curso con ese id
        $cursos = Curso::where('id',$id)->get();
        return view('cursos.vercurso',compact('cursos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // return $id;
        //A traves del id se pasa la información a $curso y se retorna la vista con la información
        $curso=Curso::findOrFail($id);

        $asignaturas = Asignatura::all();
        $carreras = Carrera::all();
        $periodos = Periodo::all();

        return view('cursos.edit', compact('curso','asignaturas','carreras','periodos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $restricciones=[
            'asg_id'=> 'required',
            'car_id'=> 'required',
            'per_id'=> 'required',
            'cur_nombre' => 'required|string|min:7|max:40|regex:/^[\pL\s\-]+$/u',  // regex ocupa una expresión regular para validar que varacteres son aceptados
            'cur_profesor'=> 'required|string|max:40|regex:/^[\pL\s\-]+$/u',
            'cur_descripcion'=> 'nullable|string|min:20|max:256' //Maximo de caracteres
        ];

        $mensaje=[
            'cur_nombre.required'=>'El curso debe tener un nombre.',
            'cur_nombre.max'=>'El nombre del curso no puede ser mayor a 40 caracteres.',
            'cur_nombre.min'=>'El nombre del curso no puede ser menor a 7 caracteres.',
            'cur_nombre.regex'=>'El nombre del curso no puede tener números.',
            'cur_profesor.required'=>'Se debe especificar el nombre del profesor.',
            'cur_profesor.max'=>'El nombre del profesor no puede ser mayor a 40 caracteres.',
            'cur_profesor.regex'=>'El nombre del profesor no puede tener números.',
            'cur_descripcion.min'=>'La descripción debe tener por lo menos 20 caracteres.',
            'cur_descripcion.max'=>'La descripción no puede tener más de 256 caracteres.',

        ];

        $this->validate($request,$restricciones,$mensaje); //Se validan los datos

        $datoscurso = request()->except(['_token','_method' ]);//va a recibir la informacion excepto el token y el metodo PATCH
        Curso::where('id','=',$id)->update($datoscurso);
        $curso=Curso::findOrFail($id);
        $asignaturas = Asignatura::all();
        $carreras = Carrera::all();
        $periodos = Periodo::all();
        //return view('cursos.edit', compact('curso','asignaturas','carreras','periodos'));

        Alert::success('Curso Editado', 'Los datos del curso se han editado exitosamente'); // Mensaje de Creación de curso

        return redirect('cursos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Para eliminar un curso
        Curso::destroy($id);
        return redirect('cursos')->with('eliminar','curso-eliminado'); //'eliminar' variable donde va a almacenar el mensaje y el mensaje 'curso eliminado'
    }
}
