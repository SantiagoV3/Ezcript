@extends('layouts.plantilla')

@section('content')


<form action="{{ url('/alumnos/editado') }}" method="post">
@csrf

    @include('alumnos.form',['modo'=>'Editar']) 

</form>


@endsection