export class Meta {
  constructor(x,y) {
    this.x=x;
    this.y=y;
  }

  datos(){
    const datos={
      tipo:"meta",
      x:this.x,
      y:this.y
    }
    return datos;
  }
}
