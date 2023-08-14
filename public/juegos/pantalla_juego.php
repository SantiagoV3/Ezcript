<?php
  if (!empty($_POST)) {
    if (isset($_POST["nivel_1_pseudocodigo"])) {
      $SESION["nivel"]="01";
    }elseif (isset($_POST["nivel_2_pseudocodigo"])) {
      $SESION["nivel"]="02";
    }elseif (isset($_POST["nivel_1_tutorial"])) {
      $SESION["nivel"]="01P";
    }elseif (isset($_POST["nivel_2_tutorial"])) {
      $SESION["nivel"]="02P";
    }elseif (isset($_POST["nivel_3_tutorial"])) {
      $SESION["nivel"]="03P";
    }elseif (isset($_POST["nivel_4_tutorial"])) {
      $SESION["nivel"]="04P";
    }elseif (isset($_POST["nivel_5_tutorial"])) {
      $SESION["nivel"]="05P";
    }elseif (isset($_POST["nivel_6_tutorial"])) {
      $SESION["nivel"]="06P";
    }elseif (isset($_POST["nivel_7_tutorial"])) {
      $SESION["nivel"]="07P";
    }elseif (isset($_POST["nivel_8_tutorial"])) {
      $SESION["nivel"]="08P";
    }elseif (isset($_POST["nivel_9_tutorial"])) {
      $SESION["nivel"]="09P";
    }elseif (isset($_POST["nivel_10_tutorial"])) {
      $SESION["nivel"]="10P";
    }elseif (isset($_POST["nivel_11_tutorial"])) {
      $SESION["nivel"]="11P";
    }elseif (isset($_POST["nivel_12_tutorial"])) {
      $SESION["nivel"]="12P";
    }elseif (isset($_POST["nivel_13_tutorial"])) {
      $SESION["nivel"]="13P";
    }elseif (isset($_POST["nivel_14_tutorial"])) {
      $SESION["nivel"]="14P";
    }elseif (isset($_POST["nivel_15_tutorial"])) {
      $SESION["nivel"]="15P";
    }elseif (isset($_POST["nivel_16_tutorial"])) {
      $SESION["nivel"]="16P";
    }elseif (isset($_POST["nivel_17_tutorial"])) {
      $SESION["nivel"]="17P";
    }elseif (isset($_POST["nivel_18_tutorial"])) {
      $SESION["nivel"]="18P";
    }
  }
?>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="./cargar_juego/css/estilo.css">
    <link rel="stylesheet" href="../../node_modules/animate.css/animate.min.css"/>
    <script src="../../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../../node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script src="./cargar_juego/acorn_interpreter.js"></script>
    <script src="./cargar_juego/area_texto.js"></script>
    <script type="module">
      import {cargar} from './cargar_juego/cargar_nivel.js';
      cargar("<?php echo $SESION["nivel"] ?>");
    </script>
  </head>
  <body>
    <header>
      <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="../cursos/">
          <img clname="volver" src="cargar_juego/img/botones/volver.png" width="4%" height="4%" class="d-inline-block align-top" alt="">
        </a>
        <label for="vovler" class="vertical-center" >volver a los niveles</label>
      </nav>
    </header>
    <div id="espacio_izquierda">
      <div class="cuadro" id="cuadro_consola">
        <p class="titulo">
          Haking Windows
          <img class="botones_ventana" src="./cargar_juego/img/ventana/botones_ventana.png">
        </p>
        <div class="sub_cuadro" id="consola">
          <textarea id="codigo" name="codigo" placeholder="Escribe las instrucciones" onkeydown="if(event.keyCode===9 || event.keyCode===13){leer_letra(event);return false;}"></textarea>
          <div id="alerta_consola"> </div>
        </div>
      </div>
    </div>
    <div id="espacio_derecha">
      <div class="cuadro" id="cuadro_camara">
        <p class="titulo">
          Camara <?php echo $SESION["nivel"] ?>: Habitación del diamante
          <img id="punto" src="./cargar_juego/img/ventana/Punto.gif" >
          <img class="botones_ventana" src="./cargar_juego/img/ventana/botones_ventana.png">
        </p>
        <div class="sub_cuadro" id="camara">
          <canvas id="canvas"></canvas>
        </div>
      </div>
    </div>
    <div id="barra_botones">
      <input class="boton" id="bt_niver_anterior" type="image" src="./cargar_juego/img/botones/niver_anterior.png">
      <input class="boton" id="bt_ejecutar" type="image" src="./cargar_juego/img/botones/ejecutar.png">
      <input class="boton" id="bt_guardar" type="image" src="./cargar_juego/img/botones/Guardar.png">
      <input class="boton"id="bt_siguiente_nivel" type="image" src="./cargar_juego/img/botones/siguiente_nivel.png">
      <script type="module">
      import {traducir_codigo} from './cargar_juego/cargar_nivel.js';
      document.getElementById('bt_ejecutar').addEventListener("click",traducir);
      function traducir() {
        traducir_codigo(document.getElementById('codigo').value,"personaje");
      }
      </script>
    </div>
  </body>
</html>
