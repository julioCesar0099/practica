@extends('admin.layout')

@section('header')
  <h1>
    Departamentos
    <small>Listado de Departamentos</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li class="active">Departamentos</li>
  </ol>
@endsection

@section('content')
<div class="row">
    <div class="col-md-2">
    </div>
    <div class="col-md-7">
      <div class="box box-primary">
                <div class="box-header ">
                      <h3 class="box-title">Lista de Departamentos</h3>
                    	@can('crear departamentos', new \Spatie\Permission\Models\Role)
                      <button  class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Nuevo Departamento</button>
                      @endcan
                </div>
                <div class="box-body">
                  <table id="departamento-table" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Departamento </th>
                        <th>Carreras asociadas</th>
                        <th>Acciones</th>

                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($departamentos as $departamento)
                        <tr>
                          <td>{{ $departamento->id }}</td>
                          <td>{{ $departamento->nombre }}</td>
                          <td>{{ $departamento->carreras->pluck('nombre')->implode(' , ') }} </td>
                          <td>
                              	@can('editar departamentos', new \Spatie\Permission\Models\Role)
                                <a href="{{ route('admin.departamentos.edit', $departamento )}}" class="btn btn-xs btn-info"><i class="fa fa-pencil"></i></a>
                                @endcan
                                @can('eliminar departamentos', new \Spatie\Permission\Models\Role)
                                <form method="POST" action="{{route('admin.departamentos.destroy', $departamento )}}" style="display:inline">
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
			"lengthChange":true,
			"searching":false,
			"ordering":false,
			"info":false,
			"autowidth":true
	  });

    });
  </script>


  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <form method="POST" action="{{ route('admin.departamentos.store')}}">
      {{csrf_field()}}

          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Nombre del Departamento </h4>
              </div>
              <div class="modal-body">
                                <label > Nombre </label> 
                                <div class="form-group {{ $errors->has('nombre') ? 'has-error' : '' }}">
                                        <input autocomplete="off" name="nombre" class="form-control" value="{{old('nombre')}}" placeholder="Ingresa el titulo de la tabla">
                                        {!! $errors->first('nombre','<span class=help-block>:message</span>') !!}
                                </div>
                                <label > Carreras asociadas</label> 
                                <div class="form-group {{ $errors->has('carreras') ? 'has-error' : '' }} ">
                                        @foreach ($carreras as $carrera)
                                                    <div class="checkbox">
                                                            @if($carrera->area_id === 0)
                                                            <label>
                                                                <input name="carreras[]" type="checkbox" value="{{ $carrera->id }}"
                                                                {{ $departamento->carreras->contains($carrera->id) ? 'checked':'' }}>
                                                                {{ $carrera->nombre}} 
                                                            </label>
                                                            @endif

                                                    </div>
                                         @endforeach
                                      {!! $errors->first('carreras','<span class=help-block>:message</span>') !!}
                                 </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button class="btn btn-primary">Crear Departamento </button>
              </div>
            </div>
          </div>

      </form>
</div>
@endpush