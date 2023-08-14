// Código Javascript

// const { result } = require("lodash");
// const { default: Swal } = require("sweetalert2");

function cambiarURL(input) {
    // Verificar si este input tiene alguna imagen
    if (input.files && input.files[0]) {
        var lector = new FileReader();

        lector.onload = function(e) {
            $("#foto-perfil").attr("src", e.target.result);
        }

        lector.readAsDataURL(input.files[0]);
        console.log("foto cambiada");
    }
}

function eliminarUsuario(evt) {

    $("input[name='operacion']").val("destroy");
    console.log("usuario eliminado!");
    $("#form").submit();
}

// Código JQuery
$(document).ready(function() {

    // Desplegar alerta para eliminar la cuenta de usuario
    $("#eliminar-perfil").on("click", function(event) {

        console.log("eliminando");
        // Cancelar evento por defecto
        event.preventDefault();

        // Desplegar la alerta
        Swal.fire({
            position: "center",
            title: "¿Estás seguro que quieres eliminar tu cuenta de usuario?",
            text: "No podrás revertir esta operación",
            icon: "warning",
            confirmButtonColor: "#3085d6",
            confirmButtonText: "¡Si, eliminar!",
            showCancelButton: "true",
            cancelButtonColor: "#d33",
            cancelButtonText: "Cancelar"
        }).then((result) => {
            if (result.isConfirmed) {
                // Eliminar el usuario
                eliminarUsuario();
            } else {
                // Cancelar operación y recargar la página
                const idUsuario = $("input[name='pef_id']").val();
                var url = window.location.href;
                window.location.replace(url);
            }
        });
    });

    // CANCELAR LA OPERACIÓN DE EDITAR DATOS DEL PERFIL
    $("#cancelar-editar-perfil").click(function() {
        $("input[name='operacion']").val("cancel");
        const idUsuario = $("input[name='pef_id']").val();
        var url = window.location.href;
        window.location.replace(url);
    });

    // BOTÓN PARA CAMBIAR LA FOTO DE PERFIL
    $("input[name='pef_foto']").change(function() {

        // Ocultar el botón de eliminar perfil
        var btnEliminarPerfil = $("#eliminar-perfil");
        if (!btnEliminarPerfil.hasClass("d-none")) {
            btnEliminarPerfil.addClass("d-none");
        }

        // Mostrar el botón para cancelar la operación
        var btnCancelarEditarPerfil = $("#cancelar-editar-perfil");
        if (btnCancelarEditarPerfil.hasClass("d-none")) {
            btnCancelarEditarPerfil.removeClass("d-none");
        }

        // Mostrar el botón para guardar los datos
        var btnGuardarCambios = $("#guardar-datos");
        if (btnGuardarCambios.hasClass("d-none")) {
            btnGuardarCambios.removeClass("d-none");
        }

        // Mostrar la foto que fue seleccionada
        cambiarURL(this);

    });

    // EDITAR CAMPO DEL PERFIL
    $("[id='editar-campo']").not("[input=pef_contrasena]").click(function() {

        console.log("editando campo");
        // Ocultar el boton de editar campo
        $(this).addClass("d-none");

        // Ocultar el botón de editar campo
        $("[input=pef_contrasena]").addClass("d-none");

        // Ocultar el botón de eliminar perfil
        var btnEliminarPerfil = $("#eliminar-perfil");
        if (!btnEliminarPerfil.hasClass("d-none")) {
            btnEliminarPerfil.addClass("d-none");
            btnEliminarPerfil.attr("disabled");
        }

        // Mostrar el botón para cancelar la operación
        var btnCancelarEditarPerfil = $("#cancelar-editar-perfil");
        if (btnCancelarEditarPerfil.hasClass("d-none")) {
            btnCancelarEditarPerfil.removeClass("d-none");
        }

        // Mostrar el botón para guardar los datos
        var btnGuardarCambios = $("#guardar-datos");
        if (btnGuardarCambios.hasClass("d-none")) {
            btnGuardarCambios.removeClass("d-none");
        }

        // Mostrar el botón para guardar los cambios

        // Cambiar el contenido de los campos teléfono, página web y
        // descripción dependiendo se si tienen el valor "No tiene"
        var inputName = $(this).attr("input");
        var input = $("input[name='" + inputName + "']");
        if (input.val() == "No tiene") {
            input.val("");
        }

        // Volver editable el input
        // input.addClass("form-input");
        input.removeClass("border-0");
        input.removeAttr("readonly", true);

    });

});