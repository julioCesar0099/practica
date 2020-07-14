@extends('admin.layout')

@section('header')
  <h1>
    Convocatoria
    <small>Listado de fechas</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li class="active">convocatoria</li>
  </ol>
  
@endsection

@section('content')
<div class="box box-primary">
            <div class="box-header ">
                  <h3 class="box-title">Lista de Eventos</h3>
                  <a href="{{url('/admin/eventos/create/'.$id)}}"  class="btn btn-primary col-xs-offset-11" ><i class="">Añadir evento</i></a>
            
            </div>
            
            
            <div class="box-body">
              <table id="combocatoria-table" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>detalle</th>
                    <th>fecha</th>
                    <th>Eliminar</th>
                  </tr>
                </thead>
                <tbody>
                    <tr>
                      <td>0</td>
                      <td>Fecha inicio</td>
                      <td>{{$combocatoria->fecha_inicio->format('d - M - Y')}}</td>
                    </tr>
                  @foreach($combocatoria->eventos as $evento)
                    <tr> 
                      <td>{{$loop->iteration}}</td>
                      <td>{{$evento->detalle}}</td>
                      <td>{{$evento->fecha->format('d - M - Y')}}</td>
                      <td>
                        <form method="post" action="{{ route('admin.eventos.borrar',$evento) }}" style="display: inline">
                            {{csrf_field() }}
                            {{method_field('DELETE')}}
                            <button class="btn btn-xs btn-danger"  onclick="return confirm('¿Esta seguro de eliminar este dato?')"><i class="fa fa-times"></i></button>
                        </form>
                      </td>
                    </tr>
                  @endforeach
                    <tr>
                      <td>-</td>
                      <td>Fecha Final</td>
                      <td>{{$combocatoria->fecha_fin->format('d - M - Y')}}</td>
                    </tr>
                </tbody>
              </table>
            </div>
    <!-- /.box-body -->
  </div>
@endsection
