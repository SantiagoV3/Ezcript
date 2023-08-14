@extends('layouts.plantilla')

@section('content')

    <div class="py-3">

        <div style="display: flex; justify-content: space-between">
            <h1 class="text-light">Cursos creados</h1>
            <a href="{{url('cursos/create')}}" class="btn btn-success" style="align-self: center; width: 200px ;"><i class="bi bi-plus-circle"></i> Crear Un Nuevo Curso </a>
        </div>
        <br>
        @forelse($cursos as $curso )
            <div class="card shadow-lg">

                <h5 class="card-header"><i class="bi bi-terminal-fill"></i> {{$curso->cur_nombre}}</h5>

                <div class="card-body">

                    <div class="row">
                        <div class="col-sm-5 col-md-6">
                            <span class="p-5">
                                <p class="card-text">{{$curso->cur_descripcion}}</p>
                            </span>
                        </div>
                        <div class="col-sm-5 offset-sm-2 col-md-6 offset-md-0">
                            @foreach($periodos as $periodo)
                                @if($curso->per_id == $periodo->id)
                                    <span class="p-3">
                                        <p class="card-text "><strong>Periodo:</strong> {{$periodo->per_anio}}-{{$periodo->per_semestre}}</p>
                                    </span>
                                @break
                                @endif
                            @endforeach

                            @foreach($asignaturas as $asignatura)
                                @if($curso->asg_id == $asignatura->id)
                                    <span class="p-3">
                                        <p class="card-text "><strong>Asignatura:</strong> {{$asignatura->asg_nombre}}</p>
                                    </span>
                                @break
                                @endif
                            @endforeach
                        </div>


                    </div>
                    <div class="container">

                        <div class="col-sm-6 col-xs-12">

                            <div class="row row-cols-auto">
                                <div class="col">
                                    <a href="{{url('/cursos/'.$curso->id)}}" class="btn btn-primary">Entrar al Curso</a>
                                </div>

                                <div class="col">
                                    <a href="{{url('/cursos/'.$curso->id.'/edit')}}" class="btn btn-warning">Editar Curso</a>
                                </div>

                                <div class="col">
                                    <form action="{{url('/cursos/'.$curso->id)}}" class="form-eliminar" method="post">
                                        @csrf
                                        {{method_field('DELETE')}}


                                        <button type="submit" class="btn btn-danger">Eliminar curso</button>

                                    </form>
                                </div>


                            </div>


                        </div>

                    </div>
                </div>

            </div>
            <br>

        @empty
            <div class="alert alert-info" role="alert">
                <h5>No existen cursos actualmente</h5>
            </div>
        @endforelse

    </div>
@endsection

@section('js')

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if(session('eliminar') == 'curso-eliminado')
        <script>
            Swal.fire(
                '¡Eliminación Exitosa!',
                'El curso ha sido eliminado con exito.',
                'success'
            )
        </script>
    @endif

    <script>
        $('.form-eliminar').submit(function(e) {
            e.preventDefault(); //Se detiene el envio del formulario

            Swal.fire({
                title: '¿Estás Seguro/a de Eliminar Este Curso?',
                text: "Una vez eliminado no se podrá recuperar",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '¡Si, eliminar!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {

                    this.submit();
                }
            })
        });
    </script>
@endsection
