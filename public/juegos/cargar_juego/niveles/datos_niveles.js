import {cargar_1} from './datos_nivel_1.js';
import {cargar_2} from './datos_nivel_2.js';

export function elegir(i) {
  if (i=="01") {
    return cargar_1();
  }else if (i=="02") {
    return cargar_2();
  }
}
