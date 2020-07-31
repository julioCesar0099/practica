
@extends('home')
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Convocatoria</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">


    <link rel="stylesheet" href="css/normalize.css">
		<link rel="stylesheet" href="css/framework.css">
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/responsive.css">
		<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    
    
    <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
    
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>
@section('content')

<div class="posts container">
		
		
	
				<h1 class="display-4 " align="center" >Lista de Convocatorias  </h1>
                <p class="lead" align="center">Universidad Mayor de San Simón - Facultad de Ciencias y Tecnologia </p>
    	        <hr class="my-3">
			@foreach ($convocatorias as $convocatoria)
			
				@if($convocatoria->estado == "1")
					<article class="post no-imag col-xs-offset-8">
					<div class="card-header text-white bg-primary"></div>
						<div class="content-post">
								<header class="container-flex space-between">
									<div class="date">
										<span class="c-gray-1">{{ $convocatoria->fecha_inicio->format('d , M , Y')}}</span>
									</div>
									<div class="post-category">
										<span class="category text-capitalize">{{ $convocatoria->facultad->nombre}}</span>
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
									<div class="btn-group btn-group-justified">
										<a href="{{ route('notas.ver', $convocatoria) }}" class="btn  btn-info " style="font-size: 14px ">Notas</a>   
										<a href="{{ url('/index/'.$convocatoria->id)}}" class="btn btn-info " style="font-size: 14px">Ver mas</a>
										<a href="{{ url ('/listaHab',$convocatoria)}}" class="btn btn-info " style="font-size: 14px">Lista de habilitados</a>
										<a href="{{ url('/registroPost', $convocatoria) }}" class="btn btn-info " style="font-size: 14px">Postular</a>
									</div>
								</div>
					</article>
				@endif
			@endforeach

		
		
</div>
	
@endsection

@section('contenido')
	<h1 class="display-4" align="center" >Eventos</h1>
            <p class="lead" align="center"> Se muestran las fechas de todas las convocatorias</p>
    	      	<hr class="my-2">
			  	<article class="post no-imag col-xs-offset-8">
			  	<div class="card-header text-white bg-primary"></div>
					
			  	<ul>
					@foreach($convocatorias as $convocatoria)
						
						<li id="slide1">
							<p style="font-weight: bold;">{{$convocatoria->titulo}}</p>
						</li>
						<ul>
						<li id="slide2">
								<label>Fecha de inicio:</label>
								<label class="fecha">{{$convocatoria->fecha_inicio->format('d - M - Y')}}</label>
						</li>
						
						@foreach($convocatoria->eventos as $evento)
						<li id="slide3">
						
								<label>{{$evento->detalle}}:</label>
								<label class="fecha">{{$evento->fecha->format('d - M - Y')}}</label>
						
						</li>	
						@endforeach
						<li id="slide4">
								<label>Fecha de fin:</label>
								<label class="fecha">{{$convocatoria->fecha_fin->format('d - M - Y')}}</label>
						</li>
						</ul>
						
						
					@endforeach
				</ul>
				<br>
				</article>
				

@endsection
