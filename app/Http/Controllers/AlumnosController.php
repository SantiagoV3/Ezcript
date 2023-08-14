<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\User;
use App\Models\Curso;
use App\Models\Rol;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AlumnosController extends Controller
{

    public function select()
    {
        $cursos= Curso::all();
        $roles = Rol::where('rol_nombre','Alumno')->get();
        return view('alumnos.seleccion',compact('cursos','roles'));
    }

    // El index recive un request en el que vienen el id del curso y el id del rol, con los cuales filtra los alumnos a mostrar
    // el cur_id == alumno->cur_id
    public function index(Request $request)
    {
        // valores del request

        $rol = $request->rol_id;
        $curso = $request->cur_id;

        $restricciones=[
            'rol_id'=> 'required',
            'cur_id'=> 'required',
        ];
        
        $validacion = $this->validate($request,$restricciones); //Se validan los datos

        $alumnos = Usuario::where('cur_id','like',"%$curso%")->get();
   
        $roles = Rol::where('rol_nombre','Alumno')->get();
        $cursos = Curso::where('id','like',"%$curso%")->get();
        $cursox = $cursos->pluck('cur_nombre');
        $cursox = trim($cursox, '[""]');

        return view('alumnos.index', compact('alumnos','roles', 'cursos', 'cursox'));
    }


    public function create()
    {

        $cursos = Curso::all();
        $roles = Rol::where('rol_nombre','alumno')->get();
        $usuarios = User::all();

        return view('alumnos.create', compact('cursos','roles','usuarios'));
    }


    public function store(Request $request)
    {

        $rol = $request->rol_id;
        $curso = $request->cur_id;
        $usr = $request->usr_id;

        $nombre = User::where('id', 'like',"%$usr%")->first();
        $nombrex = $nombre->pluck('name');
        $nombrex = trim($nombrex, '[""]');

        $restricciones=[
            'rol_id'=> 'required',
            'cur_id'=> 'required',
            
            'pef_rut'=>'required|regex:/^\d{1,2}\.\d{3}\.\d{3}[-][0-9K]{1}$/',
            'pef_correo'=> 'required|string|min:10|max:256',
            'pef_telefono'=> 'nullable'
        ];

        $mensaje=[

            'pef_rut.required'=>'el alumno debe tener rut',
            'pef_rut.regex' =>'Respetar el formato indicado',

            'pef_correo.required'=>'El alumno debe tener correo.',
            'pef_correo.min'=>'El correo debe tener por lo menos 10 caracteres.',
            'pef_correo.max'=>'El correo no puede tener más de 256 caracteres.',
        ];

        
        $validacion = $this->validate($request,$restricciones,$mensaje); //Se validan los datos

        $datosalumno = request()->except(['_token', '_method']); //va a recibir la informacion excepto el token
        // return $datosalumno;
        Usuario::insert($datosalumno);
        // return $datosalumno;
        Usuario::where('usr_id', $usr)->update([
            'pef_nombre' => $nombrex,
        ]);

        $alumnos = Usuario::where('cur_id','like',"%$curso%")->get();

        return $datosalumno;

        $roles = Rol::where('rol_nombre','Alumno')->get();
        $curso = $datosalumno['cur_id']; 
        $cursos = Curso::where('id', $curso)->get();
        $cursox = $cursos->pluck('cur_nombre');
        $cursox = trim($cursox, '[""]');

        Alert::success('Nuevo Alumno Creado', 'El alumno se ha creado exitosamente'); // Mensaje de Creación de curso

       return view('alumnos.index', compact('alumnos','roles', 'cursos', 'cursox'));
    }


    public function show($alu_id)
    {
        $alumno = Usuario::findOrFail($alu_id);
        $cursox = Usuario::where('pef_id',$alu_id)->select('cur_id')->get()->toArray();
        $cursos = Curso::where('id', $cursox)->get();
        $roles = Rol::where('rol_nombre','alumno')->get();
        //return $alumno;
        return view('alumnos.show', compact('alumno', 'cursos', 'roles'));
    }


    public function edit($alu_id)
    {

        // return $alu_id;

        $alumno = Usuario::findOrFail($alu_id);
        $cursox = Usuario::where('pef_id',$alu_id)->select('cur_id')->get()->toArray();
        $cursos = Curso::where('id', $cursox)->get();
        $roles = Rol::where('rol_nombre','alumno')->get();
        $usuarios = User::all();
        // $alumnos = Alumnos::where('cur_id', $cursox)->get();

        // return $alumno;

        return view('alumnos.edit', compact('alumno', 'cursos', 'roles', 'usuarios'));
    }


    public function update(Request $request)
    {
        $restricciones=[
            'rol_id'=> 'required',
            'cur_id'=> 'required',

            'pef_rut'=>'required|regex:/^\d{1,2}\.\d{3}\.\d{3}[-][0-9K]{1}$/',
            'pef_correo'=> 'required|string|min:10|max:256',
            'pef_telefono'=> 'nullable'
        ];

        $mensaje=[

            'pef_rut.required'=>'el alumno debe tener rut',
            'pef_rut.regex' =>'Respetar el formato indicado',
            'pef_correo.required'=>'El alumno debe tener correo.',
            'pef_correo.min'=>'El correo debe tener por lo menos 10 caracteres.',
            'pef_correo.max'=>'El correo no puede tener m  s de 256 caracteres.',
        ];

        $this->validate($request,$restricciones,$mensaje);

        $datoalumnos = request()->except('_token');

        // return $request;

        $rol = $request->rol_id;
        $curso = $request->cur_id;
    
        // aqui se estan guardando los datos.
        $alumno = Usuario::where('usr_id',$request['usr_id'])->update($datoalumnos);
        // return $alumno;
        $alumnos = Usuario::where('id','like',"%$curso%")->get();

        $roles = Rol::where('rol_nombre','alumno')->get();
        $cursos = Curso::where('id','like',"%$curso%")->get();
        $cursox = $cursos->pluck('cur_nombre');
        $cursox = trim($cursox, '[""]');

        Alert::success('Alumno Editado', 'Los datos del alumno se han editado exitosamente'); // Mensaje de Creación de curso

        return view('alumnos.index', compact('alumnos','roles', 'cursos', 'cursox'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Alumnos  $alumnos
     * @return \Illuminate\Http\Response
     */
    public function destroy($alu_id)
    {
         //Para eliminar un alumno
         Usuario::destroy($alu_id);
         return redirect('alumnos')->with('eliminar','alumno-eliminado'); //'eliminar' variable donde va a almacenar el mensaje y el mensaje 'alumno eliminado'
    }
}
