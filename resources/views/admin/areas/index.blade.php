@extends('admin.layout')

@section('header')
  <h1>
    Areas
    <small>Listado</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li class="active">convocatoria</li>
  </ol>
@endsection

@section('content')
<div class="row">
    <div class="col-md-3">
    </div>
    <div class="col-md-6">
    <div class="box box-primary">
            <div class="box-header ">
                  <h3 class="box-title">Areas</h3>
            </div>
            <div class="box-body">
              <table id="areas-table" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Carreras</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody>
                @foreach()
                  <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Carreras</th>
                    <td>{{ $combocatoria->carreras->pluck('nombre')->implode(' , ')}}</td>
                  </tr>
                @endforeach
                </tbody>
              </table>
            </div>
    <!-- /.box-body -->
  </div>
    </div>

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
			"paging":false,
			"lengthChange":true,
			"searching":true,
			"ordering":false,
			"info":false,
			"autowidth":true
	  });

    });
  </script>
@endpush