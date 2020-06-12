@extends('admin.layout')
 
@section('header')
  <h1>
        Tabla de meritos
    <small>crear una Tabla de Meritos</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li class="active">Crear Tabla</li>
  </ol>
@endsection
 @section('content')
 <div class="row">
        <div class="col-md-2">
        </div>
        <div class="col-md-7">
        
                    <div class="box box-primary">
                                <div class="box-header with-border ">
                                    <h3 class="box-title">Datos de la Nueva Tabla</h3>
                                </div>
                    <div class="box-body">
               
                                 <div class="form-group {{ $errors->has('nombreDoc') ? 'has-error' : '' }}">
                                        <label > Nombre  </label>
                                        <input name="nombreDoc" class="form-control" value="{{old('nombreDoc',$tabla->nombre)}}" >
                                        {!! $errors->first('nombreDoc','<span class=help-block>:message</span>') !!}
                                </div>
                               
                    </div>
                    <div class="box box-primary">
                                <div class="box-header with-border ">
                                    <h3 name="titulo" class="box-title">Rendimiento Academico </h3>
                                           <div class="form-group {{ $errors->has('valor') ? 'has-error' : '' }} pull-right">
                                                <input  type="number" name="valor" class="form-control" placeholder="Valor" value="{{old('valor')}}" >
                                                {!! $errors->first('valor','<span class=help-block>:message</span>') !!}
                                          </div>
                                </div>
                    <div class="box-body">
                            <div class="form-group">
                                <a  class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal" ><i class="fa fa-plus"></i> Añadir inciso</a>
                            </div>
                            <div class="form-group">
                                <div class="table-responsive">
                                        <table class="table table-bordered" >
                                            <tr>
                                                <td>Inciso</td>
                                                <td>Puntaje</td>
                                                <td>cacciones</td>

                                            
                                            </tr>
                                            @foreach($incisos as $inciso)
                                            <tr>
                                                <td> {{ $inciso->nombre }}</td>
                                                <td> {{ $inciso->puntaje }} </td>
                                                <td> 
                                                    <form method="POST" action="{{ route('admin.tablas.destroy2', [$tabla,$inciso]) }}" style="display:inline">
                                                        {{csrf_field()}} {{ method_field('DELETE') }}
                                                            <button class="btn btn-xs btn-danger"><i class="fa fa-times"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </table>
                                </div>
                             </div>

                    </div>

                    <div class="box box-primary">
                                <div class="box-header with-border ">
                                    <h3 name="titulo" class="box-title">Experiencia General </h3> 
                                          <div class="form-group {{ $errors->has('valor') ? 'has-error' : '' }} pull-right">
                                                        <input  type="number" name="valor" class="form-control" placeholder="Valor" value="{{old('valor')}}" >
                                                        {!! $errors->first('valor','<span class=help-block>:message</span>') !!}
                                          </div>
                                </div>
                    <div class="box-body">
                                <div class="box-header with-border ">
                                                <h3 name="titulo" class="box-title">Documentos de experiencia universitaria </h3> 
                                                      <div class="form-group {{ $errors->has('valor') ? 'has-error' : '' }} pull-right">
                                                                    <input  type="number" name="valor" class="form-control" placeholder="Valor" value="{{old('valor')}}" >
                                                                    {!! $errors->first('valor','<span class=help-block>:message</span>') !!}
                                                      </div>
                                                  <div class="form-group">
                                                  
                                                  
                                                  </div>

                                </div>
                                <div class="box-header with-border ">
                                                <h3 name="titulo" class="box-title">Documentos de experiencia extra-universitaria </h3> 
                                                      <div class="form-group {{ $errors->has('valor') ? 'has-error' : '' }} pull-right">
                                                                    <input  type="number" name="valor" class="form-control" placeholder="Valor" value="{{old('valor')}}" >
                                                                    {!! $errors->first('valor','<span class=help-block>:message</span>') !!}
                                                      </div>
                                </div>

                    </div>
                     <div class="form-group">

                             <button class="btn btn-primary btn-block"> Crear Tabla</button>
                     </div>
          
        </div>
 </div>


 @endsection
 @push('scripts')

        <script>
                     
                   

        </script>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <form method="POST" action="{{route('admin.tablas.update2',$tabla)}}">
      {{csrf_field()}}  {{ method_field('PUT') }}

          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">agregar inciso </h4>
              </div>
              <div class="modal-body">
                                <div class="form-group {{ $errors->has('inciso') ? 'has-error' : '' }}">
                                        <input autocomplete="off" name="inciso" class="form-control" value="{{old('inciso')}}" placeholder="Ingresa un inciso">
                                        {!! $errors->first('inciso','<span class=help-block>:message</span>') !!}
                                </div> 
                                <div class="form-group {{ $errors->has('puntaje') ? 'has-error' : '' }}">
                                        <input autocomplete="off" type="number" name="puntaje" class="form-control" value="{{old('puntaje')}}" placeholder="Ingresa un puntaje">
                                        {!! $errors->first('puntaje','<span class=help-block>:message</span>') !!}
                                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button class="btn btn-primary">Añadir</button>
              </div>
            </div>
          </div>

      </form>
</div>
@endpush