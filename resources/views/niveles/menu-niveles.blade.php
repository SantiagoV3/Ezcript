@extends('layouts.plantilla')

@section('content')
<div class="py-3">

    <div style="display: flex; justify-content: space-between">
        <h1 class="text-light">Niveles</h1>
        <a href="{{url('/bloquear-niveles')}}" class="btn btn-success" style="align-self: center; width: 200px ;"><i class="bi bi-eye-fill"></i> Elegir niveles a mostrar </a>
    </div>


    <div id="carouselExampleControls" class="carousel slide mt-5" data-bs-interval="false" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="row justify-content-center">

                    <!--Tutoriales-->
            <?php
                $contador = 0;
            ?>
                @foreach($niveles as $nivel)
		    @if(strpos($nivel->niv_nombre, 'tutorial') !== false)
                    @if($nivel->niv_activo == 1)
			@php
				$nombre = str_replace('_',' ',$nivel->niv_nombre)
			@endphp
			<?php
				$contador++;
			?>
                <div id="tarjetaNivel" class="col-3">
                    <div id="tarjetaNivel" class="card">
                        <div class="card-body">
                            <h4 class="card-title text-center fw-bold">{{$nombre}}</h4>
                            <div class="vstack gap-3">
                                <img src="../img/niveles/Museo_4.png" class="card-img-top" alt="..." height="200" width="300">

                                <form class="" action="./../../public/juegos/pantalla_juego.php" method="post">
                                    <div class="vstack gap-2">
                                        <input class="btn btn-primary fs-5 fw-bold" type="submit" name="{{$nivel->niv_nombre}}" value="Jugar">
                                        <input class="btn btn-primary" type="submit" name="nivel_1" value="Bloquear Nivel">
                                        <a href="#" class="btn btn-primary">Ver solución</a>
                                        <a href="#" class="btn btn-primary">Ver comentarios</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                    
			@if($contador >= 3)
				<?php
				$contador = 0;
				?>
                        	{{"."}}

			@endif
                      	
		    @endif
		@endif
                @endforeach
            </div>
        </div>
        <div class="carousel-item">
            <div class="row justify-content-center">

                <!--NIVELES-->
                @foreach($niveles as $nivel)
		 @if(strpos($nivel->niv_nombre, 'pseudocodigo') !== false)
                    @if($nivel->niv_activo == 1)
			@php
				$nombre = str_replace('_',' ',$nivel->niv_nombre)
			@endphp
                        <div class="col-3">
                            <div class="card">

                                <div class="card-body">
                                    <h4 class="card-title text-center fw-bold">{{$nombre}}</h4>
                                    <div class="vstack gap-3">
                                        <img src="../img/niveles/Museo_1.png" class="card-img-top" alt="..." height="200" width="300">

                                        <form class="" action="../juegos/pantalla_juego.php" method="post">

                                            <div class="vstack gap-2">
                                                <input class="btn btn-primary fs-5 fw-bold" type="submit" name="{{$nivel->niv_nombre}}" value="Jugar">
                                                <a href="#" class="btn btn-primary">Ver solución</a>
                                                <a href="#" class="btn btn-primary">Ver comentarios</a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                       </div>
                    @endif
		@endif
            @endforeach

        </div>
    </div>

</div>
<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Anterior</span>
</button>
<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Siguiente</span>
</button>
</div>

</div>

@endsection
