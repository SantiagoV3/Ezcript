import { Mapa } from './entidades/Mapa.js';
import { Personaje } from './entidades/Personaje.js';
import { Meta } from './entidades/Meta.js';
import { Obstaculo } from './entidades/Obstaculo.js'

export function cargar_nivel(i) {
    switch (i) {
        case "01P":
            return nivel_1();
        case "02P":
            return nivel_2();
        case "03P":
            return nivel_3();
        case "04P":
            return nivel_4();
        case "05P":
            return nivel_5();
        case "06P":
            return nivel_6();
        case "07P":
            return nivel_7();
        case "08P":
            return nivel_8();
        case "09P":
            return nivel_9();
        case "10P":
            return nivel_10();
        case "11P":
            return nivel_11();
        case "12P":
            return nivel_12();
        case "13P":
            return nivel_13();
        case "14P":
            return nivel_14();
        case "15P":
            return nivel_15();
        case "16P":
            return nivel_16();
        case "17P":
            return nivel_17();
        case "18P":
            return nivel_18();
        case "19P":
            return nivel_19();
        case "20P":
            return nivel_20();
    }
}

export function cargar_mensajes(i) {
    switch (i) {
        case "01P":
            return mensajes_1();
        case "02P":
            return mensajes_2();
        case "03P":
            return mensajes_3();
        case "04P":
            return mensajes_4();
        case "05P":
            return mensajes_5();
        case "06P":
            return mensajes_6();
        case "07P":
            return mensajes_7();
        case "08P":
            return mensajes_8();
        case "09P":
            return mensajes_9();
        case "10P":
            return mensajes_10();
        case "11P":
            return mensajes_11();
        case "12P":
            return mensajes_12();
        case "13P":
            return mensajes_13();
        case "14P":
            return mensajes_14();
        case "15P":
            return mensajes_15();
        case "16P":
            return mensajes_16();
        case "17P":
            return mensajes_17();
        case "18P":
            return mensajes_18();
        case "19P":
            return mensajes_19();
        case "20P":
            return mensajes_20();
    }
}

export function cargar_consola(i) {
    switch (i) {
        case "01P":
            return consola_1();
        case "02P":
            return consola_2();
        case "03P":
            return consola_3();
        case "04P":
            return consola_4();
        case "05P":
            return consola_5();
        case "06P":
            return consola_6();
        case "07P":
            return consola_7();
        case "08P":
            return consola_8();
        case "09P":
            return consola_9();
        case "10P":
            return consola_10();
        case "11P":
            return consola_11();
        case "12P":
            return consola_12();
        case "13P":
            return consola_13();
        case "14P":
            return consola_14();
        case "15P":
            return consola_15();
        case "16P":
            return consola_16();
        case "17P":
            return consola_17();
        case "18P":
            return consola_18();
        case "19P":
            return consola_19();
        case "20P":
            return consola_20();
    }
}

// Nivel 1
function nivel_1() {
    const mapa = new Mapa(4, 4);
    const personaje = new Personaje(1, 1);
    const meta = new Meta(2, 1);

    var datos = [];
    datos.push(mapa);
    datos.push(meta);
    datos.push(personaje);

    return datos;
}

function mensajes_1() {
    var mensajes = [
        "Hola, en este nivel aprenderás los fundamentos básicos de la programación",
        "Tu misión consiste en darle instrucciones al robot ( imagen{./cargar_juego/img/texturas/robot_parado.gif} ) para que pueda robar el diamante ( imagen{./cargar_juego/img/texturas/diamante.png} )",
        "Para mover el robot una casilla a la derecha, escribe la instrucción {\"mover_derecha\"}[color:LawnGreen;font-weight:bold;] en la ventana que dice {\"Hacking}[color:Turquoise;font-weight:bold] {Windows\"}[color:Turquoise;font-weight:bold] y presiona el botón {ejecutar:}[color:Turquoise;font-weight:bold;] ( imagen{./cargar_juego/img/extras/boton_ejecutar_(pantallaso).png} )"
    ];
    return mensajes;
}

