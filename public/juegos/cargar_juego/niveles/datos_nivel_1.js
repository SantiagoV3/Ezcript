import {Mapa} from './entidades/Mapa.js';
import {Personaje} from './entidades/Personaje.js';
import {Meta} from './entidades/Meta.js';

export function cargar_1() {
  const mapa = new Mapa(6,6);
  const personaje = new Personaje(1,2);
  const meta = new Meta(4,1);

  var datos = [];
  datos.push(mapa);
  datos.push(meta);
  datos.push(personaje);

  return datos;
}
