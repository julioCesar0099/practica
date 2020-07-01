@extends('admin.layout')

@section('header')
  <h1>
        Notas
    <small>Listado</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li class="active">Notas</li>
  </ol>
@endsection

@section('content')
<div class="row">
    <div class="col-md-3">
    </div>
    <div class="col-md-6">
    <div class="box box-primary">
            <div class="box-header ">
                  <h3 class="box-title">Convocatoria Notas</h3>
            </div>
            <div class="box-body">
              <table id="combocatoria-table" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Postulante</th>
                    <th>CodigoSIS  </th>
                    <th>Item</th>
                    <th>Nota Meritos</th>
                    <th>Nota Conocimientos</th>
                    <th>Promedio Final </th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($postulantes as $postulante)
                    <tr>
                      <td>{{ $postulante->persona->nombre}}</td>
                      <td>{{ $postulante->persona->codigoSIS }}</td>
                      <td>{{ $postulante->item_nombre }}</td>
                      <td class="text-muted">{{ $postulante->nota_meritos }}</td>
                      <td class="text-muted">  {{ $postulante->nota_conocimientos }}</td>
                        @if( $postulante->nota_final > 50  )
                             <td style="color:#399B05" > {{ $postulante->nota_final }} </td>
                         @else
                             <td style="color:#FF0000" > {{ $postulante->nota_final }} </td>
                         @endif
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
    <!-- /.box-body -->
  </div>
    </div>

    <div class="col-md-3">
                 <div class="box box-primary">
                        <div class="box-header with-border ">
                            <h3 class="box-title">Acciones</h3>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                    <a href="{{ route('admin.calificaciones.publicar',$convocatoria ) }}" class='btn btn-primary btn-block'>Publicar Notas</a>
                            </div> 
                            <div class="form-group">
                             <a href="javascript: history.go(-1)" class='btn btn-primary btn-block' > Atras </a>     
                            </div> 
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