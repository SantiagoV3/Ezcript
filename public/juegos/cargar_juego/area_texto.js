var texto="";
var cadena="";
var palabra="";
var aux="";
var contador;

function leer_letra(e) {
  var texto="";
  tecla=(document.all) ? e.keyCode : e.which;
  var codigo=document.getElementById('codigo');
  var s=codigo.selectionStart;
  var e=codigo.selectionEnd;
  if (tecla==13) {
    contador=0;
    for (var i = 0; i < codigo.selectionStart; i++) {
      if (codigo.value.charCodeAt(i)==10 || i==codigo.selectionStart-1) {
        if (i==codigo.selectionStart-1 && codigo.value.charCodeAt(i)!=10) {
          cadena+=codigo.value.charAt(i);
        }
        for (var j = 0; j < cadena.length; j++) {
          if ((cadena.charCodeAt(j)==32 && (palabra!="Fin" && palabra!="Hasta")) || cadena.charCodeAt(j)==9 || j==cadena.length-1) {
            if (j==cadena.length-1 && cadena.charCodeAt(j)!=32 && cadena.charCodeAt(j)!=9) {
              palabra+=cadena.charAt(j);
            }
            if (palabra!="") {
              if (aux=="" && palabra=="Hasta Que") {
                var aux=palabra;
                 j = cadena.length;
              }else {
                var aux=palabra;
              }
            }
            palabra="";
          }else {
            palabra+=cadena.charAt(j);
          }
        }
        if (aux=="Hacer" || aux=="Entonces" || aux=="Repetir") {
          contador++;
        }else if ((aux=="Fin Para" || aux=="Fin Si" || aux=="Hasta Que" || aux=="Fin Mientras") && contador>0) {
          contador--;
        }
        cadena="";
        aux="";
      }else {
        cadena+=codigo.value.charAt(i);
      }
    }
    texto=codigo.value.substring(0, s)+String.fromCharCode(10);;
    for (var j = 0; j < contador; j++) {
      texto+='\t';
    }
    codigo.value=texto+codigo.value.substring(e);
    codigo.selectionStart=codigo.selectionEnd=s+contador+1;
  }
  if (tecla==9) {
    codigo.value=codigo.value.substring(0, s)+'\t'+codigo.value.substring(e);
    codigo.selectionStart=codigo.selectionEnd=s+1;
  }
}
