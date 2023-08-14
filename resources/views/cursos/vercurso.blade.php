@extends('layouts.plantilla')

@section('content')

<div class="py-3">
@foreach ($cursos as $curso)
    <div style="display: flex; justify-content: space-between">
        <h1 class="text-light">{{$curso->cur_nombre}}</h1>
        <a href=" {{ url('./alumnos/listar') }}" class="btn btn-success" style="align-self: center; width: 200px ;"><i class="bi bi-people-fill"></i> Ver alumnos del Curso </a>
    </div>
    <div class="pt-3">
        <div class="row py-3" style="background-color:#E8E7E7">
            <h3> Descripción del Curso</h3>
            <span class="p-3">
                <p>{{$curso->cur_descripcion}}</p>
            </span>
        </div>
    </div>

    <div class="pt-5">
        <div class="row py-3" style="background-color:#E8E7E7">
            <h3>Progreso</h3>
            <span class="p-3">
                <p class="text-center">Nivel 1 de 10</p>
            </span>
            <div class="progress px-3" style="height: 30px;">
                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-label="Animated striped example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 25%;">25%</div>
            </div>

            <div class="pt-5">
                <a href="{{ url('/menu-niveles/' .$curso->id. '/' )}}" class="btn btn-success" style="align-self: center; width: 200px">Ver Niveles</a>
            </div>

        </div>
    </div>
</div>
@endforeach
@endsection
