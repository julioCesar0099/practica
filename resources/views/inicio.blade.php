
@extends('home')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
@section('content')
                <h1 class="display-4 " align="center" >Lista de Convocatorias  </h1>
                    <p class="lead" align="center">Universidad Mayor de San Simón - Facultad de Ciencias y Tecnologia </p>
                
                @foreach($convocatorias as $convocatoria)
                <hr class="my-4">
                  <div class="card  mb-3" >
                           <div class="card-header text-white bg-dark">{{ $convocatoria->titulo }}</div>
                                  <div class="card-body">
                                      <h5 class="card-title">Area: {{ $convocatoria->area->nombre }}</h5>
                                      <p class="card-text">{{ $convocatoria->descripcion }}</p>
                                      <p class="card-text"><small class="text-muted">{{ $convocatoria->fecha_inicio->format('d , M , Y') }}</small></p>
                                    <div class="float-right">
                                  <a href="#" class="btn btn btn btn-info ">Mostrar PDF</a>
                                  <a href="{{ url('/registroPost') }}" class="btn btn btn btn-info ">Postular</a>    
                                  </div>
                           </div>
                  </div>
                  @endforeach
@endsection

</body>
</html>

