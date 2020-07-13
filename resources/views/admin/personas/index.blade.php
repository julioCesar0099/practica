 
 
 @extends('admin.layout')

@section('header')
  <h1>
    Tabla CCB
    <small>Listado</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li class="active">CCB</li>
  </ol>
@endsection

@section('content')
  <div class="box box-primary">
            <div class="box-header ">
                  <h3 class="box-title">Lista de convocatorias</h3>
            </div>
            <div class="box-body">
              <table id="user-table" class="table table-bordered table-striped">
                <thead>
                     <tr>
                        <th>Id</th>
                        <th>Ocupación</th>
                        <th>Nombre</th>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th>Telefono</th>
                        <th>Correo</th>
                        <th>Comisiones</th>
                        <th>Acciones</th>
                    </tr>
                 
                </thead>
                <tbody>
                    @foreach($personas as $personas)
                      <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{ $personas->ocunombre}}</td>
                        <td>{{ $personas->nombre}}</td>
                        <td>{{ $personas->apellidoP}}</td>
                        <td>{{ $personas->apellidoM}}</td>
                        <td>{{ $personas->telefono}}</td>
                        <td>{{ $personas->correo}}</td>
                        <td>
                        
                        </th>
                        @if($personas->ocunombre == 'docente')
                          @if($personas->user_id == '0')
                            @can('agregar nuevo usuario',new \Spatie\Permission\Models\Role)
                              <a href="{{ url('/admin/'.$personas->id.'/agregar/')}}"class="btn btn-xs btn-info"><i class="">agregar</i></a>
                            @endcan
                          @endif
                          @if($personas->user_id == '1')
                            @can('agregar nuevo usuario',new \Spatie\Permission\Models\Role)
                              <a href="{{ url('/admin/'.$personas->id.'/quitar/')}}"class="btn btn-xs btn-info"><i class="">quitar</i></a>
                            @endcan
                          @endif
                        @endif
                        <td>
                        @can('editar usuarios',new \Spatie\Permission\Models\Role)   
                        <a href="{{ url('/admin/personas/'.$personas->id.'/edit')}}"class="btn btn-xs btn-info"><i class="fa fa-pencil"></i></a> 
                        @endcan
                        @can('eliminar usuarios',new \Spatie\Permission\Models\Role)
                        <form method="post" action="{{ url('/admin/personas/'.$personas->id)}}" style="display: inline">
                            {{csrf_field() }}
                            {{method_field('DELETE')}}
                            <button class="btn btn-xs btn-danger"  onclick="return confirm('¿Esta seguro de eliminar este dato?')"><i class="fa fa-times"></i></button>
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
      $('#user-table').DataTable({
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
 
 
 