function consola_1() {
    return "";
}

// Nivel 2
function nivel_2() {
    const mapa = new Mapa(5, 5);
    const personaje = new Personaje(1, 1);
    const meta = new Meta(3, 1);

    var datos = [];
    datos.push(mapa);
    datos.push(meta);
    datos.push(personaje);

    return datos;
}

function mensajes_2() {
    var mensajes = [
        "!Felicidades! Acabas de programar tu primer robot",
        "Como podrás ver, ahora el diamante esta más lejos que antes",
        "Por ende, deberás lograr que el robot se mueva 2 veces a la derecha para robar el diamante",
        "Para lograrlo, escribe la instrucción la instrucción {\"mover_derecha\"}[color:LawnGreen;font-weight:bold;] 2 veces"
    ];
    return mensajes;
}

function consola_2() {
    return "";
}

// Nivel 3
function nivel_3() {
    const mapa = new Mapa(7, 6);
    const personaje = new Personaje(1, 2);
    const meta = new Meta(5, 2);

    var datos = [];
    datos.push(mapa);
    datos.push(meta);
    datos.push(personaje);

    return datos;
}

function mensajes_3() {
    var mensajes = [
        "Como puedes ver, la programación funciona como una {lista}[color:Turquoise;font-weight:bold;] {de}[color:Turquoise;font-weight:bold;] {instrucciones}[color:Turquoise;font-weight:bold;], en la que cada línea de código equivale a una instrucción",
        "Cuando presionas el botón {ejecutar}[color:Turquoise;font-weight:bold;], el robot seguirá todas las instrucciones desde la primera línea hasta la última",
        "Siguiendo esa lógica, ahora intenta que el robot se mueva 5 casillas a la derecha"
    ];
    return mensajes;
}

function consola_3() {
    return "";
}

// Nivel 4
function nivel_4() {
    const mapa = new Mapa(5, 5);
    const personaje = new Personaje(2, 2);
    const meta = new Meta(2, 1);

    var datos = [];
    datos.push(mapa);
    datos.push(meta);
    datos.push(personaje);

    return datos;
}

function mensajes_4() {
    var mensajes = [
        "Ahora veamos cómo lograr que el robot se mueva hacia los demás lados",
        "Para lograr que robot se mueva hacia arriba 2 veces, escribe {“mover_arriba”}[color:LawnGreen;font-weight:bold;] 2 veces y luego presiona el botón {ejecutar}[color:Turquoise;font-weight:bold;]"
    ];
    return mensajes;
}

function consola_4() {
    return "";
}

// Nivel 5
function nivel_5() {
    const mapa = new Mapa(5, 5);
    const personaje = new Personaje(2, 2);
    const meta = new Meta(3, 1);

    var datos = [];
    datos.push(mapa);
    datos.push(meta);
    datos.push(personaje);

    return datos;
}

function mensajes_5() {
    var mensajes = [
        "Como se mencionó anteriormente, la programación es similar a crear una {lista}[color:Turquoise;font-weight:bold;] {de}[color:Turquoise;font-weight:bold;] {instrucciones}[color:Turquoise;font-weight:bold;]",
        "Es decir: si primero escribes {\"mover_derecha\"}[color:LawnGreen;font-weight:bold;] y luego escribes {\"mover_arriba\"}[color:LawnGreen;font-weight:bold;], el robot primero se moverá a la derecha y después se moverá hacia arriba",
        "Teniendo eso en mente, escribe las instrucciones {\"mover_derecha\"}[color:LawnGreen;font-weight:bold;] y {\"mover_arriba\"}[color:LawnGreen;font-weight:bold;] en el orden correcto para que el robot llegue al diamante"
    ];
    return mensajes;
}

function consola_5() {
    return "";
}

// Nivel 6
function nivel_6() {
    const mapa = new Mapa(7, 7);
    const personaje = new Personaje(1, 4);
    const meta = new Meta(5, 2);

    var datos = [];
    datos.push(mapa);
    datos.push(meta);
    datos.push(personaje);

    return datos;
}

