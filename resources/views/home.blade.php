@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <span class="p-5">
            <h1 class="text-light text-center">Ezcript();</h1>
        </span>

        <div class="vstack gap-2 col-md-5 mx-auto">
            <a href="{{url('cursos/')}}" class="btn btn-info btn-lg text-light fs-4 fw-bold" style="align-self: center; width: 400px"> Jugar </a>
            <a href="#" class="btn btn-info btn-lg text-light fs-4 disabled" style="align-self: center; width: 400px"> Tus puntuaciones </a>
            <a href="#" class="btn btn-info btn-lg text-light fs-4 disabled" style="align-self: center; width: 400px">Acerca del Juego </a>
            <a href="#" class="btn btn-info btn-lg text-light fs-4 disabled" style="align-self: center; width: 400px">Créditos </a>
        </div>
    </div>
</div>
@endsection

@section('js')

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if(session('eliminar') == 'alumno-eliminado')
        <script>
            Swal.fire(
                '¡Se a enviado el error!',
                'El comentario se a enviado con exito.',
                'success'
            )
        </script>
    @endif

@endsection