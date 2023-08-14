
import {Tablero} from './Tablero.js';
import {elegir} from './niveles/datos_niveles.js';
import * as guia from "./niveles/datos_niveles_de_pseudocodigo.js";
import {traducir} from './ejecutar_codigo.js';
import { MensajesVisuales } from "./mensajes_visuales.js";


var datos;
var tablero;
var nivel_elegido;

export function cargar(nivel) {                                                 //carga funciones basicas
  nivel_elegido=nivel;
  elegir_tipo_nivel();
  tablero = new Tablero(datos[0].datos().x,datos[0].datos().y);
  tablero.crear_matriz();
  tablero.muro();
  setInterval(dibujar,1);
}

function elegir_tipo_nivel() {
  if (nivel_elegido.includes("P")) {
   datos = guia.cargar_nivel(nivel_elegido);
   MensajesVisuales.mostrarMúltiplesMensajes(guia.cargar_mensajes(nivel_elegido));
   var consola = document.getElementById("codigo");
   consola.innerHTML += guia.cargar_consola(nivel_elegido);
  }else {
   datos = elegir(nivel_elegido);
  }
}

function dibujar() {                                                            //dibuja plano y objetos
  var plano=document.getElementById('canvas');
  plano.height=document.getElementById('camara').offsetHeight*0.9;
  plano.width=document.getElementById('camara').offsetWidth*0.8;
  var dibujo=plano.getContext("2d");
  var img;
  var tamaño_x=plano.width/datos[0].datos().x;
  var tamaño_y=plano.height/datos[0].datos().y;
  for (var i = 0; i < datos[0].datos().y; i++) {
    for (var j = 0; j < datos[0].datos().x; j++) {
      img = new Image();
      if (tablero.ver(j,i)=="nada") {
        img.src="./cargar_juego/img/texturas/piso.jpg";
      }else{
        img.src="./cargar_juego/img/texturas/pared.jpg";
      }
      dibujo.drawImage(img,j*tamaño_x,i*tamaño_y,tamaño_x,tamaño_y);
    }
  }
  for (var i = 1; i < datos.length; i++) {
    img = new Image()
    if (datos[i].datos().tipo=="personaje") {
      img.src=("./cargar_juego/img/texturas/robot_parado.gif");
    }else if (datos[i].datos().tipo=="meta") {
      img.src="./cargar_juego/img/texturas/diamante.png";
    }else if (datos[i].datos().tipo=="obstaculo") {
      img.src="./cargar_juego/img/texturas/atril_con_vidrio.png";
    }else if (datos[i].datos().tipo=="enemigo") {
      img.src="./cargar_juego/img/texturas/enemigo.png";
    }
    dibujo.drawImage(img,datos[i].x*tamaño_x,datos[i].y*tamaño_y,tamaño_x,tamaño_y);
  }
}

export function traducir_codigo(codigo,origen) {                                //traduce y ejecuta codigo
  var instruccion=traducir(codigo);
  if (instruccion!=null) {
    document.getElementById("bt_ejecutar").disabled=true;
    document.getElementById('codigo').disabled=true;
    if (origen=="personaje") {
      var i=0;
      var movimiento=setInterval(function(){
        mover(instruccion,i,movimiento,2)
        i++;
      },200)
    }
  }else {
    Swal.fire({
      position: 'top-end',
      title: 'Error de sintaxis',
      target: '#consola',
      background: 'rgba(255, 0, 0, 1)',
      customClass: {
        container: 'position-absolute'
      },
      toast: true,
      showConfirmButton: false,
      position: 'bottom-right',
      timer: 1500,
    })
  }
}

