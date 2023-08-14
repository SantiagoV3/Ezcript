import {Mapa} from './entidades/Mapa.js';
import {Personaje} from './entidades/Personaje.js';
import {Enemigo} from './entidades/Enemigo.js'
import {Meta} from './entidades/Meta.js';
import {Obstaculo} from './entidades/Obstaculo.js'

export function cargar_2() {
  const mapa = new Mapa(7,7);
  const personaje = new Personaje(1,2);
  const enemigo1 = new Enemigo(4,5);
  const enemigo2 = new Enemigo(4,1);
  const meta = new Meta(5,1);
  const obstaculo1 = new Obstaculo(2,1);
  const obstaculo2 = new Obstaculo(2,2);
  const obstaculo3 = new Obstaculo(2,3);
  const obstaculo4 = new Obstaculo(2,4);
  const obstaculo5 = new Obstaculo(4,4);

  var datos = [];
  datos.push(mapa);
  datos.push(meta);
  datos.push(personaje);
  datos.push(enemigo2);
  datos.push(enemigo1);
  datos.push(obstaculo1);
  datos.push(obstaculo2);
  datos.push(obstaculo3);
  datos.push(obstaculo4);
  datos.push(obstaculo5);

  return datos;
}
