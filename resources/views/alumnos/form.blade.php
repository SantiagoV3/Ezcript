<div class="py-5">

    <h1 class="text-light">{{ $modo }} Alumno</h1>
    <br>

    <div class="container px-5 py-3" style="background-color:#E8E7E7">

        <p class="text-danger"><strong>* Obligatorio</strong></p>

        <!-- ID para ocultarlo usar el hidden-->

        <label class="text" for="Rut"><strong>Usuario</strong></label>
        <lavel for="Id" class="text-danger"> *</lavel>
        <select class="form-select {{$errors->has('usr_id')?'is-invalid':''}}" name="usr_id" id="Rol">
            <option selected disabled value="">Usuario...</option>
            @foreach($usuarios as $user)
            <option value="{{ $user->id }}"  @if (isset($alumno->usr_id) && $alumno->usr_id == $user->id)) selected @endif>{{$user->name}}</option>
            @endforeach
        </select>
        @if($errors->has('usr_id'))
            {!! $errors->first('usr_id','<div class="invalid-feedback">Se debe seleccionar el id de usuario</div>') !!}
        @endif

        <!-- ROL -->
        <br>
        <label class="text" for="Rol"><strong>Rol</strong></label>
        <lavel for="Rol" class="text-danger"> *</lavel>
        <select class="form-select {{$errors->has('rol_id')?'is-invalid':''}}" name="rol_id" id="Rol">
            <option selected disabled value="">Seleccione el Rol alumno...</option>
            @foreach($roles as $rol)
            <option value="{{ $rol->rol_id }}" @if (isset($alumno->rol_id) && $rol->rol_nombre == 'alumno') selected @endif>{{$rol->rol_nombre}}</option>
            @endforeach
        </select>
        @if($errors->has('rol_id'))
            {!! $errors->first('rol_id','<div class="invalid-feedback">Se debe seleccionar el rol</div>') !!}
        @endif



        <!-- CURSO -->
        <br>
        <label class="text" for="Curso"><strong>Curso</strong></label>
        <lavel for="Curso" class="text-danger"> *</lavel>
        <select class="form-select {{$errors->has('cur_id')?'is-invalid':''}}" name="cur_id" id="Curso">
            <option selected disabled value="">Seleccione el Curso...</option>
            @foreach($cursos as $curso)
            <option value="{{ $curso->id }}" @if (isset($alumno->cur_id) && $alumno->cur_id == $curso->id) selected @endif>{{$curso->cur_nombre}}</option>
            @endforeach
        </select>
        @if($errors->has('cur_id'))
            {!! $errors->first('cur_id','<div class="invalid-feedback">Se debe seleccionar el curso</div>') !!}
        @endif


        <!-- RUT -->
        <br>
        <label class="text" for="Rut"><strong>Rut del Alumno</strong></label>
        <lavel for="Rut" class="text-danger"> *</lavel>
        <input  type="text" class="form-control {{$errors->has('pef_rut')?'is-invalid':''}}" placeholder="Ingrese un rut de alumno" name="pef_rut" id="Rut" value="{{isset($alumno->pef_rut)?$alumno->pef_rut:old('pef_rut')}}">
        {!! $errors->first('pef_rut','<div class="invalid-feedback">:message</div>') !!}
        <label class="text" for="Rut">Ingrese RUT con puntos y guines</label>
        <br>

        <!-- CORREO -->
        <br>
        <label class="text" for="Correo"><strong>Correo del Alumno</strong></label>
        <lavel for="Correo" class="text-danger"> *</lavel>
        <input type="text" class="form-control {{$errors->has('pef_correo')?'is-invalid':''}}" placeholder="Ingrese correo del alumno" name="pef_correo" id="Correo" value="{{isset($alumno->pef_correo)?$alumno->pef_correo:old('pef_correo')}}">
        {!! $errors->first('pef_correo','<div class="invalid-feedback">:message</div>') !!}

        <!-- FOTO -->
        <br>
        <label class="text" for="Telefono"><strong>Telefono del Alumno</strong></label>
        <lavel for="Foto" class="text-danger"> *</lavel>
        <input type="text" class="form-control {{$errors->has('pef_telefono')?'is-invalid':''}}" placeholder="Ingrese telefono del alumno" name="pef_telefono" id="Telefono" value="{{isset($alumno->pef_telefono)?$alumno->pef_telefono:old('pef_telefono')}}">
        {!! $errors->first('pef_telefono','<div class="invalid-feedback">:message</div>') !!}
        <br>
        
        <input class="btn btn-success" type="submit" value=" {{ $modo }} Alumno">
        @foreach($roles as $rol)
            @foreach($cursos as $curso)
            <a href='{{url("alumnos/?rol_id=$rol->rol_id&cur_id=$curso->id")}}' class="btn btn-danger" style="align-self: center; width: 200px"> Regresar a {{$curso->cur_nombre}} </a>
            @endforeach
        @endforeach

    </div>
</div>
