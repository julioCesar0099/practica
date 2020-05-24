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
            <div class="box-header ">
                  <h3 class="box-title">Lista de combocatorias</h3>
            </div>
            <div class="box-body">
              <table id="combocatoria-table" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Descripcion</th>
                    <th>Fecha publicacion</th>
                    <th>Fecha finalizacion</th>
                    <th>Area </th>
                    <th>Carreras</th>
                    <th>Acciones</th>

                  </tr>
                </thead>
                <tbody>
                  @foreach ($combocatorias as $combocatoria)
                    <tr>
                      <td>{{ $combocatoria->id }}</td>
                      <td>{{ $combocatoria->titulo }}</td>
                      <td>{{ $combocatoria->descripcion }}</td>
                      <td>{{ $combocatoria->fecha_inicio->format('d - M - Y') }}</td>
                      <td>{{ $combocatoria->fecha_fin->format('d - M - Y')  }}</td>
                      <td>{{ $combocatoria->area->nombre }}</td>
                      <td>{{ $combocatoria->carreras->pluck('nombre')->implode(' , ')}}</td>
                      <td>
                          <a href="#"  class="btn btn-xs btn-default"  target="_blank"><i class="fa fa-eye"></i></a>
                          <a href="#"class="btn btn-xs btn-info"><i class="fa fa-pencil"></i></a>
	                        @can('eliminar convocatorias', new \Spatie\Permission\Models\Role)
                          <form  method="POST" action="{{ route('admin.combocatorias.destroy', $combocatoria) }}"  style="display: inline">
                                  {{ csrf_field() }} {{ method_field('DELETE')}}
                                  <button class="btn btn-xs btn-danger"  onclick="return confirm('¿Esta seguro de eliminar esta publicación?')"><i class="fa fa-times"></i></button>
                          </form>
                          @endcan
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
			"lengthChange":true,
			"searching":true,
			"ordering":false,
			"info":false,
			"autowidth":true
	  });

    });
  </script>
@endpush