function mensajes_6() {
    var mensajes = ["Aplicando todo lo que has aprendido, escribe las instrucciones {“mover_derecha”}[color:LawnGreen;font-weight:bold;] y {“mover_arriba”}[color:LawnGreen;font-weight:bold;] las veces que sean necesarias para que el robot llegue al diamante"];
    return mensajes;
}

function consola_6() {
    return "";
}

// Nivel 7
function nivel_7() {
    const mapa = new Mapa(6, 6);
    const personaje = new Personaje(4, 1);
    const meta = new Meta(1, 3);


    var datos = [];
    datos.push(mapa);
    datos.push(meta);
    datos.push(personaje);

    return datos;
}

function mensajes_7() {
    var mensajes = [
        "¡Muy bien! Una vez ya has aprendido la lógica básica de la programación, ahora sigue aprender más instrucciones",
        "También puedes hacer que el robot se mueva hacia abajo y hacia la izquierda",
        "Para este nivel, escribe las instrucciones {\"mover_abajo\"}[color:LawnGreen;font-weight:bold;] y {\"mover_arriba\"}[color:LawnGreen;font-weight:bold;] para que el robot llegue al diamante"
    ];
    return mensajes;
}

function consola_7() {
    return "";
}

// VARIABLES

// Nivel 8 - VARIABLES

function nivel_8() {
    const mapa = new Mapa(7, 7);
    const personaje = new Personaje(5, 2);
    const meta = new Meta(5, 4);
    const obstaculo1 = new Obstaculo(2, 3);
    const obstaculo2 = new Obstaculo(3, 3);
    const obstaculo3 = new Obstaculo(4, 3);
    const obstaculo4 = new Obstaculo(5, 3);

    var datos = [];
    datos.push(mapa);
    datos.push(meta);
    datos.push(personaje);
    datos.push(obstaculo1);
    datos.push(obstaculo2);
    datos.push(obstaculo3);
    datos.push(obstaculo4);

    return datos;
}

function mensajes_8() {
    var mensajes = [
        "¡Felicidades, estas muy cerca de dominar la lógica básica de la programación!",
        "Ahora, deberás aplicar todo lo que has aprendido para que el robot alcance el diamante y sortee todos los obstáculos (imagen{./cargar_juego/img/texturas/atril_con_vidrio.png}).",
        "Escribe las instrucciones {“mover_arriba”}[color:LawnGreen;font-weight:bold;], {“mover_abajo”}[color:LawnGreen;font-weight:bold;], {“mover_izquierda”}[color:LawnGreen;font-weight:bold;] y {“mover_derecha”}[color:LawnGreen;font-weight:bold;] para que el robot llegue al diamante"
    ];
    return mensajes;
}

function consola_8() {
    return "";
}

// Nivel 9

function nivel_9() {
    const mapa = new Mapa(6, 6);
    const personaje = new Personaje(1, 2);
    const meta = new Meta(4, 2);

    var datos = [];
    datos.push(mapa);
    datos.push(meta);
    datos.push(personaje);

    return datos;
}

function mensajes_9() {
    const mensajes = [
        "¡Bien, ahora vamos a ver {las}[color:Turquoise;font-weight:bold;] {variables}[color:Turquoise;font-weight:bold;]!",
        "De forma sencilla, las variables son elementos que permiten amacenar datos ( {números}[color:Turquoise;font-weight:bold;], {textos}[color:Turquoise;font-weight:bold;], {fechas}[color:Turquoise;font-weight:bold;], {horas}[color:Turquoise;font-weight:bold;], etc)",
        "En esta ocasión, nuestra variable es la letra {\"i\"}[color:LawnGreen;font-weight:bold;] ( imagen{./cargar_juego/img/extras/variable_i.png} ) que se encuentra en la primera linea de la ventana {\"Hacking}[font-weight:bold] {Windows\"}[font-weight:bold]",
        "Para asignarle un valor, escribe un número cualquiera al lado derecho de la flecha ( imagen{./cargar_juego/img/extras/variable_i.png} )"
    ];
    return mensajes;
}

