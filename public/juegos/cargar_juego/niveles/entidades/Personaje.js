export class Personaje {
  constructor(x,y) {
    this.x=x;
    this.y=y;
  }

  datos(){
    const datos={
      tipo:"personaje",
      x:this.x,
      y:this.y
    }
    return datos;
  }

  mover_arriba(){
    this.y--;
  }
  mover_abajo(){
    this.y++;
  }
  mover_izquierda(){
    this.x--;
  }
  mover_derecha(){
    this.x++;
  }
}
