@extends('layouts.plantilla')

@section('content')

    <div class="py-3">

        <div style="display: flex; justify-content: space-between">
            <h1 class="text-light">Lista de Alumnos</h1>
            <a href="{{url('alumnos/create')}}" class="btn btn-success" style="align-self: center; width: 200px ;"><i class="bi bi-plus-circle"></i> Crear Un Nuevo Alumno </a>
        </div>
        <h2 class="text-light">{{$cursox}}</h2>

        <br>
        @forelse($alumnos as $alumno )
            <div class="card shadow-lg">

                <!-- CONCATENAR NOMBRE Y DOS APELLIDOS PARA QUE SALGAN JUNTOS, BUSCAR COMO HACERLO -->
                <h5 class="card-header"><i class="bi bi-terminal-fill"></i> <strong>Nombre:</strong> {{$alumno->pef_nombre}} {{$alumno->pef_apellido_p}} {{$alumno->pef_apellido_m}}</h5>

                    <div class="card-body">
                        <div class="row">

                            <!-- RUT DEL ALUMNO -->
                            <div class="col-sm-5 col-md-6">
                                <span class="p-5">
                                    <p class="card-text"><strong>Rut:</strong> {{$alumno->pef_rut}}</p>
                                </span>
                            </div>

                            <!-- Telefono -->
                            <div class="col-sm-5 col-md-6">
                                <span class="p-5">
                                    <p class="card-text"><strong>Telefono:</strong> {{$alumno->pef_telefono}}</p>
                                </span>
                            </div>

                            <!-- CORREO DEL ALUMNO, SE DEBE MOSTRAR? -->
                            <div class="col-sm-5 col-md-6">
                                <span class="p-5">
                                    <p class="card-text"><strong>Correo:</strong> {{$alumno->pef_correo}}</p>
                                </span>
                            </div>

                        </div>

                    <div class="container">
                        <div class="col-sm-6 col-xs-12">

                            <div class="row row-cols-auto">

                                <!-- <div class="col"> -->
                                    <!-- <a href="{{url('/alumnos/'.$alumno->pef_id)}}" class="btn btn-primary">Ver Alumno</a> -->
                                    <!-- <form action="{{url('/alumnos/'.$alumno->pef_id.'/ver')}}" class="form-ver" method="get">
                                        @csrf
                                        {{method_field('_GET')}}

                                        <button type="submit" class="btn btn-success" name="alumno" id="Id" value={{$alumno->pef_id}}>Ver alumno</button>
                                    </form>   
                                </div> -->

                                <div class="col">
                                    <form action="{{url('/alumnos/'.$alumno->pef_id.'/pdf')}}" class="form-pdf" method="get" name="alumno" id="pef_id" value={{$alumno->pef_id}}>

                                        <button type="submit" class="btn btn-success">Generar Pdf</button>
                                    </form>                                   
                                </div>

                                <div class="col">
                                    <!-- <a href="{{url('/alumnos/edit')}}" class="btn btn-warning" name="alumno" id="Id" value={{$alumno->pef_id}}>Editar Alumno</a> -->
                                    <form action="{{url('/alumnos/'.$alumno->pef_id.'/edit')}}" class="form-ver" method="get">
                                        @csrf
                                        {{method_field('_GET')}}

                                        <button type="submit" class="btn btn-warning" name="alumno" id="Id" value={{$alumno->pef_id}}>Editar Alumno</button>
                                    </form> 
                                </div>

                                <div class="col">
                                    <form action="{{url('/alumnos/'.$alumno->pef_id.'/delete')}}" class="form-eliminar" method="post">
                                        @csrf
                                        {{method_field('DELETE')}}

                                        <button type="submit" class="btn btn-danger">Eliminar alumno</button>
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
                    <h5>No existen alumnos actualmente</h5>
                </div>
            @endforelse

            <a href="{{url('alumnos/listar')}}" class="btn btn-danger" style="align-self: center; width: 200px ;"> Regresar </a>       

    </div>
@endsection

@section('js')

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if(session('eliminar') == 'alumno-eliminado')
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
                title: 'Estás Seguro/a de Eliminar Este Alumno?',
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

    <script>
        $(document).ready(function(){
            $('.pef_rut').inputmask('11.111.111-1')
        })
    </script>

@endsection