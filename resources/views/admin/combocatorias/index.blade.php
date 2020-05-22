@extends('admin.layout')

@section('header')
  <h1>
    combocatoria
    <small>Listado</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li class="active">combocatoria</li>
  </ol>
@endsection

@section('content')
  <div class="box box-primary">
    <div class="box-header">
      <h3 class="box-title">Lista de combocatorias</h3>
      <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal">
				<i class="fa fa-plus"></i>  Crear combocatoria
			</button>
    </div>
    <div class="box-body">
      <table id="combocatoria-table" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Descripcion</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($combocatorias as $combocatoria)
            <tr>
              <td>{{ $combocatoria->id }}</td>
              <td>{{ $combocatoria->titulo }}</td>
              <td>{{ $combocatoria->descripcion }}</td>
              <td>
                <a href="#"  class="btn btn-xs btn-default"  target="_blank"><i class="fa fa-eye"></i></a>
				<a href="#"class="btn btn-xs btn-info"><i class="fa fa-pencil"></i></a>
				<a action="#" style="display: inline">
						<button class="btn btn-xs btn-danger"  onclick="return confirm('¿Esta seguro de eliminar esta publicación?')"
								><i class="fa fa-times"></i>
						</button>
				</a>	
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <!-- /.box-body -->
  </div>
@endsection

@push('styles')
  <!-- DataTables -->
  <link rel="stylesheet" href="/adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
@endpush

@push('scripts')
  <!-- DataTables -->
  <script src="/adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
	<script src="/adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

  <script>
    $(function () {
      $('#combocatoria-table').DataTable({
			"paging":true,
			"lengthChange":false,
			"searching":false,
			"ordering":true,
			"info":true,
			"autowidth":false
	  });

    });
  </script>
@endpush