function consola_9() {
    const consola =
        "i<-\n" +
        "mover_derecha\n" +
        "mover_derecha\n" +
        "mover_derecha\n";

    return consola;
}

// Nivel 10 - BIFURCACIÓN

function nivel_10() {
    const mapa = new Mapa(6, 6);
    const personaje = new Personaje(1, 2);
    const meta = new Meta(4, 2);

    var datos = [];
    datos.push(mapa);
    datos.push(meta);
    datos.push(personaje);

    return datos;
}

function mensajes_10() {
    const mensajes = [
        "¡Felicidades, has declarado tu primera variable!",
        "También puedes {cambiar}[color:Turquoise;font-weight:bold;] {el}[color:Turquoise;font-weight:bold;] {valor}[color:Turquoise;font-weight:bold;] de esa variable después de declararla",
        "Para cambiar su valor, escribe un nuevo número al lado de la flecha de la segunda variable {\"i\"}[color:LawnGreen;font-weight:bold;] ( imagen{./cargar_juego/img/extras/variable_i.png} )"
    ];
    return mensajes;
}

function consola_10() {
    const consola =
        "i<-1\n" +
        "i<-\n" +
        "mover_derecha\n" +
        "mover_derecha\n" +
        "mover_derecha\n";

    return consola;
}

// Nivel 11

function nivel_11() {
    const mapa = new Mapa(6, 6);
    const personaje = new Personaje(1, 2);
    const meta = new Meta(4, 2);

    var datos = [];
    datos.push(mapa);
    datos.push(meta);
    datos.push(personaje);

    return datos;
}

function mensajes_11() {
    const mensajes = [
        "Seguramente te estarás preguntando el porqué uno debería crear variables",
        "Resulta que con ellas puedes crear {\"rutas}[color:Turquoise;font-weight:bold;] {alternativas\"}[color:Turquoise;font-weight:bold;] para ejecutar diferentes instrucciones",
        "La linea imagen{./cargar_juego/img/extras/linea_si_i=3_entonces.png} permitirá ejecutar las tres instrucciones siguientes solo si su condición imagen{./cargar_juego/img/extras/condicion_i=3.png} se cumple (si la variable {\"i\"}[color:LawnGreen;font-weight:bold;] es igual a 3)",
        "Para comprobarlo, asígnale un valor cualquiera a la variable {\"i\"}[color:LawnGreen;font-weight:bold;] , ejecútalo y después asígnale el número 3 y vuelve a ejecutarlo"
        // "Ahora, deberás aplicar todo lo que has aprendido para que el robot alcance el diamante y sortee todos los obstáculos (imagen{urlObstáculo}).",
        // "Escribe las instrucciones {“mover_arriba”}[color:LawnGreen;font-weight:bold;], {“mover_abajo”}[color:LawnGreen;font-weight:bold;], {“mover_izquierda”}[color:LawnGreen;font-weight:bold;] y {“mover_derecha”}[color:LawnGreen;font-weight:bold;] para que el robot llegue al diamante"
    ];
    return mensajes;
}

function consola_11() {
    const consola =
        "i<-\n\n" +
        "Si i=3 Entonces\n" +
        "        mover_derecha\n" +
        "        mover_derecha\n" +
        "        mover_derecha\n" +
        "Fin Si";

    return consola;
}

// Nivel 12

function nivel_12() {
    const mapa = new Mapa(7, 7);
    const personaje = new Personaje(3, 3);
    const meta = new Meta(1, 3);

    var datos = [];
    datos.push(mapa);
    datos.push(meta);
    datos.push(personaje);

    return datos;
}

function mensajes_12() {
    const mensajes = [
        "También existe la instrucción imagen{./cargar_juego/img/extras/linea_sino.png} que hace lo contrario a la instrucción anterior",
        "En otras palabras, la instrucción imagen{./cargar_juego/img/extras/linea_sino.png} se ejecuta cuando la condición de la instrucción imagen{./cargar_juego/img/extras/linea_si_i=3_entonces.png} no se cumple",
        "Para comprender mejor su funcionamiento, asígnale un valor cualquiera a la variable {\"i\"}[color:LawnGreen;font-weight:bold;] , ejecuta ejecuta el código y analiza lo que ocurre"
    ];
    return mensajes;
}

