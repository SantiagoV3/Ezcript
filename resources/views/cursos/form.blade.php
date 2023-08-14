<div class="py-5">


    <h1 class="text-light">{{ $modo }} Curso</h1>
    <br>

    <div class="container px-5 py-3" style="background-color:#E8E7E7">

        <p class="text-danger"><strong>* Obligatorio</strong></p>

        <label class="text" for="Asignatura"><strong>Asignatura</strong></label>
        <lavel for="Asignatura" class="text-danger"> *</lavel>
        <select class="form-select {{$errors->has('asg_id')?'is-invalid':''}}" name="asg_id" id="Asignatura">
            <option selected disabled value="">Seleccione la Asignatura...</option>
            @foreach($asignaturas as $asignatura)
            <option value="{{ $asignatura->id }}" @if (isset($curso->asg_id) && $curso->asg_id == $asignatura->id) selected @endif>{{$asignatura->asg_nombre}}</option>
            @endforeach
        </select>
        @if($errors->has('car_id'))
        {!! $errors->first('asg_id','<div class="invalid-feedback">Se debe seleccionar la asignatura</div>') !!}
        @endif
        <br>
        <label class="text" for="Carrera"><strong>Carrera</strong></label>
        <lavel for="Carrera" class="text-danger"> *</lavel>
        <select class="form-select {{$errors->has('car_id')?'is-invalid':''}}" name="car_id" id="Carrera">
            <option selected disabled value="">Seleccione la Carrera...</option>
            @foreach($carreras as $carrera)
            <option value="{{ $carrera->id }}" @if (isset($curso->car_id) && $curso->car_id == $carrera->id) selected @endif>{{$carrera->car_nombre}}</option>
            @endforeach
        </select>
        @if($errors->has('car_id'))
        {!! $errors->first('car_id','<div class="invalid-feedback">Se debe seleccionar la carrera</div>') !!}
        @endif
        <br>
        <label class="text" for="Periodo"><strong>Periodo</strong></label>
        <lavel for="Periodo" class="text-danger"> *</lavel>
        <select class="form-select {{$errors->has('per_id')?'is-invalid':''}}" name="per_id" id="Periodo">
            <option selected disabled value="">Seleccione el Año...</option>
            @foreach($periodos as $periodo)
            <option value="{{ $periodo->per_id }}" @if (isset($curso->per_id) && $curso->per_id == $periodo->per_id) selected @endif>{{$periodo->per_anio}}</option>
            @endforeach
        </select>
        @if($errors->has('per_id'))
        {!! $errors->first('per_id','<div class="invalid-feedback">Se debe seleccionar el año</div>') !!}
        @endif

        <select class="form-select {{$errors->has('per_id')?'is-invalid':''}}" name="per_id" id="Periodo">
            <option selected disabled value="">Seleccione el Semestre...</option>
            @foreach($periodos as $periodo)
            <option value="{{ $periodo->id }}" @if (isset($curso->per_id) && $curso->per_id == $periodo->id) selected @endif>{{$periodo->per_semestre}}</option>
            @endforeach
        </select>

        @if($errors->has('per_id'))
        {!! $errors->first('per_id','<div class="invalid-feedback">Se debe seleccionar un semestre</div>') !!}
        @endif

        <br>
        <label class="text" for="Nombre"><strong>Nombre del Curso</strong></label>
        <lavel for="Nombre" class="text-danger"> *</lavel>
        <input type="text" class="form-control {{$errors->has('cur_nombre')?'is-invalid':''}}" placeholder="Ingrese un nombre de curso" name="cur_nombre" id="Nombre" value="{{isset($curso->cur_nombre)?$curso->cur_nombre:old('cur_nombre')}}">
        {!! $errors->first('cur_nombre','<div class="invalid-feedback">:message</div>') !!}

        <br>
        <label class="text" for="Profesor"><strong>Nombre del Profesor</strong></label>
        <lavel for="Nombre" class="text-danger"> *</lavel>
        <input type="text" class="form-control {{$errors->has('cur_profesor')?'is-invalid':''}}" placeholder="Ingrese el nombre del profesor" name="cur_profesor" id="Profesor" value="{{isset($curso->cur_profesor)?$curso->cur_profesor:old('cur_profesor')}}">
        {!! $errors->first('cur_profesor','<div class="invalid-feedback">:message</div>') !!}

        <br>
        <label class="text" for="Descripcion"><strong>Descripción del Curso</strong></label>
        <textarea class="form-control {{$errors->has('cur_descripcion')?'is-invalid':''}}" placeholder="Explique en qué consite el curso" name="cur_descripcion" id="Descripcion">{{isset($curso->cur_descripcion)?$curso->cur_descripcion:old('cur_descripcion')}}</textarea>
        {!! $errors->first('cur_descripcion','<div class="invalid-feedback">:message</div>') !!}

        <br>
        <input class="btn btn-success" type="submit" value=" {{ $modo }} Curso">
        <a href="{{url('cursos/')}}" class="btn btn-success" style="align-self: center; width: 200px"> Regresar </a>

    </div>
</div>