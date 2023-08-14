<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Usuario</title>

    <!-- IMPORTANDO SCRIPT DE SWEET ALERT 2 -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <!-- IMPORTANDO SCRIPT DE JQUERY -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <!-- IMPORTANDO SCRIPTS DE DATATABLE -->
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"></link>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css"></script>
    
    <!-- IMPORTAND BOOTSTRAP 5 -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script> -->

    <!-- IMPORTANDO JQUERY -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="/ezcript/resources/js/perfil/perfil-jquery.js"></script>

    <!-- IMORTANDO ICONOS DE FONT-AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- IMPORTANDO SWEET ALERT 2 -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
<form action="{{ url('/perfil/'.$datosUsuario->pef_id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <!-- {{ method_field('GET') }} -->
    <div class="container" style="padding-top: 30px">
        <div class="row">
            <div class="col-12 border">
                <h1>
                    {{ 
                        $datosUsuario->pef_nombre. " ". 
                        $datosUsuario->pef_apellido_paterno. " ". 
                        $datosUsuario->pef_apellido_materno 
                    }}
                </h1>
            </div>
        </div>
        <div class="row">
            <!-- Columna Izquierda -->
            <div class="col-12 col-lg-4 border pt-3">
                <!-- Foto de perfil del usuario -->
                    <div class="form-group">
                        <!-- Foto de Perfil -->
                        <img 
                            class="img-fluid border border-3 position-relative w-100 mw-100 rounded-circle"
                            id="foto-perfil"
                            src="{{ '/ezcript/storage/app/public/'. $datosUsuario->pef_foto }}" 
                            alt="Foto de perfil"
                        >
                    </div>
                    <?php 
                        // echo $infoUsuario->PEF_FOTO;
                    ?>
            </div>
            <!-- --Columna Derecha -->
            <div class="col-12 col-lg-8 border pt-3">

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
                                    <div class="">
                                        <!-- BOTÓN PARA EDITAR PERFIL -->
                                        <!-- <button 
                                            type="button" 
                                            id="editar-perfil"
                                            class="btn btn-sm btn-primary z-100"
                                            alt="Editar perfil"
                                        >
                                            <i class="fa fa-pencil"></i>    
                                        </button> -->

                                        <button
                                            type="submit" 
                                            id="guardar-datos"
                                            class="btn btn-sm btn-success d-none z-100"
                                            
                                        >
                                            <i class="fa fa-save"></i>    
                                        </button>
                                    </div>
                                </h5>
                                <h3>
                                    <input 
                                        class="w-100 border-0"
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
                        <div class="col-12">
                            <h5>
                                <b>RUT:</b>
                                
                            </h5>
                            <h3>
                                <input 
                                    class="w-100 border-0"
                                    style="outline:none;"
                                    type="text" 
                                    name="pef_rut"
                                    value="{{ $datosUsuario->pef_rut }}"
                                    readonly
                                >
                            </h3>
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <h5>
                                <b>Correo:</b>
                            </h5>
                            <h3>
                                <input 
                                    class="w-100 border-0"
                                    style="outline:none;"
                                    type="text" 
                                    name="pef_correo"
                                    value="{{ $datosUsuario->pef_correo }}"
                                    readonly
                                >
                            </h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <h5>
                                <b>Teléfono:</b>
                            </h5>
                            <h3>
                                <input 
                                    class="w-100 border-0"
                                    style="outline:none;"
                                    type="text" 
                                    name="pef_telefono"
                                    value="{{ $datosUsuario->pef_telefono }}"
                                    readonly
                                >
                            </h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <h5>
                                <b>Página Web:</b>
                            </h5>
                            <h3> 
                                <input 
                                    class="w-100 border-0"
                                    style="outline:none;"
                                    type="text" 
                                    name="pef_pagina_web"
                                    value="{{ $datosUsuario->pef_pagina_web }}"
                                    readonly
                                >
                            </h3>
                        </div>
                    </div>
                    <!-- <div class="row">
                        <div class="col-12">
                            <h5>
                                <b>Contraseña:</b>
                            </h5>
                            <h3 class="d-flex">
                                <input 
                                    class="w-50 border-0"
                                    style="outline:none;"
                                    type="password" 
                                    name="pef_contrasena"
                                    value="{{ $datosUsuario->pef_contrasena }}"
                                    readonly
                                >
                                <button
                                    type="button"
                                    id="alternar-contrasena"
                                    class="btn btn-sm btn-primary 
                                        z-100 ml-2 d-none"
                                >
                                    <i class="fa fa-eye fa-eye-slash"></i>
                                </button>
                                
                            </h3>
                        </div>
                    </div> -->
                    <div class="row">
                        <div class="col-12">
                            <h5>
                                <b>Descripción:</b>
                            </h5>
                            <h3>
                                <input 
                                    class="w-100 border-0"
                                    style="outline:none;"
                                    type="text" 
                                    name="pef_descripcion"
                                    value="{{$datosUsuario->pef_descripcion}}"
                                    readonly
                                > 
                            </h3>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    </form>
</body>
</html>