function consola_12() {
    const consola =
        "i<-\n\n" +
        "Si i=3 Entonces\n" +
        "       mover_derecha\n" +
        "       mover_derecha\n" +
        "SiNo\n" +
        "       mover_izquierda\n" +
        "       mover_izquierda\n" +
        "Fin Si";

    return consola;
}

// Nivel 13

function nivel_13() {
    const mapa = new Mapa(6, 7);
    const personaje = new Personaje(4, 3);
    const meta = new Meta(1, 1);
    const obstaculo1 = new Obstaculo(2, 1);
    const obstaculo2 = new Obstaculo(2, 2);
    const obstaculo3 = new Obstaculo(3, 2);
    const obstaculo4 = new Obstaculo(4, 2);
    const obstaculo5 = new Obstaculo(2, 5);
    const obstaculo6 = new Obstaculo(2, 4);
    const obstaculo7 = new Obstaculo(3, 4);
    const obstaculo8 = new Obstaculo(4, 4);

    var datos = [];
    datos.push(mapa);
    datos.push(meta);
    datos.push(personaje);
    datos.push(obstaculo1);
    datos.push(obstaculo2);
    datos.push(obstaculo3);
    datos.push(obstaculo4);
    datos.push(obstaculo5);
    datos.push(obstaculo6);
    datos.push(obstaculo7);
    datos.push(obstaculo8);

    return datos;
}

function mensajes_13() {
    const mensajes = [
        "¡Bien! Ahora siguiendo la lógica vista anteriormente, tu misión para que el robot alcance el diamante será la siguiente:",
        "Primero que todo, escribe tu primera variable y asignale un número cualquiera...",
        "Luego, escribe una condición al lado de la sentencia imagen{./cargar_juego/img/extras/condicional_si.png} para que se ejecute",
        "Por ejemplo, si declaraste la variable {\"i\"}[color:LawnGreen;font-weight:bold;] con el siguiente valor: imagen{./cargar_juego/img/extras/variable_i=5.png}, entonces la condición debería ser imagen{./cargar_juego/img/extras/condicion_i=5.png}"
    ];
    return mensajes;
}

function consola_13() {
    const consola =
        "mover_izquierda\n" +
        "mover_izquierda\n" +
        "mover_izquierda\n" +
        "Si  Entonces\n" +
        "       mover_arriba\n" +
        "       mover_arriba\n" +
        "SiNo \n" +
        "       mover_abajo\n" +
        "       mover_abajo\n" +
        "Fin Si";

    return consola;
}

// Nivel 14 - BUCLE REPETIR HASTA QUE

function nivel_14() {
    const mapa = new Mapa(8, 8);
    const personaje = new Personaje(1, 3);
    const meta = new Meta(6, 3);

    var datos = [];
    datos.push(mapa);
    datos.push(meta);
    datos.push(personaje);

    return datos;
}

function mensajes_14() {
    var mensajes = [
        "Ahora es momento de aprender a utilizar {los}[color:Turquoise;font-weight:bold;] {bucles}[color:Turquoise;font-weight:bold;]",
        "Los bucles son instrucciones que permiten ejecutar una o varias lineas de código {múltiples}[color:Turquoise;font-weight:bold;] {veces}[color:Turquoise;font-weight:bold;]",
        "El bucle que veremos ahora es el bucle {\"Repetir\"}[color:LawnGreen;font-weight:bold;] ( imagen{./cargar_juego/img/extras/bucle_repetir.png} )",
        "En este caso, este bucle permitirá ejecutar todo lo que se encuentre desde la linea imagen{./cargar_juego/img/extras/bucle_repetir.png} hasta la linea imagen{./cargar_juego/img/extras/bucle_hasta_que.png}",
        "El bucle dejará de ejecutarse una vez se cumpla la condición que está en la linea imagen{./cargar_juego/img/extras/bucle_hasta_que.png}, o sea, hasta que la variable {\"i\"}[color:LawnGreen;font-weight:bold;] sea igual a 0",
        "Para ejecutar este bucle, asígnale el valor necesario a la variable {\"i\"}[color:LawnGreen;font-weight:bold;] para que la instrucción imagen{./cargar_juego/img/extras/instruccion_mover_derecha.png} se ejecute 5 veces"
    ];
    return mensajes;
}

