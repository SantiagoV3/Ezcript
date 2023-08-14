export class Enemigo {
  constructor(x,y) {
    this.x=x;
    this.y=y;
  }

  datos(){
    const datos={
      tipo:"enemigo",
      x:this.x,
      y:this.y
    }
    return datos;
  }
}
