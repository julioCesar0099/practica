@extends('admin.layout')

@section('header')
<h1>
    Convocatoria
    <small>Listado</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li class="active">convocatoria</li>
  </ol>
@endsection
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <h1>Lista de Postulantes</h1>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">Carrera</th>
      <th scope="col">Item</th>
      <th scope="col">Estado</th>
      <th scope="col">Observaciones</th>
      <th scope="col"></th>
      <th scope="col"></th>
      

    </tr>
  </thead>
  <tbody>
    @foreach($listaPost as $listaP)
    <tr>
      <td>{{$listaP->id}}</td>
      <td>{{$listaP->persona->nombre}}</td>
      <td>{{$listaP->persona->carrera}}</td>
      <td>{{$listaP->item_nombre}}</td>
      <td>{{$listaP->estado}}</td>
      <td>
          <form method="POST" action="{{route('postulante.observacion',$listaP)}}">

          {{csrf_field()}}{{method_field('PUT')}}
          @if($errors->any())
            <div class="col-md-3 alert alert-danger">
                 El campo observacion no puede mandar vacio
            </div>
            @endif
          <textarea placeholder="Observaciones" row="2" name="observacion" value="{{old('observacion',$listaP->observacion)}}"></textarea>
          <button class=" btn btn-primary" type="submit" >guardar</button>
          </form>
      </td>
      <td>
          <a href="{{ url($listaP->id.'/habilitacion') }}" class="btn btn-warning btn-sm">Habilitar</a>
      </td>
      <td>
          <a href="{{ url($listaP->id.'/deshabilitacion') }}" class="btn btn-danger btn-sm">Deshabilitar</a>
      </td>
    </tr>
    @endforeach

      <button></button>

  </tbody>
</table>
</body>
</html>

@endsection
@push('scripts')
  <!-- DataTables -->
  <script src="/adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
	<script src="/adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

  <script>
    $(function () {
      $('#combocatoria-table').DataTable({
			"paging":true,
			"lengthChange":true,
			"searching":true,
			"ordering":false,
			"info":false,
			"autowidth":true
	  });

    });
  </script>
@endpush