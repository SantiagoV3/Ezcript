@extends('layouts.plantilla')

@section('content')


<form action="{{ url('/cursos') }}" method="post">
    @csrf

    @include('cursos.form',['modo'=>'Crear'])

</form>

@endsection