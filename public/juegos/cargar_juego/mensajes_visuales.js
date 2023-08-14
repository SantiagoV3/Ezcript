export class MensajesVisuales {

    static crearMensaje(textoHTML, hayUnSiguiente) {
        // DIV BASE (CONTIENE TODO EL CONTENIDO DEL MENSAJE)
        let div1 = document.createElement("DIV");
        div1.classList.add("mensaje");
        div1.classList.add("visible");

        div1.style.position = "absolute";
        div1.style.left = "50%";
        div1.style.bottom = "2%";
        div1.style.transform = "translate(-50%, 0%)";
        div1.style.width = "85%";
        div1.style.height = "120px";
        div1.style.background = "DarkOrchid";
        div1.style.font = "24px sans-serif"
        div1.style.borderRadius = "12px";
        // div1.style.overflowWrap = "break-word";
        // div1.style.wordWrap = "break-word";

        //DIV DE LOS BOTONES DEL MENSAJE
        let divBotones = document.createElement("DIV");

        divBotones.style.position = "relative";
        divBotones.style.display = "flex";
        divBotones.style.width = "100%";
        divBotones.style.height = "20%";
        divBotones.style.margin = "auto";
        // divBotones.style.background = "blue";
        divBotones.style.textAlign = "center";
        divBotones.style.alignItems = "left";
        divBotones.style.justifyContent = "right";

        div1.appendChild(divBotones);

        // DIV #2 (CONTIENE EL BOTÓN PARA MOSTRAR EL SIGUIENTE)

        var botonMostrarSiguiente = document.createElement("BUTTON");
        botonMostrarSiguiente.style.left = "0px";
        botonMostrarSiguiente.style.width = "32px";
        botonMostrarSiguiente.style.height = "32px";
        botonMostrarSiguiente.style.overflow = "hidden";
        botonMostrarSiguiente.style.margin = "5px";
        botonMostrarSiguiente.style.padding = "0";
        botonMostrarSiguiente.style.backgroundColor = "transparent";
        botonMostrarSiguiente.style.border = "0 solid #000000"

        var imagenBotónSiguiente = document.createElement("IMG");

        if (hayUnSiguiente || hayUnSiguiente == null) {
            imagenBotónSiguiente.src = "./cargar_juego/img/botones/ejecutar.png";
            imagenBotónSiguiente.style.width = "30px";
            imagenBotónSiguiente.style.height = "30px";
        } else {
            imagenBotónSiguiente.src = "./cargar_juego/img/botones/cerrar.png";
            imagenBotónSiguiente.style.width = "32px";
            imagenBotónSiguiente.style.height = "32px";
            imagenBotónSiguiente.style.alignSelf = "center";

            // imagenBotónSiguiente.style.right = "20px";
            // imagenBotónSiguiente.style.marginTop = "8px";
        }

        botonMostrarSiguiente.appendChild(imagenBotónSiguiente);

        botonMostrarSiguiente.addEventListener("click", function() {
            document.body.removeChild(div1);
        });

        divBotones.appendChild(botonMostrarSiguiente);

        //DIV DEL TEXTO DEL MENSAJE
        let divTexto = document.createElement("DIV");

        divTexto.style.position = "relative";
        divTexto.style.display = "block";
        divTexto.style.width = "95%";
        divTexto.style.height = "60%";
        divTexto.style.margin = "auto";
        divTexto.style.marginBottom = "20px";
        // divTexto.style.background = "pink";
        divTexto.style.textAlign = "center";
        divTexto.style.verticalAlign = "middle";
        divTexto.style.alignItems = "center";
        // divTexto.style.alignContent = "center";
        // divTexto.style.justifyContent = "middle";
        divTexto.style.color = "#FFF8DC";
        divTexto.style.overflow = "hidden";
        divTexto.style.overflowWrap = "break-word";
        divTexto.style.wordWrap = "break-word";
        // divTexto.style.wordBreak = "break-all";
        // divTexto.style.whiteSpace = "pre-wrap"

        // Reemplazar {linkimagen} por <img src="linkimagen" >

        var palabras = textoHTML.split(" ");

        for (var i = 0; i <= palabras.length - 1; i++) {
            palabras[i] = MensajesVisuales.convertirSintaxis(palabras[i]);
        }

        textoHTML = "";
        palabras.forEach(palabra => {
            textoHTML += palabra + " ";
        });

        var parrafo = document.createElement("span");
        parrafo.style.alignSelf = "center";
        parrafo.innerHTML = textoHTML;

        divTexto.appendChild(parrafo);

        div1.appendChild(divTexto);

        return div1;
    }

    static mostrarMensaje(textoHTML, hayUnSiguiente) {

        // AGREGAR EL MENSAJE CREADO A LA
        let mensajeVisual = MensajesVisuales.crearMensaje(textoHTML, hayUnSiguiente);

        // CREAR LA VENTANA
        document.body.appendChild(mensajeVisual);

        return mensajeVisual;

    }

    static mostrarMensaje(mensajeVisual) {
        document.body.appendChild(mensajeVisual);
    }

    static mostrarMúltiplesMensajes(listaTextosHTML) {

        var listaMensajesVisuales = [];

        // Crear los mensajes
        for (var i = listaTextosHTML.length - 1; i >= 0; i--) {
            var mensajeActual = MensajesVisuales.crearMensaje(listaTextosHTML[i], i == listaTextosHTML.length - 1 ? false : true);
            listaMensajesVisuales.push(mensajeActual);
        }

        // Mostrar los mensajes por pantalla
        for (var i = 0; i < listaMensajesVisuales.length; i++) {
            MensajesVisuales.mostrarMensaje(listaMensajesVisuales[i]);
        }
    }

    // Transforma la sintaxis del mensaje visual en código HTML
    static convertirSintaxis(palabra) {

        // Obtener los parámetros principales
        var expresión = palabra.substring(0, palabra.indexOf("{") + 1);
        var stringHTML = "";

        // Verificar y transformas la expresión

        switch (expresión) {
            case "imagen{":

                var urlImagen = MensajesVisuales.obtenerContenidoDeSintaxis(palabra);

                stringHTML = palabra.replace("imagen{" + urlImagen + "}", "<img src=\"" + urlImagen + "\" style=\"height: 32px; width: auto;\" >");

                break;

            case "{":

                var texto = MensajesVisuales.obtenerContenidoDeSintaxis(palabra);

                stringHTML = palabra.replace("{" + texto + "}", "<span>" + texto + "</span>");

                break;
            default:
                var texto = MensajesVisuales.obtenerContenidoDeSintaxis(palabra);

                stringHTML = palabra.replace(texto, texto);

                break;

        }

        // Ajustar el texto para que encaje con los límites del div

        var parámetrosBase = "position:relative; ";

        // Agregar los parámetros adicionales que la expresión pueda tener

        var parámetrosAdicionales = MensajesVisuales.obtenerParámetrosAdicionalesDeSintaxis(palabra);

        stringHTML = stringHTML.replace("[" + parámetrosAdicionales + "]", "");

        stringHTML = stringHTML.replace(">", " style=\"" + parámetrosBase + parámetrosAdicionales + "\" >");

        return stringHTML;
    }

    // Retorna el contenido que se encuentra dentro de los "{ }" del mensaje como un string
    // Ejemplo: MensajesVisuales(imagen{archivo.jpg}) -> "archivo.jpg"
    static obtenerContenidoDeSintaxis(palabra) {
        return palabra.substring(palabra.indexOf("{") + 1, palabra.lastIndexOf("}"));
    }

    static obtenerParámetrosAdicionalesDeSintaxis(palabra) {
        return palabra.substring(palabra.lastIndexOf("[") + 1, palabra.lastIndexOf("]"));
    }
}