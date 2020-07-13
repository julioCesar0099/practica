
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
<div class="row">
    <div class="col-md-3">
    </div>
    <div class="col-md-6">
  <div class="box box-primary">
            <div class="box-header ">
                  <h3 class="box-title">Postulantes</h3>
            </div>
            <div class="box-body ">
              <table id="combocatoria-table" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>CodigoSIS</th>
                    <th>Nota de Meritos</th>
                    <th>Nota de conocimientos</th>
                    <th>Promedio Final </th>
                    <th>Calificar </th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($postulantes as $postulante )
                    <tr>
                      <td align="center">{{ $postulante->persona->nombre}}</td>
                      <td align="center">{{ $postulante->persona->codigoSIS}}</td>
                      <td align="center">{{ $postulante->nota_meritos}}</td>
                      <td align="center">{{ $postulante->nota_conocimientos}}</td>
                      <td align="center">{{ $postulante->nota_final}}</td>
                      <td>
                          @can('calificar conocimientos', new \Spatie\Permission\Models\Role)
                            <a href="{{ route('admin.calificaciones.calificar',[$postulante,$destino,$convocatoria]) }}"  class="btn btn-xs btn-primary" ><i class="fa fa-check"></i>Conocimientos</a>
                          @endcan
                          @can('calificar meritos', new \Spatie\Permission\Models\Role)
                            <a href="{{ route('admin.calificaciones.meritos',[$postulante,$destino,$convocatoria]) }}"  class="btn btn-xs btn-primary" ><i class="fa fa-check"></i> Meritos</a>
                          @endcan
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>

              <div class="form-group">
                            <a href="{{ route('admin.calificaciones.items',$convocatoria) }}" class='btn btn-primary pull-right' > Atras </a> 
                            
                    </div>
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
			"autowidth":false
	  });

    });
  </script>
@endpush