function mover(instruccion,i,movimiento,origen) {
  var futuro;
  if (instruccion[i]=="arriba") {
    if (tablero.ver(datos[origen].datos().x,datos[origen].datos().y-1)=="nada") {
      futuro = futuro_movimiento(datos[origen].datos().x,datos[origen].datos().y-1);
      if (futuro=="obstaculo") {
        //consecuencia???
      }else if (futuro=="enemigo") {
        datos[origen].mover_arriba();
        alerta_resultado("enemigo");
        clearInterval(movimiento);
      }else if (futuro=="meta") {
        datos[origen].mover_arriba();
        alerta_resultado("meta");
        clearInterval(movimiento);
      }else{
        datos[origen].mover_arriba();
        if ((i+1)==instruccion.length) {
          alerta_resultado("nada");
          clearInterval(movimiento);
        }
      }
    }
  }else if (instruccion[i]=="abajo") {
    if (tablero.ver(datos[origen].datos().x,datos[origen].datos().y+1)=="nada") {
      futuro = futuro_movimiento(datos[origen].datos().x,datos[origen].datos().y+1);
      if (futuro=="obstaculo") {
        //consecuencia???
      }else if (futuro=="enemigo") {
        datos[origen].mover_abajo();
        alerta_resultado("enemigo");
        clearInterval(movimiento);
      }else if (futuro=="meta") {
        datos[origen].mover_abajo();
        alerta_resultado("meta");
        clearInterval(movimiento);
      }else{
        datos[origen].mover_abajo();
        if ((i+1)==instruccion.length) {
          alerta_resultado("nada");
          clearInterval(movimiento);
        }
      }
    }
  }else if (instruccion[i]=="izquierda") {
    if (tablero.ver(datos[origen].datos().x-1,datos[origen].datos().y)=="nada") {
      futuro = futuro_movimiento(datos[origen].datos().x-1,datos[origen].datos().y);
      if (futuro=="obstaculo") {
        //consecuencia???
      }else if (futuro=="enemigo") {
        datos[origen].mover_izquierda();
        alerta_resultado("enemigo");
        clearInterval(movimiento);
      }else if (futuro=="meta") {
        datos[origen].mover_izquierda();
        alerta_resultado("meta");
        clearInterval(movimiento);
      }else{
        datos[origen].mover_izquierda();
        if ((i+1)==instruccion.length) {
          alerta_resultado("nada");
          clearInterval(movimiento);
        }
      }
    }
  }else if (instruccion[i]=="derecha") {
    if (tablero.ver(datos[origen].datos().x+1,datos[origen].datos().y)=="nada") {
      futuro = futuro_movimiento(datos[origen].datos().x+1,datos[origen].datos().y);
      if (futuro=="obstaculo") {
        //consecuencia???
      }else if (futuro=="enemigo") {
        datos[origen].mover_derecha();
        alerta_resultado("enemigo");
        clearInterval(movimiento);
      }else if (futuro=="meta") {
        datos[origen].mover_derecha();
        alerta_resultado("meta");
        clearInterval(movimiento);
      }else{
        datos[origen].mover_derecha();
        if ((i+1)==instruccion.length) {
          alerta_resultado("nada");
          clearInterval(movimiento);
        }
      }
    }
  }else{
    alerta_resultado("nada");
    clearInterval(movimiento);
  }
}

function futuro_movimiento(x,y) {
  for (var i = 1; i < datos.length; i++) {
    if(x==datos[i].datos().x && y==datos[i].datos().y){
      return datos[i].datos().tipo;
    }
  }
  return null;
}

function alerta_resultado(resultado) {
  if (resultado=="meta") {
    Swal.fire({
      color: '#716add',
      imageUrl: './cargar_juego/img/alertas/Ganar.gif',
      backdrop: 'rgba(0,0,0,0.4)',
      background: 'rgba(0,0,0,0.0)',
      allowOutsideClick: false,
      showClass: {
        popup: 'animate__animated animate__fadeIn animate__faster animate__delay-1s',
        backdrop: 'animate__animated animate__fadeIn animate__delay-1s'
      },
      confirmButtonColor: '#3085d6',
      confirmButtonText: 'Volver a intentar',
    }).then((result) => {
      if (result.isConfirmed) {
        document.getElementById("bt_ejecutar").disabled=false;
        document.getElementById('codigo').disabled=false;
        elegir_tipo_nivel()
      }
    })
  }else if (resultado=="enemigo") {
    Swal.fire({
      color: '#716add',
      imageUrl: './cargar_juego/img/alertas/Cinta.png',
      backdrop: 'rgba(0,0,0,0.6)',
      background: 'rgba(0,0,0,0.0)',
      allowOutsideClick: false,
      showClass: {
        popup: 'animate__animated animate__fadeIn animate__faster animate__delay-3s',
        backdrop: 'animate__animated animate__fadeIn animate__slower'
      },
      confirmButtonColor: '#3085d6',
      confirmButtonText: 'Volver a intentar',
    }).then((result) => {
      if (result.isConfirmed) {
        document.getElementById("bt_ejecutar").disabled=false;
        document.getElementById('codigo').disabled=false;
        elegir_tipo_nivel()
      }
    })
  }else {
    Swal.fire({
      color: '#716add',
      imageUrl: './cargar_juego/img/alertas/No_Meta.gif',
      backdrop: 'rgba(0,0,0,0.4)',
      background: 'rgba(0,0,0,0.0)',
      allowOutsideClick: false,
      showClass: {
        popup: 'animate__animated animate__fadeIn animate__faster animate__delay-1s',
        backdrop: 'animate__animated animate__fadeIn animate__delay-1s'
      },
      confirmButtonColor: '#3085d6',
      confirmButtonText: 'Volver a intentar',
    }).then((result) => {
      if (result.isConfirmed) {
        document.getElementById("bt_ejecutar").disabled=false;
        document.getElementById('codigo').disabled=false;
        elegir_tipo_nivel()
      }
    })
  }
}
