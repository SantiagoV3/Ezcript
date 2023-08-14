@extends('layouts.plantilla')

@section('content')

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<form class="" id="form" action="{{ url('/perfil') }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <!-- {{ method_field('GET') }} -->
    <input class="btn btn-small btn-primary d-none" name = "operacion" type="text" value="update">
    <div class="container text-white" style="padding-top: 30px">
        <div class="row">
            <div class="col-12">
                <h1>
                    {{
                        $datosUsuario->pef_nombre
                    }}
                </h1>
            </div>
        </div>
        <div class="row">
            <!-- Columna Izquierda -->
            <div class="col-12 col-lg-4 pt-3">
                <!-- Foto de perfil del usuario -->
                    <div class="form-group d-flex justify-content-end">

                        <!-- Foto de Perfil -->
                        <img
                            class="img-fluid align-self-center border border-3 position-relative w-100 mw-100 rounded-circle"
                            id="foto-perfil"
                            src="{{ './../storage/app/public/'. $datosUsuario->pef_foto }}"
                            alt="Foto de perfil"
                        >
                        <!-- Botón para cambiar la foto de perfil -->
                        <label
                            class="cursor-pointer
                                btn btn-sm btn-primary
                                position-relative align-self-baseline z-100"
                            alt="Cambiar foto de perfil"
                            id="cambiar-foto"
                        >
                            <i class="bi bi-camera"></i>
                            <input class="d-none" type="file" name="pef_foto" accept=".png,.jpg" value="{{ $datosUsuario->pef_foto }}">
                        </label>
                    </div>

                    <?php
                        // echo $infoUsuario->PEF_FOTO;
                    ?>
            </div>
            <!-- --Columna Derecha -->
            <div class="col-12 col-lg-8 pt-3">

                    <!-- <div class="row">
                        <div class="col-12">
                            <h3>
                                ID del Usuario:
                                <?php
                                    //echo $infoUsuario->PEF_ID;
                                ?>
                            </h3>
                        </div>
                    </div> -->
                    <div class="row">
                        <div class="col-12">
                            <div class="">
                                <h5 class="d-flex justify-content-between">
                                    <b>Rol:</b>
                                    <div class="w-50">

                                        <button
                                            type="button"
                                            id="eliminar-perfil"
                                            class="btn btn-sm btn-danger z-100"
                                            alt="Eliminar perfil"
                                        >
                                            <i class="bi bi-trash"></i>
                                        </button>

                                        <button
                                            type="button"
                                            id="cancelar-editar-perfil"
                                            class="btn btn-sm btn-danger d-none z-100"

                                        >
                                            <i class="bi bi-x-circle"></i>
                                        </button>

                                        <button
                                            type="submit"
                                            id="guardar-datos"
                                            class="btn btn-sm btn-success d-none z-100"
                                        >
                                            <i class="bi bi-capslock"></i>
                                        </button>
                                    </div>
                                </h5>
                                <h3>
                                    <input
                                        class="border-0 bg-light rounded"
                                        style="outline:none;"
                                        type="text"
                                        name="rol_id"
                                        value="{{ $rol->rol_nombre}}"
                                        readonly
                                    >
                                </h3>
                            </div>
                            <h3>
                                <?php
                                    // echo $infoRolUsuario->ROL_NOMBRE;
                                ?>
                            </h3>
                        </div>
                    </div>
                    <div class="row d-none">
                        <div class="col-12">
                            <h5>
                                <b>ID:</b>
                            </h5>
                            <h3>
                                <input
                                    class="w-100 border-0"
                                    style="outline:none;"
                                    type="text"
                                    name="pef_id"
                                    value="{{ $datosUsuario->pef_id}}"
                                    readonly
                                >
                            </h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="cl-2">
                            <h5>
                                <b>RUT &nbsp</b>
                                <button
                                    type="button"
                                    id="editar-campo"
                                    class="btn btn-sm btn-primary z-100"
                                    alt="Editar perfil"
                                    input="pef_rut"
                                >
                                    <i class="bi bi-pencil"></i>
                                </button>
                            </h5>
                            <h3 class="w-50">
                                <input
                                    class="border-0 bg-light rounded"
                                    style="outline:none;"
                                    type="text"
                                    name="pef_rut"
                                    value="{{ $datosUsuario->pef_rut }}"
                                    readonly
                                >
                            </h3>
                            @if($errors->has("pef_rut"))
                                <li style="color: red;">{{$errors->first("pef_rut")}}</li>
                                <br>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <h5>
                                <b>Correo &nbsp</b>
                                <button
                                    type="button"
                                    id="editar-campo"
                                    class="btn btn-sm btn-primary z-100"
                                    alt="Editar perfil"
                                    input="pef_correo"
                                >
                                    <i class="bi bi-pencil"></i>
                                </button>
                            </h5>
                            <h3>
                                <input
                                    class="dynamic-input border-0 bg-light rounded"
                                    style="outline:none;"
                                    type="text"
                                    name="pef_correo"
                                    value="{{ $datosUsuario->pef_correo }}"
                                    readonly
                                >
                            </h3>
                            @if($errors->has("pef_correo"))
                                <li style="color: red;">{{$errors->first("pef_correo")}}</li>
                                <br>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <h5>
                                <b>Teléfono celular &nbsp</b>
                                <button
                                    type="button"
                                    id="editar-campo"
                                    class="btn btn-sm btn-primary z-100"
                                    alt="Editar perfil"
                                    input="pef_telefono"
                                >
                                    <i class="bi bi-pencil"></i>
                                </button>
                            </h5>
                            <h3>
                                <input
                                    class="border-0 bg-light rounded"
                                    style="outline:none;"
                                    type="text"
                                    placeholder="+56 9 XXXX XXXX"
                                    name="pef_telefono"
                                    value="{{ $datosUsuario->pef_telefono }}"
                                    readonly
                                >
                            </h3>
                            @if($errors->has("pef_telefono"))
                                <li style="color: red;">{{$errors->first("pef_telefono")}}</li>
                                <br>
                            @endif
                        </div>
                    </div>
                    <!-- <div class="row">
                        <div class="col-12">
                            <h5>
                                <b>Contraseña &nbsp</b>
                                <button
                                    type="button"
                                    id="editar-campo"
                                    class="btn btn-sm btn-primary z-100"
                                    alt="Editar perfil"
                                    input="pef_contrasena"
                                >
                                    <i class="bi bi-pencil"></i>
                                </button>
                            </h5>
                            <h3 class="d-flex">
                                <input
                                    class="w-25 border-0"
                                    style="outline:none;"
                                    type="password"
                                    name="pef_contrasena"
                                    value="{{ $datosUsuario->pef_contrasena }}"
                                    readonly
                                >
                            </h3>
                        </div>
                    </div> -->
            </div>
        </div>
    </div>
    <br><br>

    <!-- <div class="container"></div> -->
    </form>
    <script src="../resources/js/perfil/perfil-jquery.js"></script>
    <script src="../resources/js/perfil/input.js"></script>
    @include('sweetalert::alert')

@endsection
