@extends('admin.layout')

@section('header')
  <h1>
    Roles 
    <small>Asignar Rol</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li><a href="{{ route('admin.roles.index') }}"><i class="fa fa-pencil"></i> Roles</a></li>
    <li class="active">Asignar</li>
  </ol>
@endsection

@section('content')
<div class="row ">
  <div class="col-md-6">
            <div class="box box-primary">
                      <div class="box-header">
                          <div class="box-title">
                              <h3 class="box-title"> Lista de Usuarios  </h3>
                          </div>
                      </div>
                      <div class="box-body">
                             <table id="user-table" class="table table-bordered table-striped">
                                    <thead>
                                      <tr>
                                        <th>ID</th>
                                        <th>Usuario</th>
                                        <th>Asignar Rol</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      @foreach ($users as $user)
                                        <tr>
                                          <td>{{ $user->id }}</td>
                                          <td>{{ $user->name}}</td>
                                          <td> 
                                           @if( $user->id !== 1)
                                             <a href="{{ route('admin.roles.asignar2',$user)}}" class="btn btn-xs btn-info"><i class="fa fa-edit"></i></a>
                                 
                                           @endif
                                          </td>
                                        </tr>
                                      @endforeach
                                    </tbody>
                              </table>
                      </div>
            </div>
  </div>
  <div class="col-md-6">
 
  <div class="box box-primary">
            <div class="box-header ">
                  <h3 class="box-title">Lista de Asignaciones </h3>
            </div>
            <div class="box-body">
              <table id="user-table" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Usuario</th>
                    <th>Rol</th>
                    <th>Convocatoria</th>
                    <th>Acciones</th>

                  </tr>
                </thead>
                <tbody>
                  @foreach ($asignaciones as $asignacion)
                    <tr>
                      <td>{{ $asignacion->id }}</td>
                      <td>{{ $asignacion->user->name}}</td>
                      <td>{{ $asignacion->user->getRoleNames()->implode(' ,') }} </td>
                      <td>{{ $asignacion->convocatoria->titulo }} </td>
                      <td>
                        <form method="POST" action="{{route('admin.roles.quitar', $asignacion )}}" style="display:inline">
                          {{csrf_field()}} {{ method_field('DELETE') }}
                                <button class="btn btn-xs btn-danger"  onclick="return confirm('¿Esta seguro de eliminar este rol?')"><i class="fa fa-times"></i></button>
                        </form>
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
      $('#user-table').DataTable({
			"paging":false,
			"lengthChange":true,
			"searching":false,
			"ordering":false,
			"info":false,
			"autowidth":true
	  });

    });
  </script>
@endpush