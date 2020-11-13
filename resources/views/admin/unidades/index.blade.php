@extends('admin.layout')

@section('header')
  <h1>
   Carreras 
    <small>Listado de Unidades</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li class="active">Unidades</li>
  </ol>
@endsection

@section('content')
<div class="row">
    <div class="col-md-2">
    </div>
    <div class="col-md-7">
      <div class="box box-primary">
                <div class="box-header ">
                      <h3 class="box-title">Lista de Unidades</h3>
                      	@can('crear unidades', new \Spatie\Permission\Models\Role)
                            <button  class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Nueva Unidad</button>
                        @endcan
                </div>
                <div class="box-body">
                  <table id="departamento-table" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Unidad</th>
                        <th>Departamento</th>
                        <th>Acciones</th>
                      </tr>0
                    </thead>
                    <tbody>
                      @foreach ($unidades as $unidad)
                        <tr>
                          <td>{{ $unidad->id }}</td>
                          <td>{{ $unidad->nombre }}</td>
                          <td>{{ $unidad->area->nombre }}</td>
                          <td>
                      	        @can('editar unidades', new \Spatie\Permission\Models\Role)
                                <a href="{{ route('admin.unidades.edit', $unidad )}}" class="btn btn-xs btn-info"><i class="fa fa-pencil"></i></a>
                                @endcan
                                @can('eliminar unidades', new \Spatie\Permission\Models\Role)
                                <form method="POST" action="{{route('admin.unidades.destroy', $unidad )}}" style="display:inline">
                                {{csrf_field()}} {{ method_field('DELETE') }}
                                        <button class="btn btn-xs btn-danger"  onclick="return confirm('¿Esta seguro de eliminar esta unidad?')"><i class="fa fa-times"></i></button>
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
      <form method="POST" action="{{ route('admin.unidades.store')}}">
      {{csrf_field()}}

          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Nombre de la Unidad</h4>
              </div>
              <div class="modal-body">
                                <label > Nombre </label> 
                                <div class="form-group {{ $errors->has('nombre') ? 'has-error' : '' }}">
                                        <input autocomplete="off" name="nombre" class="form-control" value="{{old('nombre')}}" placeholder="Ingresa el nombre">
                                        {!! $errors->first('nombre','<span class=help-block>:message</span>') !!}
                                </div>
                                <label > Codigo  <small class="text-muted">( Opcional )  </small>  </label> 
                                <div class="form-group {{ $errors->has('codigo') ? 'has-error' : '' }}">
                                        <input autocomplete="off" name="codigo" class="form-control" value="{{old('codigo')}}" placeholder="Ingresa el codigo">
                                        {!! $errors->first('codigo','<span class=help-block>:message</span>') !!}
                                </div>
                                <div  class="form-group {{ $errors->has('departamento') ? 'has-error' : '' }}">
                                    <label> Departamento </label>
                                    <select  name="departamento" class="form-control">
                                                  @foreach($departamentos as $departamento)
                                                    <option  value="{{$departamento->id}}">{{$departamento->nombre}}</option>
                                                  @endforeach
                                    </select>
                                    {!! $errors->first('tabla','<span class=help-block>:message</span>') !!}
                                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button class="btn btn-primary">Crear Unidad</button>
              </div>
            </div>
          </div>

      </form>
</div>
@endpush