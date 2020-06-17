@extends('admin.layout')
 

 @section('content')
 <div class="row">
        <div class="col-md-2">
        </div>
        <div class="col-md-7">
        
                    <div class="box box-primary">
                                <div class="box-header with-border ">
                                    <h3 class="box-title">Datos de la Nueva Tabla</h3>
                                </div>
                    <form method="POST" action="{{route('admin.tablas.update',$tabla)}}">
                        {{csrf_field()}}  {{ method_field('PUT') }}
                                <div class="box-body">
                                            <div class="table-responsive col-md-6  ">
                                                 <table class="table table " >
                                                            <tr>
                                                            <td>  <div class="form-group {{ $errors->has('nombre') ? 'has-error' : '' }}">
                                                                        <label > Nombre  </label>
                                                                        <input name="nombre" class="form-control" value="{{old('nombre',$tabla->nombre)}}" >
                                                                        {!! $errors->first('nombre','<span class=help-block>:message</span>') !!}
                                                                </div> 
                                                             </td>
                                                             </tr> 
                                                 </table>
                                            </div>
                                            <div class="table-responsive col-md-6 ">
                                                    <table class="table table pull-right " >
                                                            <tr>
                                                                <td class="col-md-5">    <label > Valor en la convocatoria</label> 
                                                                        <div class="form-group {{ $errors->has('valor') ? 'has-error' : '' }} pull-right">
                                                                            <input  type="number" name="valor" max="100" class="form-control" placeholder="Valor" value="{{old('valor',$tabla->valor)}}" >
                                                                            {!! $errors->first('valor','<span class=help-block>:message</span>') !!}
                                                                        </div>
                                                                        
                                                                </td>
                                                                <td>    <label >Añadir titulo </label>
                                                                    <div class="form-group">
                                                                        <a href="{{route('admin.tablas.titulo',$tabla)}}" class="btn btn-primary " ><i class="fa fa-plus"></i> </a>
                                                                    </div>
                                                                </td>
                                                                </tr>
                                                        </table>
                                            </div> 
                                                <div class="table-responsive col-md-6  ">
                                                        <table class="table table " >
                                                                    <tr>
                                                                        <td> 
                                                                            <button class="btn btn-primary"> GUARDAR TABLA </button>
                                                                        </td> 
                                                                    </tr> 
                                                        </table>
                                                  </div>
                                                  <div class="table-responsive col-md-6 ">
                                                    <table class="table table pull-right " >
                                                            <tr>
                                                                <td>  
                                                                <a href="{{ route('admin.tablas.indexAsig')}}" class="btn btn-xm btn-primary pull-right">cancelar</a>
                                                                </td>
                                                            </tr>
                                                        </table>
                                            </div> 
                                           
                                </div>
                        </form>
                    </div>
                    <template>
                        {{$titulo=1}}
                   </template>
                    @foreach( $tabla->secciones as $seccion)
                    <div class="box box-primary">
                        <div class="box-header with-border ">
                                            <div class="table-responsive col-md-6 ">
                                                 <table class="table table " >
                                                            <tr>
                                                            <td> <p class="box-title text-red" style="font-size:20px">{{$titulo}}.{{$seccion->nombre}} </p></td>
                                                            </tr>
                                                 </table>
                                            </div>
                                            <div class="table-responsive col-md-4 pull-right">
                                                    <table class="table table  " >
                                                            <tr>
                                                                <td> <div class="form-group  pull-right">
                                                                            <input  type="number"   class="form-control" placeholder="Valor" value="{{old('valor',$seccion->valor)}}" disabled >
                                                                        </div>
                                                                </td>
                                                                <td>
                                                                <form method="POST" action="{{route('admin.tablas.titulo.destroy', [$tabla ,$seccion])}}" style="display:inline">
                                                                     {{csrf_field()}} {{ method_field('DELETE') }}
                                                                            <button class="btn btn-sm btn-danger"  onclick="return confirm('¿Esta seguro de eliminar este titulo? ')"><i class="fa fa-times"></i></button>
                                                                 </form>
                                                                </td>
                                                                <td>
                                                                    <div class="form-group">
                                                                        <a href="{{route('admin.tablas.subtitulo',[$tabla,$seccion])}}" class="btn  btn-primary "  ><i class="fa fa-plus"></i>  Subtitulo</a>
                                                                    </div>
                                                                </td>
                                                                </tr>
                                                        </table>
                                            </div>
                        </div>
                        <div class="box-body">
                                    <template>
                                    {{$subtitulo=1}}
                                    </template>   
                                    @foreach( $seccion->subsecciones as $subseccion)
                                                     <div class="box-header with-border ">
                                                            <div class="table-responsive col-md-8 ">
                                                                <table class="table table " >
                                                                            <tr>
                                                                            <td><p class="text-light-blue "  style="font-size:19px" >{{$titulo}}.{{$subtitulo}}.- {{$subseccion->nombre}}</p> </td>
                                                                            </tr>
                                                                </table>
                                                            </div>
                                                            <div class="table-responsive col-md-4 pull-right">
                                                                    <table class="table table-bordered " >
                                                                            <tr>
                                                                                <td> <div class="form-group  pull-right">
                                                                                            <input  type="number"  class="form-control" placeholder="Valor" value="{{old('valor',$subseccion->puntaje)}}" disabled>
                                                                                               
                                                                                    </div>
                                                                                </td>
                                                                                <td>
                                                                                <form method="POST" action="{{route('admin.tablas.subtitulo.destroy', [$tabla ,$subseccion])}}" style="display:inline">
                                                                                        {{csrf_field()}} {{ method_field('DELETE') }}
                                                                                                <button class="btn btn-sm btn-danger"  onclick="return confirm('¿Esta seguro de eliminar este subtitulo? ')"><i class="fa fa-times"></i></button>
                                                                                        </form>
                                                                                 </td>
                                                                                <td>
                                                                                    <div class="form-group">
                                                                                        <a href=" {{ route('admin.tablas.inciso',[$tabla,$subseccion]) }}" class="btn btn-primary pull-right"  ><i class="fa fa-plus"></i>inciso</a>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                    </table>
                                                            </div>
                                                     </div>
                                                    <div class="box-body">
                                                                    <template>
                                                                        {{$in=1}}
                                                                    </template>
                                                                        @foreach($subseccion->incisos as $inciso )
                                                                                        <div class="box-header  ">
                                                                                                <div class="table-responsive col-md-7 ">
                                                                                                    <table class="table table " >
                                                                                                                <tr>
                                                                                                                <td><p  style="font-size:18px ">{{$titulo}}.{{$subtitulo}}.{{$in}}.- {{$inciso->nombre}}</p> </td>
                                                                                                                </tr>
                                                                                                    </table>
                                                                                                </div>
                                                                                                <div class="table-responsive col-md-4 pull-right">
                                                                                                        <table class="table table-bordered " >
                                                                                                                <tr>
                                                                                                                    <td> <div class="form-group  pull-right">
                                                                                                                                <input  type="number" class="form-control" placeholder="Valor" value="{{old('valor',$inciso->puntaje)}}" disabled>
                                                                                                                                   
                                                                                                                        </div>
                                                                                                                    </td>
                                                                                                                    <td>
                                                                                                                    <form method="POST" action="{{route('admin.tablas.inciso.destroy', [$tabla ,$inciso])}}" style="display:inline">
                                                                                                                            {{csrf_field()}} {{ method_field('DELETE') }}
                                                                                                                                    <button class="btn btn-sm btn-danger"  onclick="return confirm('¿Esta seguro de eliminar este inciso? ')"><i class="fa fa-times"></i></button>
                                                                                                                            </form>
                                                                                                                    </td>
                                                                                                                    <td>
                                                                                                                            <a href="{{ route('admin.tablas.subinciso',[$tabla,$inciso]) }}" class="btn btn-primary pull-right"  ><i class="fa fa-plus"></i> subinciso</a>
                                                                                                                            </td>
                                                                                                                </tr>
                                                                                                        </table>
                                                                                                </div>
                                                                                        </div>
                                                                                        <div class="box-body">
                                                                                                <template>
                                                                                                    {{$subin=1}}
                                                                                                </template>
                                                                                                @foreach($inciso->subincisos as $subinciso )
                                                                                                         <div class="box-header  ">
                                                                                                                <div class="table-responsive col-md-6">
                                                                                                                    <table class="table table " >
                                                                                                                                <tr>
                                                                                                                                <td><p class="text-muted" style="font-size:17px">{{$titulo}}.{{$subtitulo}}.{{$in}}.{{$subin}}.- {{$subinciso->nombre}}</p> </td>
                                                                                                                                </tr>
                                                                                                                    </table>
                                                                                                                </div>
                                                                                                                <div class="table-responsive col-md-3 ">
                                                                                                                        <table class="table table-bordered " >
                                                                                                                                <tr>
                                                                                                                                    <td> <div class="form-group  pull-right">
                                                                                                                                                <input  type="number"  class="form-control" placeholder="Valor" value="{{old('valor',$subinciso->puntaje)}}" disabled >
                                                                                                                                                   
                                                                                                                                        </div>
                                                                                                                                    </td>
                                                                                                                                    <td>
                                                                                                                                        <div class="form-group">
                                                                                                                                        <form method="POST" action="{{route('admin.tablas.subinciso.destroy', [$tabla ,$subinciso])}}" style="display:inline">
                                                                                                                                        {{csrf_field()}} {{ method_field('DELETE') }}
                                                                                                                                                <button class="btn btn-sm btn-danger"  onclick="return confirm('¿Esta seguro de eliminar este subinciso? ')"><i class="fa fa-times"></i></button>
                                                                                                                                        </form>
                                                                                                                                        </div>
                                                                                                                                    </td>
                                                                                                                                </tr>
                                                                                                                        </table>
                                                                                                                </div>
                                                                                                        </div>
                                                                                                <template>
                                                                                                    {{$subin++}}
                                                                                                </template>
                                                                                                @endforeach

                                                                                        </div>
                                                                                                <template>
                                                                                                    {{$in++}}
                                                                                                </template>
                                                                        @endforeach
                                                     </div>       
                                        
                                           <template>
                                           {{$subtitulo++}}
                                          </template>            
                                      @endforeach
                         
                                <template>
                                    {{$titulo++}}
                                </template>     
                        </div>
                    </div>
                    
                    @endforeach
                   
                
         </div>  
   
  </div>

                   


 @endsection
 @push('scripts')

 


@endpush