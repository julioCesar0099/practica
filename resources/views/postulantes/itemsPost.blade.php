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
    <h1>Items habilitados</h1>
     <table class="table">
        <thead>
             <tr>
                <th scope="col">Item</th>
            </tr>
        </thead>
         <tbody>
        @foreach($combocatoria->items as $item)
        <tr>
           <td>
            <a href="{{route('item.Postulante',[$combocatoria,$item->destino])}}">{{$item->destino}}</a>
           </td>
        </tr>   
        @endforeach
        </tbody>   
    </table>
  
@endsection
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