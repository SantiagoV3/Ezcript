@extends('layouts.plantilla')
@section('content')
<div class="container">
@if(Session::has('mensaje'))
{{Session::get('mensaje')}}

@endif
<a href="{{url('comentario/create')}}"> Registrar otro comentario </a>
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Correccion</th>
            <th>Nombre</th>
            <th>Agregar Comentario</th>
            <th>Acciones</th>

        </tr>
    </thead>


    <tbody>
        @foreach($comentarios as $comentario)
        <tr>
            <td>{{$comentario -> id}}</td>
            <td>
            <img src="{{'../storage/app/public/'.$comentario->Correccion}}" width= '100' alt="">    
            <!-- {{$comentario -> Correccion}}</td> -->
            <td>{{$comentario -> Nombre}}</td>
            <td>{{$comentario -> Comentario}}</td>
            <td>

            <a href = "{{url('/comentario/'.$comentario->id.'/edit')}}" class="btn btn-warning">
            Editar
            </a>
            |
            <form action="{{url('/comentario/'.$comentario->id)}}" class="d-inline" method="post">
            @csrf
            {{method_field('DELETE')}}
            <input type="submit" onclick="return confirm('¿Estas seguro que quieres borrar comentario?')" value="Borrar">
            </form>
        </td>

        </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection
