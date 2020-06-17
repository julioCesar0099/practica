
@extends('home')

@section('content')



<section class="posts container">
				<h1 class="display-4 " align="center" >Lista de Convocatorias  </h1>
                    <p class="lead" align="center">Universidad Mayor de San Simón - Facultad de Ciencias y Tecnologia </p>
                <hr class="my-4">
		@foreach ($convocatorias as $convocatoria)
			<article class="post no-imag">
			<div class="card-header text-white bg-primary"></div>
				<div class="content-post">
						<header class="container-flex space-between">
							<div class="date">
								<span class="c-gray-1">{{ $convocatoria->fecha_inicio->format('d , M , Y')}}</span>
							</div>
							<div class="post-category">
								<span class="category text-capitalize">{{ $convocatoria->facultad->nombre }}</span>
							</div>
						</header>
						<h1>{{ $convocatoria->titulo }}</h1>
						<div class="divider"></div>
						<p>{{ $convocatoria->descripcion }}</p>
						<footer class="container-flex space-between">
							<div class="read-more">
								<a  class="text-uppercase " style="color:#164488">Area de : {{ $convocatoria->area->nombre}}</a>
							</div>
							<div class="tags container-flex">
								@foreach ($convocatoria->carreras as $carrera)
									<span class="tag c-gray-1 text-capitalize" style="opacity: 0.5">{{ $carrera->nombre }}</span>
								@endforeach
							</div>
						</footer>
						<hr class="my-4">
						<div class="float-right">
							  <a href="{{ url('/index/'.$convocatoria->id)}}" class="btn btn-info " style="font-size: inherit">Ver mas...</a>
							  <a href="{{ url('/registroPost') }}" class="btn  btn-info " style="font-size: inherit ">Postular</a>    
					   </div>
					</div>
			</article>
		@endforeach
	</section>
	
@endsection