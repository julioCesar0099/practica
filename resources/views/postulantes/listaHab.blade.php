@extends('plantilla')

@section('seccion')

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lista</title>
    </head>
    <body>
        <h1>Lista de habilitados</h1>
            <table class="table">
    <thead>
    <tr>
      
      <th scope="col">Nombre</th>
      <th scope="col">Apellido</th>
      <th scope="col">Carrera</th>
      <th scope="col">Item</th>
      <th scope="col">Estado</th>
      <th scope="col">Observaciones</th>
    @foreach($listaH as $list)
    <tr>
      
      <td>{{$list->persona->nombre}}</td>
      <td>{{$list->persona->apellidoP}}</td>
      <td>{{$list->persona->carrera}}</td>
      <td>{{$list->item_nombre}}</td>
      <td>{{$list->estado}}</td>
      <td>{{$list->observacion}}</td>

    @endforeach
    <div class="form-group">
         <a href="{{ url('/') }}" class="btn btn-primary my-2 my-sm-0">Atras</a>
    </div>
    </body>
    </html>

@endsection