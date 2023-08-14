@extends('layouts.plantilla')

@section('content')
<form class="" action="{{url('/problemas')}}" method="post">
@csrf
  <label for="asunto">Porfavor seleccione el tipo de problema que tiene</label>
  <br><br>
  <select name="asunto">
    <option selected disabled>Selecciones tipo de problema</option>
    <option value="Problema con el juego">Problema con el juego</option>
    <option value="Problema con unirse a un curso">Problema con unirse a un curso</option>
    <option value="Problema con cambiar datos">Problema con cambiar datos</option>
    <option value="Otro tipo de problemas">Otro tipo de problemas</option>
  </select>
  <br><br>
  <label for="descripcion">Escriba un descripcion del problema que tiene</label>
  <br><br>
  <textarea name="descripcion" rows="8" cols="80"></textarea>
  <br><br>
  <label for="submit"></label>
  <input type="submit" value="Enviar">
</form>

@endsection

@section('js')

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if(session('eliminar') == 'alumno-eliminado')
        <script>
            Swal.fire(
                '¡Eliminación Exitosa!',
                'El curso ha sido eliminado con exito.',
                'success'
            )
        </script>
    @endif

@endsection
