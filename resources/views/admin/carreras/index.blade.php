@extends('admin.layout')

@section('header')
  <h1>
   Carreras 
    <small>Listado de Carreras</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li class="active">Carreras</li>
  </ol>
@endsection

@section('content')
<div class="row">
    <div class="col-md-2">
    </div>
    <div class="col-md-7">
      <div class="box box-primary">
                <div class="box-header ">
                      <h3 class="box-title">Lista de Carreras</h3>
                    	@can('crear carreras', new \Spatie\Permission\Models\Role)
                        <button  class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Nueva Carrera</button>
                      @endcan
                </div>
                <div class="box-body">
                  <table id="departamento-table" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Carrera </th>
                        <th>Acciones</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($carreras as $carrera)
                        <tr>
                          <td>{{ $carrera->id }}</td>
                          <td>{{ $carrera->nombre }}</td>
                          <td>
                                @can('editar carreras', new \Spatie\Permission\Models\Role)
                                <a href="{{ route('admin.carreras.edit', $carrera )}}" class="btn btn-xs btn-info"><i class="fa fa-pencil"></i></a>
                                @endcan
                                @can('eliminar carreras', new \Spatie\Permission\Models\Role)
                                <form method="POST" action="{{route('admin.carreras.destroy', $carrera )}}" style="display:inline">
                                {{csrf_field()}} {{ method_field('DELETE') }}
                                        <button class="btn btn-xs btn-danger"  onclick="return confirm('¿Esta seguro de eliminar este departamento?')"><i class="fa fa-times"></i></button>
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
      $('#departamento-table').DataTable({
			"paging":false,
			"lengthChange":false,
			"searching":false,
			"ordering":false,
			"info":false,
			"autowidth":true
	  });

    });
  </script>


  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <form method="POST" action="{{ route('admin.carreras.store')}}">
      {{csrf_field()}}

          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Nombre de la Carrera</h4>
              </div>
              <div class="modal-body">
                                <label > Nombre </label> 
                                <div class="form-group {{ $errors->has('nombre') ? 'has-error' : '' }}">
                                        <input autocomplete="off" name="nombre" class="form-control" value="{{old('nombre')}}" placeholder="Ingresa el titulo de la tabla">
                                        {!! $errors->first('nombre','<span class=help-block>:message</span>') !!}
                                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button class="btn btn-primary">Crear Carrera </button>
              </div>
            </div>
          </div>

      </form>
</div>
@endpush