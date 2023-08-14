@extends('layouts.plantilla')

@section('content')

<div class="py-5">
    <div class="card">

        <div class="card-body">
            <div class="row">

            <h5 class="card-header"><i class="bi bi-terminal-fill"></i> <strong>Seleccione Rol y Curso:</strong></h5>

                <form action="{{ url('/alumnos') }}" method="get">

                    <div class="py-4">

                        <label class="text" for="Rol"><strong>Rol</strong></label>
                        <lavel for="Rol" class="text-danger"> *</lavel>
                        <select class="form-select {{$errors->has('rol_id')?'is-invalid':''}}" name="rol_id" id="Rol">
                            <option selected disabled value="">Seleccione el Rol alumno...</option>
                            @foreach($roles as $rol)
                            <option value="{{ $rol->rol_id }}" @if (isset($alumno->rol_id) && $rol->rol_nombre == 'alumno') selected @endif>{{$rol->rol_nombre}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('rol_id'))
                            {!! $errors->first('rol_id','<div class="invalid-feedback">Se debe seleccionar el rol</div>') !!}
                        @endif

                        <br>
                        <label class="text" for="Curso"><strong>Curso</strong></label>
                        <lavel for="Curso" class="text-danger"> *</lavel>
                        <select class="form-select {{$errors->has('id')?'is-invalid':''}}" name="cur_id" id="Curso">
                            <option selected disabled value="">Seleccione el Curso...</option>
                            @foreach($cursos as $curso)
                            <option value="{{ $curso->id }}" @if (isset($alumno->cur_id) && $alumno->cur_id == $curso->id) selected @endif>{{$curso->cur_nombre}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('cur_id'))
                        {!! $errors->first('cur_id','<div class="invalid-feedback">Se debe seleccionar el curso</div>') !!}
                        @endif

                        <br>
                        <input class="btn btn-success" type="submit" value=" Listar el Curso">

                    </div>

                </form>

            </div>
        </div>

    </div>
</div>

@endsection
