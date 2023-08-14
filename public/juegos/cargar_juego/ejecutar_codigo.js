export function traducir(codigo){
  var caso;
  var cadena="";
  var prepalabra="";
  var palabra="";
  var cdg_final="var movimiento='';";
  var variable="";
  var simbolo="";
  codigo+=String.fromCharCode(10);                      //32 espacio  10 enter
  for (var i=0 ; i<codigo.length; i++) {
    if (codigo.charCodeAt(i)==10) {
      for (var j=0; j<cadena.length; j++) {
        if (cadena.charCodeAt(j)!=32 && cadena.charCodeAt(j)!=9) {
          palabra+=cadena.charAt(j);
        }else if ((cadena.charCodeAt(j)==32 || cadena.charCodeAt(j)==9) && palabra!="") {
          j=cadena.length;
        }
      }
      cadena+=String.fromCharCode(32);
      caso=0;
      if (palabra=="Si") {
        caso=1;
      }else if(palabra=="SiNo") {
        caso=2;
      }else if (palabra=="Mientras") {
        caso=3;
      }else if (palabra=="Repetir") {
        caso=4;
      }else if(palabra=="Hasta"){
        caso=5;
      }else if(palabra=="Para") {
        caso=6;
      }else if(palabra=="Fin"){
        caso=7;
      }else if (palabra=="mover_arriba" || palabra=="mover_abajo" || palabra=="mover_izquierda" || palabra=="mover_derecha") {
        caso=8;
      }else if(palabra!=""){
        caso=9;
        cdg_final+="var ";
      }
      palabra="";
      for (var j=0; j<cadena.length; j++) {
        if (cadena.charCodeAt(j)==32 || cadena.charCodeAt(j)==9) {
          if (caso==1) {
            if (palabra=="Si") {
              cdg_final+="if(";
            }else if (palabra=="=") {
              cdg_final+="==";
            }else if (palabra=="Entonces") {
              cdg_final+="){";
            }else {
              cdg_final+=palabra;
            }
          }else if (caso==2) {
            if (palabra=="SiNo") {
              cdg_final+="}else{";
            }else {
              cdg_final+=palabra;
            }
          }else if (caso==3) {
            if (palabra=="Mientras") {
              cdg_final+="while(";
            }else if (palabra=="Hacer") {
              cdg_final+="){";
            }else {
              cdg_final+=palabra;
            }
          }else if (caso==4) {
            if (palabra=="Repetir") {
              cdg_final+="do{";
            }else {
              cdg_final+=palabra;
            }
          }else if (caso==5) {
            if (palabra=="Hasta") {
              prepalabra="Hasta";
            }else if (palabra=="Que" && prepalabra=="Hasta") {
              cdg_final+="}while(!(";
              prepalabra="";
            }else if (j==(cadena.length-1)) {
              cdg_final+=palabra+"));";
              prepalabra="";
            }else if (palabra=="=") {
              cdg_final+="==";
            }else {
              cdg_final+=palabra;
            }
          }else if (caso==6) {
            if (palabra=="Para") {
              cdg_final+="for(var ";
              prepalabra="Para";
            }else if (palabra=="<-") {
              cdg_final+="=";
              prepalabra="";
            }else if (palabra=="Hasta") {
              cdg_final+=";";
              cdg_final+=variable;
              cdg_final+="<";
              prepalabra="";
            }else if (palabra=="Con") {
              prepalabra="Con";
            }else if (palabra=="Paso" && prepalabra=="Con") {
              cdg_final+=";";
              cdg_final+=variable;
              cdg_final+="+=";
              prepalabra="";
            }else if (palabra=="Hacer") {
              cdg_final+="){";
              prepalabra="";
            }else{
              cdg_final+=palabra;
              if (palabra!="") {              //que palabra pasa?
                if (prepalabra=="Para") {
                  variable=palabra;
                }
                prepalabra="";
              }
            }
          }else if (caso==7) {
            if (palabra=="Fin") {
              prepalabra="Fin";
            }else if ((palabra=="Si" || palabra=="Mientras" || palabra=="Para") && prepalabra=="Fin") {
              cdg_final+="}";
              prepalabra="";
            }else {
              cdg_final+=palabra;
              prepalabra="";
            }
          }else if (caso==8) {
            if (palabra=="mover_arriba") {
              cdg_final+="movimiento+='arriba ';";
            }else if (palabra=="mover_abajo") {
              cdg_final+="movimiento+='abajo ';";
            }else if (palabra=="mover_izquierda") {
              cdg_final+="movimiento+='izquierda ';";
            }else if (palabra=="mover_derecha") {
              cdg_final+="movimiento+='derecha ';";
            }
          }else if (caso==9) {
            if (palabra=="<-") {
              cdg_final+="=";
            }else {
              cdg_final+=palabra;
              if (j==(cadena.length-1)) {
                cdg_final+=";";
              }
            }
          }
          cdg_final+=" ";
          palabra="";
        }else {
          palabra+=cadena.charAt(j);
        }
      }
      prepalabra="";
      palabra="";
      cadena="";
    }else {
      if (codigo.charAt(i)=='<' || codigo.charAt(i)=='!' || codigo.charAt(i)=='>' || codigo.charAt(i)=='=' || (codigo.charAt(i)=='-' && simbolo=="<")) {
        simbolo+=codigo.charAt(i);
      }else{
        if (simbolo!="") {
          cadena+=" "+simbolo+" ";
          simbolo="";
        }
        cadena+=codigo.charAt(i);
      }
    }
  }
  cdg_final+="movimiento;";
  var instruccion = ejecutar(cdg_final);
  return instruccion;
}

function ejecutar(codigo) {
  try {
    var myInterpreter = new Interpreter(codigo);
    myInterpreter.run();
    var instruccion=myInterpreter.value.split(" ");
  } catch (e) {
    return null;
  }
  return instruccion;
}