function consola_14() {
    const consola =
        "i<-\n" +
        "Repetir\n" +
        "        mover_derecha\n" +
        "        i<-i-1\n" +
        "Hasta Que i=0";

    return consola;
}

// Nivel 15

function nivel_15() {
    const mapa = new Mapa(8, 8);
    const personaje = new Personaje(1, 2);
    const meta = new Meta(6, 5);

    var datos = [];
    datos.push(mapa);
    datos.push(meta);
    datos.push(personaje);

    return datos;
}

function mensajes_15() {
    var mensajes = [
        "Como pudiste apreciar, los bucles resultan muy útiles para {ahorrar}[color:Turquoise;font-weight:bold;] {espacio}[color:Turquoise;font-weight:bold;] cuando se necesite ejecutar varias instrucciones múltiples veces",
        "En este nivel hay 2 bucles similares al anterior y cada uno posee su respectiva variable de control ( {\"i\"}[color:LawnGreen;font-weight:bold;] y {\"j\"}[color:LawnGreen;font-weight:bold;] )",
        "Basándote en el bucle del nivel anterior, asígnales el valor necesario a las variables {\"i\"}[color:LawnGreen;font-weight:bold;] y {\"j\"}[color:LawnGreen;font-weight:bold;] para que el robot capture el diamante"
    ];
    return mensajes;
}

function consola_15() {
    const consola =
        "i<-\n" +
        "Repetir\n" +
        "        mover_derecha\n" +
        "        i<-i-1\n" +
        "Hasta Que i=0\n\n" +
        "j<-\n" +
        "Repetir\n" +
        "        mover_abajo\n" +
        "        j<-j-1\n" +
        "Hasta Que j=0";

    return consola;
}

// Nivel 16

function nivel_16() {
    const mapa = new Mapa(7, 7);
    const personaje = new Personaje(1, 1);
    const meta = new Meta(5, 5);
    const obstaculo1 = new Obstaculo(4, 1);
    const obstaculo2 = new Obstaculo(4, 2);
    const obstaculo3 = new Obstaculo(4, 3);
    const obstaculo4 = new Obstaculo(4, 4);
    const obstaculo5 = new Obstaculo(2, 2);
    const obstaculo6 = new Obstaculo(2, 3);
    const obstaculo7 = new Obstaculo(2, 4);
    const obstaculo8 = new Obstaculo(2, 5);
    const obstaculo9 = new Obstaculo(1, 2);
    const obstaculo10 = new Obstaculo(5, 4);

    var datos = [];
    datos.push(mapa);
    datos.push(meta);
    datos.push(personaje);
    datos.push(obstaculo1);
    datos.push(obstaculo2);
    datos.push(obstaculo3);
    datos.push(obstaculo4);
    datos.push(obstaculo5);
    datos.push(obstaculo6);
    datos.push(obstaculo7);
    datos.push(obstaculo8);
    datos.push(obstaculo9);
    datos.push(obstaculo10);

    return datos;
}

function mensajes_16() {
    var mensajes = [
        "¡Muy bien, estas aprendiendo bastate!",
        "Ahora hagamos el mismo ejercicio pero a la inversa.",
        "Asignale valores a todas las {variables}[color:Turquoise;font-weight:bold;] y completa las {condiciones}[color:Turquoise;font-weight:bold;] faltantes de los bucles para que el robot capture el diamante."
    ];
    return mensajes;
}

function consola_16() {
    const consola =
        "i<-\n" +
        "Repetir\n" +
        "        mover_derecha\n" +
        "        i<-i-1\n" +
        "Hasta Que \n\n" +
        "j<-\n" +
        "Repetir\n" +
        "        mover_abajo\n" +
        "        j<-j-1\n" +
        "Hasta Que \n\n" +
        "k<-\n" +
        "Repetir\n" +
        "        mover_derecha\n" +
        "        k<-k-1\n" +
        "Hasta Que ";
    return consola;
}

