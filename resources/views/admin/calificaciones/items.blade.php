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
                  <h3 class="box-title">{{ $convocatoria->titulo }}</h3>
            </div>
            <div class="box-body ">
              <table id="combocatoria-table" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Items</th>
                    <th>Ver Postulantes</th>
                  </tr>
                </thead>
                <tbody>
                @if($convocatoria->tipo === 'Asignatura')
                  @foreach ($convocatoria->items as $item)
                    <tr>
                      <td>{{ $item->destino }}</td>
                      <td>
                          <a href="{{ route('admin.calificaciones.postulantes',[$item->destino,$convocatoria]) }}"  class="btn btn-xs btn-primary" ><i class="fa fa-eye"></i></a>
                      </td>
                    </tr>
                  @endforeach
                  @else
                  @foreach ($convocatoria->itemlabs as $item)
                    <tr>
                      <td>{{ $item->nombre }}</td>
                      <td>
                          <a href="{{ route('admin.calificaciones.postulantes',[$item->nombre,$convocatoria]) }}"  class="btn btn-xs btn-primary" ><i class="fa fa-eye"></i></a>
                      </td>
                    </tr>
                  @endforeach
                  @endif  
                </tbody>
              </table>

              <div class="form-group">
                            <a href="{{ route('admin.calificaciones.index')}}" class='btn btn-primary pull-right' > Atras </a> 
                            
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