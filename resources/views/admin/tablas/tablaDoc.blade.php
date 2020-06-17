@extends('admin.layout')



@section('content')
<div class="row">
    <div class="col-md-2">
    </div>
    <div class="col-md-7">
      <div class="box box-primary">
                <div class="box-header ">
                      <h3 class="box-title">Lista de Tablas</h3>
                      <button  class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Crear Nueva Tabla</button>
                </div>
                <div class="box-body">
                  <table id="role-table" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Nombre Tabla</th>
                        <th>Valor en la convocatoria</th>
                        <th>Acciones</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($tablas as $tabla)
                        <tr>
                          <td>{{ $tabla->id }}</td>
                          <td>{{ $tabla->nombre}}</td>
                          <td>{{ $tabla->valor}} %</td>
                          <td>
                          
                                    <a href="{{ route('admin.tablas.edit', $tabla )}}" class="btn btn-xs btn-info"><i class="fa fa-eye"></i></a>
                                    <form method="POST" action="{{route('admin.tablas.destroy', $tabla )}}" style="display:inline">
                                    {{csrf_field()}} {{ method_field('DELETE') }}
                                            <button class="btn btn-xs btn-danger"  onclick="return confirm('¿Esta seguro de eliminar esta tabla?')"><i class="fa fa-times"></i></button>
                                    </form> 
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                  <hr class="my-4">
                  <div class="form-group">
                    <a href="{{ route('admin.combocatorias.create')}}" class="btn btn-xm btn-primary pull-right">Atras</a>
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
      $('#role-table').DataTable({
			"paging":false,
			"lengthChange":true,
			"searching":false,
			"ordering":false,
			"info":false,
			"autowidth":true
	  });

    });
  </script>

  <!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <form method="POST" action="{{route('admin.tablas.store')}}">
      {{csrf_field()}}

          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Titulo de la tabla </h4>
              </div>
              <div class="modal-body">
                                <label > Nombre de la tabla</label> 
                                <div class="form-group {{ $errors->has('nombre') ? 'has-error' : '' }}">
                                        <input autocomplete="off" name="nombre" class="form-control" value="{{old('nombre')}}" placeholder="Ingresa el titulo de la tabla">
                                        {!! $errors->first('nombre','<span class=help-block>:message</span>') !!}
                                </div>

                                <label > Valor en la Convocatoria</label> 
                                <div class="form-group {{ $errors->has('valor') ? 'has-error' : '' }} ">
                                      <input  type="number" name="valor" max="100"class="form-control " placeholder="Valor" value="{{old('valor')}}" >
                                      {!! $errors->first('valor','<span class=help-block>:message</span>') !!}
                                 </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button class="btn btn-primary">Crear Tabla</button>
              </div>
            </div>
          </div>

      </form>
</div>
@endpush