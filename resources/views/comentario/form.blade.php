@extends('layouts.plantilla')
@section('content')
<div class="container">
<label for="Nombre"> Nombre</label>
    <br><br>
    <input type = "text" name="Nombre" value = "{{$comentario->Nombre}}"id="Nombre">
    <br><br>
    <label for="Comentario"> Agregar Comentario</label>
    <br><br>
    <input type = "text" name="Comentario" value = "{{$comentario->Comentario}}" id="Comentario">
    <br><br>
    <label for="Correccion"> Agregar Correcion</label>
    <br><br>
    <img src="{{asset('storage').'/'.$comentario->Correccion}}" width= '100'alt="">
    <input type = "file" name = "Correccion" value = "{{$comentario->Correccion}}"id = "Correccion">
    <br><br>
    <input type = "submit" value = "Subir" >
    <br><br>
    </div>
@endsection
