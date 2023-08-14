@extends('layouts.plantilla')

@section('content')

    <div class="py-3">

        <div style="display: flex; justify-content: space-between">
            <h1 class="text-light">Alumno</h1>
        </div>

        <br>
            <div class="card shadow-lg">

                <!-- CONCATENAR NOMBRE Y DOS APELLIDOS PARA QUE SALGAN JUNTOS, BUSCAR COMO HACERLO -->
                <h5 class="card-header"><i class="bi bi-terminal-fill"></i> <strong>Nombre:</strong> {{$alumno->alu_nombre}} {{$alumno->alu_apellido_p}} {{$alumno->alu_apellido_m}}</h5>

                    <div class="card-body">
                        <div class="row">

                            <!-- RUT DEL ALUMNO -->
                            <div class="col-sm-5 col-md-6">
                                <span class="p-5">
                                    <p class="card-text"><strong>Rut:</strong> {{$alumno->alu_rut}}</p>
                                </span>
                            </div>

                            <!-- FOTO DEL ALUMNO, HACER LOS CAMBIOS PARA QUE SE MUESTRA UNA FOTO. -->
                            <div class="col-sm-5 col-md-6">
                                <span class="p-5">
                                    <p class="card-text"><strong>Foto:</strong> {{$alumno->alu_foto}}</p>
                                </span>
                            </div>

                            <!-- CORREO DEL ALUMNO, SE DEBE MOSTRAR? -->
                            <div class="col-sm-5 col-md-6">
                                <span class="p-5">
                                    <p class="card-text"><strong>Correo:</strong> {{$alumno->alu_correo}}</p>
                                </span>
                            </div>

                            <div class="col-sm-5 col-md-6">
                                <span class="p-5">
                                    <p class="card-text"><strong>Pagina Web:</strong> {{$alumno->alu_pagina_web}}</p>
                                </span>
                            </div>

                            <!-- DESCRIPCION DEL ALUMNO, MOSTRAR EN VER ALUMNO O DEJARLO EN LA LISTA? -->
                            <div class="col-sm-5 col-md-6">
                                <span class="p-5">
                                    <p class="card-text"><strong>Descripcion:</strong> {{$alumno->alu_desc}}</p>
                                </span>
                            </div>

                            <!-- <div class="col-sm-5 col-md-6"> CONTRASEÑA DEL ALUMNO
                                <span class="p-5">
                                    <p class="card-text">{{$alumno->alu_cont}}</p>
                                </span> 
                            </div> --> 

                            <div class="col-sm-5 offset-sm-2 col-md-6 offset-md-0">

                            </div>
                        </div>

                </div>

            </div>
        <br>

        @foreach($roles as $rol)
            @foreach($cursos as $curso)
            <a href='{{url("alumnos/?rol_id=$rol->rol_id&cur_id=$curso->cur_id")}}' class="btn btn-danger" style="align-self: center; width: 200px"> Regresar </a>
            @endforeach
        @endforeach
    </div>
@endsection