// Nivel 17 - BUCLE WHILE

function nivel_17() {
    const mapa = new Mapa(7, 7);
    const personaje = new Personaje(1, 3);
    const meta = new Meta(5, 3);

    var datos = [];
    datos.push(mapa);
    datos.push(meta);
    datos.push(personaje);

    return datos;
}

function mensajes_17() {
    const mensajes = [
        "Ahora vamos a ver otro bucle diferente: el bucle {\"Mientras\"}[color:LawnGreen;font-weight:bold;]",
        "Este bucle ejecutará todo el código que se encuentre dentro desde la linea imagen{./cargar_juego/img/extras/bucle_mientras.png} hasta la linea imagen{./cargar_juego/img/extras/bucle_fin_mientras.png}",
        "Mientras la condición de la linea imagen{./cargar_juego/img/extras/bucle_mientras.png} se cumpla, el código dentro del bucle se ejecutará",
        "Para ver su funcionamiento, asignale un valor cualquiera a la variable {\"i\"}[color:LawnGreen;font-weight:bold;]"
    ];
    return mensajes;
}

function consola_17() {
    const consola =
        "i<-\n" +
        "Mientras i>0 Hacer\n" +
        "        mover_derecha\n" +
        "        i<-i-1\n" +
        "Fin Mientras";

    return consola;
}

// Nivel 18

function nivel_18() {
    const mapa = new Mapa(7, 7);
    const personaje = new Personaje(1, 3);
    const meta = new Meta(5, 3);

    var datos = [];
    datos.push(mapa);
    datos.push(meta);
    datos.push(personaje);

    return datos;
}

function mensajes_18() {
    const mensajes = [
        "¡Espectacular, has llegado bastante lejos!",
        "Para finalzar, vamos a ver el último bucle: el bucle {\"Para\"}[color:LawnGreen;font-weight:bold;]",
        "Este bucle es el más compacto de todos ya que te permite ahorrar muchas mas lineas de código",
        "Este bucle ejecutará todo el código desde la linea imagen{./cargar_juego/img/extras/bucle_para.png} hasta la linea imagen{./cargar_juego/img/extras/bucle_fin_para.png}",
        "Este bucle permite declarar 3 parámetros: la {variable}[color:Turquoise;font-weight:bold;] {de}[color:Turquoise;font-weight:bold;] {control}[color:Turquoise;font-weight:bold;] ( imagen{./cargar_juego/img/extras/variable_i=0.png} ); {el}[color:Turquoise;font-weight:bold;] {valor}[color:Turquoise;font-weight:bold;] {en}[color:Turquoise;font-weight:bold;] {el}[color:Turquoise;font-weight:bold;] {que}[color:Turquoise;font-weight:bold;] {la}[color:Turquoise;font-weight:bold;] {variable}[color:Turquoise;font-weight:bold;] {incrementará}[color:Turquoise;font-weight:bold;] en cada vuelta ( imagen{./cargar_juego/img/extras/bucle_para_con_paso_1.png} )...",
        " y {el}[color:Turquoise;font-weight:bold;] {máximo}[color:Turquoise;font-weight:bold;] {valor}[color:Turquoise;font-weight:bold;] que dicha variable podrá alcanzar ( imagen{./cargar_juego/img/extras/bucle_para_hasta_2.png} )",
        "Intenta modificar {los}[color:Turquoise;font-weight:bold;] {3}[color:Turquoise;font-weight:bold;] {parámetros}[color:Turquoise;font-weight:bold;] de este bucle y ejecuta el código para que puedas comprender mejor su funcionamiento"
    ];
    return mensajes;
}

function consola_18() {
    const consola =
        "Para i<-0 Hasta 2 Con Paso 1 Hacer\n" +
        "        mover_derecha\n" +
        "Fin Para";

    return consola;
}
