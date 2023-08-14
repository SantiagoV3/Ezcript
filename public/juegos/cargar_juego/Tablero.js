export class Tablero {
  constructor(x,y) {
    this.tamaño_x=x;
    this.tamaño_y=y;
    this.obj = new Array();
  }

  crear_matriz() {
    for (var i = 0; i < this.tamaño_y ; i++) {
      this.obj[i] = new Array();
      for (var j = 0; j < this.tamaño_x; j++) {
        this.obj[i][j]="nada";
      }
    }
  }

  muro(){
    for (var i = 0; i < this.tamaño_x; i++) {
      this.obj[0][i]="muro";
      this.obj[this.tamaño_y-1][i]="muro";
    }
    for (var i = 0; i < this.tamaño_y; i++) {
      this.obj[i][0]="muro";
      this.obj[i][this.tamaño_x-1]="muro";
    }
  }

  ver(x,y){
    return this.obj[y][x];
  }
}
