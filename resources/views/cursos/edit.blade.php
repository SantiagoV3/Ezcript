@extends('layouts.plantilla')

@section('content')


<form action="{{url('/cursos/'.$curso->id)}}" method="post">
@csrf
{{ method_field('PATCH')}}
@include('cursos.form',['modo'=>'Editar']) 
</form>


@endsection
