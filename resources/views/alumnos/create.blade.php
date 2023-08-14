@extends('layouts.plantilla')

@section('content')


<form action="{{ url('/alumnos') }}" method="post">
    @csrf

    @include('alumnos.form',['modo'=>'Crear'])

</form>

@endsection

