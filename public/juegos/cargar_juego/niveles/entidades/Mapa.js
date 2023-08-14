export class Mapa {
  constructor(x,y) {
    this.x=x;
    this.y=y;
  }

  datos(){
    const datos={
      tipo:"mapa",
      x:this.x,
      y:this.y
    }
    return datos;
  }
}
