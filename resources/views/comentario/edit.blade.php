@extends('layouts.plantilla')
@section('content')
<div class="container">
<form action="{{url('comentario/update')}}" method="post" enctype = "multipart/form-data">
@csrf

<label for="Nombre"> Nombre</label>
    <input hidden readonly type="text" name="id" value={{$comentario->id}}>
    <br><br>
    <input type = "text" name="Nombre" id="Nombre">
    <br><br>
    <label for="Comentario"> Agregar Comentario</label>
    <br><br>
    <input type = "text" name="Comentario" id="Comentario">
    <br><br>
    <label for="Correccion"> Agregar Correcion</label>
    <br><br>

    <input type = "file" name = "Correccion" id = "Correccion" width='100' alt=''>
    <br><br>
    <input type = "submit" value = "Subir" >
    <br><br>
    <a href="{{url('comentario')}}"> Regresar </a>

</form>
</div>
@endsection
