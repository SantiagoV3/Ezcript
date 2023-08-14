export class Obstaculo {
  constructor(x,y) {
    this.x=x;
    this.y=y;
  }

  datos(){
    const datos={
      tipo:"obstaculo",
      x:this.x,
      y:this.y
    }
    return datos;
  }
}
