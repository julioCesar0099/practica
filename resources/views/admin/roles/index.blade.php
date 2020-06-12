@extends('admin.layout')

@section('header')
  <h1>
    Roles
    <small>Listado de roles</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li class="active">Roles</li>
  </ol>
@endsection

@section('content')
<div class="row">
    <div class="col-md-2">
    </div>
    <div class="col-md-7">
      <div class="box box-primary">
                <div class="box-header ">
                      <h3 class="box-title">Lista de Roles</h3>
                </div>
                <div class="box-body">
                  <table id="role-table" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Nombre Rol</th>
                        <th>Permisos asociados</th>
                        <th>Acciones</th>

                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($roles as $role)
                        <tr>
                          <td>{{ $role->id }}</td>
                          <td>{{ $role->name }}</td>
                          @if ($role->id ===1)
                          <td>Todos los permisos existentes</td>
                          @else
                          <td>{{ $role->permissions->pluck('name')->implode(' , ') }} </td>
                          @endif
                          <td>
                              @if ($role->id !==1)
                                    @can('editar roles',$role)
                                    <a href="{{ route('admin.roles.edit', $role )}}" class="btn btn-xs btn-info"><i class="fa fa-pencil"></i></a>
                                    @endcan
                                    @can('eliminar roles',$role)
                                    <form method="POST" action="{{route('admin.roles.destroy', $role )}}" style="display:inline">
                                    {{csrf_field()}} {{ method_field('DELETE') }}
                                            <button class="btn btn-xs btn-danger"  onclick="return confirm('¿Esta seguro de eliminar este rol?')"><i class="fa fa-times"></i></button>
                                    </form>
                                    @endcan
                            @endif
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
      $('#role-table').DataTable({
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