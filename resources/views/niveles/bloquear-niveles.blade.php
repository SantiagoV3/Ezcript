@extends('layouts.plantilla')

@section('content')

<div class="py-3">


    <div style="display: flex; justify-content: space-between">
        <h1 class="text-light">Niveles a Mostrar</h1>
    </div>
    <div class="table-responsive mt-5">
        <table class="table table-light table-striped ">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Nivel</th>
                    <th>Estado</th>
                    <th>Acción</th>

                </tr>
            </thead>
            <tbody>
                @foreach($niveles as $id=>$nivel)

                <tr>
                    <td> {{$id}}</td>
                    <td>{{ $nivel->niv_nombre }}</td>
                    <td id="resp{{ $nivel->id }}">

                        @if($nivel->niv_activo == 1)
                        <button type="button" class="btn btn-sm btn-success">Habilitado</button>
                        @else
                        <button type="button" class="btn btn-sm btn-danger">Desabilitado</button>
                        @endif

                    </td>
                    <td>
                        <div class="form-check form-switch">
                            <input type="checkbox" class="form-check-input" data-id="{{ $nivel->id }}" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" style="transform: scale(1.8)" ; {{ $nivel->niv_activo == 1 ? 'checked' : '' }}>
                        </div>

                    </td>
                </tr>
            </tbody>
            @endforeach
        </table>

    </div>
    <a href="{{url('/menu-niveles')}}" class="btn btn-success" style="align-self: center; width: 200px ;">Regresar</a>

</div>

<!-- Popper -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
</script>



<script>
    $('.form-check-input').on('change', function() {
        var niv_activo = $(this).prop('checked') == true ? 1 : 0;
        //alert(niv_activo);
        var id = $(this).data('id'); //id de Nivel
        //alert(id);

        $.ajax({
            type: 'GET',
            dataType: 'JSON',
            url: "{{ route('EstadoNivel')}}",
            //url: '/EstadoNivel',
            data: {
                'niv_activo': niv_activo,
                'id': id
            },
            success: function(data) {

                $('#resp' + id).html(data.var);
                console.log(data.var)
            }
        });
    });
</script>

@endsection