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
<div class="row">
    <div class="col-md-3">
    </div>
    <div class="col-md-6">
    <div class="box box-primary">
            <div class="box-header ">
                            <h3 class="box-title">{{$postulante->persona->nombre}} </h3>
                        </div>
             <div class="box-body">
                <form method="POST" action="{{ route('admin.calificaciones.calif', [$postulante,$destino,$convocatoria] ) }}">
                     {{ csrf_field() }} {{ method_field('PUT') }}
                    <div class="table-responsive">
                            <table class="table table-bordered" id="dynamic_field">
                                <template>
                                        {{$i=1 ,
                                        $d=count($postulante->notas), 
                                        $a= $d-1,
                                        $c= $d-$a 
                                        }}
                            </template>
                                @if ($d === 0 )
                                <tr>
                                 
                                    <td><label >Nombre del examen  </label>
                                        <input autocomplete="off" type="text" name="descripcion[]" placeholder="Ingrese descripcion" class="form-control name_list" value="{{old('descripcion' )}}">
                                        <label >Nota  </label>
                                        <input autocomplete="off" type="number" name="nota[]"  max="100" placeholder="Ingrese Nota" class="form-control name_list" value="{{old('nota' )}}"></td>
                                    <td><button type="button" name="add" id="add" class="btn btn-primary">Añadir nota </button></td>
                                </tr>
                                @else
                                        @foreach($postulante->notas as $nota)
                                            @if ($c === 1)
                                            <tr>
                                                <td><label >Nombre del examen  </label>
                                                    <input autocomplete="off" type="text" name="descripcion[]" placeholder="Ingrese descripcion" class="form-control name_list" value="{{old('descripcion', $nota->descripcion )}}">
                                                    <label >Nota  </label>
                                                    <input autocomplete="off" type="number" max="100" name="nota[]" placeholder="Ingrese Nota" class="form-control name_list" value="{{old('nota' , $nota->nota )}}"></td>
                                                <td><button type="button" name="add" id="add" class="btn btn-primary">Añadir nota </button></td>
                                            </tr>
                                        
                                            @else
                                            <tr>
                                            <tr id="row{{$i}}"> 
                                                <td> <label >Nombre del examen  </label>
                                                    <input autocomplete="off" type="text" name="descripcion[]" placeholder="Ingrese descripcion" class="form-control name_list" value="{{old('descripcion', $nota->descripcion )}}">
                                                    <label >Nota  </label>
                                                    <input autocomplete="off" type="number" max="100" name="nota[]" placeholder="Ingrese Nota" class="form-control name_list" value="{{old('nota' , $nota->nota )}}"></td>
                                                <td><button type="button" name="remove" id="{{$i}}" class="btn btn-danger btn_remove">X</button></td>
                                            </tr>
                                        
                                            @endif
                                                <template>
                                                    {{$i++,
                                                        $c++ }}
                                                </template>
                                        @endforeach
                                @endif
                            </table>
                    </div>
                    <div class="form-group">
                            <button type='submit' class='btn btn-primary'>Aceptar</button> 
                            <a href="javascript: history.go(-1)" class='btn btn-primary pull-right' > Atras </a> 
                            
                            
                    </div>
                </form>
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

  <script>
                     $(document).ready(function(){
                            var i = 1;

                            $('#add').click(function () {
                                i++;
                                $('#dynamic_field').append('<tr id="row'+i+'">' +
                                                            '<td><label >Nombre del examen </label>'+
                                                                '<input autocomplete="off" type="text" name="descripcion[]" placeholder="Ingrese descripcion" class="form-control name_list" >'+
                                                                '<label >Nota  </label>'+
                                                                '<input autocomplete="off" type="number" max="100" name="nota[]" placeholder="Ingrese Nota" class="form-control name_list"></td>' +
                                                            '<td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td>' +
                                                            '</tr>');
                            });
                            
                            $(document).on('click', '.btn_remove', function () {
                                var id = $(this).attr('id');
                            $('#row'+ id).remove();
                            });   
                        })
</script>
@endpush