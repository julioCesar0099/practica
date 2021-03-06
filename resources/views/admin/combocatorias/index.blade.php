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
  <div class="box box-primary">
            <div class="box-header ">
                  <h3 class="box-title">Lista de convocatorias</h3>
            </div>
            <div class="box-body">
              <table id="combocatoria-table" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Tipo</th>
                    <th>Fecha publicacion</th>
                    <th>Fecha finalizacion</th>
                    <th>Area </th>
                    <th>Postulantes</th>
                    <th>Eventos</th>
                    <th>Acciones</th>

                  </tr>
                </thead>
                <tbody>
                  @foreach ($combocatorias as $combocatoria)
                    <tr>
                      <td>{{ $combocatoria->id }}</td>
                      <td>{{ $combocatoria->titulo }}</td>
                      <td>{{ $combocatoria->tipo}}</td>
                      <td>{{ $combocatoria->fecha_inicio->format('d - M - Y') }}</td>
                      <td>{{ $combocatoria->fecha_fin->format('d - M - Y')  }}</td>
                      <td>
                      @if($combocatoria->area_id)
                      {{ $combocatoria->area->nombre }}
                      @else
                       <a class="text-muted"> Asignar Area</a>
                      @endif
                      
                      </td>
                      <td> 
                      @can('habilitar postulantes', new \Spatie\Permission\Models\Role)
                      <a href="{{ route('postulantes.itemsPost',$combocatoria) }}" class="btn btn-default">Habilitar</a>
                      @endcan
                      </td>
                      <td>
                      @can('ver eventos', new \Spatie\Permission\Models\Role)
                      <a href="{{url('/admin/eventos/'.$combocatoria->id)}}"  class="btn btn-default" ><i class="">ver</i></a>
                      @endcan
                      </td>

                      <td>
                          @if($combocatoria->estado == '0')

                            <a href="{{url('/admin/publicar/'.$combocatoria->id)}}"  class="btn btn-default" ><i class="">Publicar</i></a>

                          @endif()
                          @if($combocatoria->estado == '1')

                            <a href="{{url('/admin/quitar/'.$combocatoria->id)}}"  class="btn btn-default" ><i class="">Retirar</i></a>

                          @endif()
                          
                         
                          <a href="{{ url('/index/'.$combocatoria->id)}}"  class="btn btn-xs btn-default"  target="_blank"><i class="fa fa-eye"></i></a>

                          @can('editar convocatorias', new \Spatie\Permission\Models\Role)
                          <a href="{{ route('admin.combocatorias.edit',$combocatoria) }}"  class="btn btn-xs btn-primary" ><i class="fa fa-pencil"></i></a>
                          @endcan
	                        @can('eliminar convocatorias', new \Spatie\Permission\Models\Role)
                          <form  method="POST" action="{{ route('admin.combocatorias.destroy', $combocatoria) }}"  style="display: inline">
                                  {{ csrf_field() }} {{ method_field('DELETE')}}
                                  <button class="btn btn-xs btn-danger"  onclick="return confirm('¿Esta seguro de eliminar esta publicación?')"><i class="fa fa-times"></i></button>
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
