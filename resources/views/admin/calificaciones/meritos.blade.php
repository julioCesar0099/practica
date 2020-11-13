@extends('admin.layout')
 

 @section('content')
        <form  method="post" action="{{ route('admin.calificaciones.mer',[$postulante, $destino ,$convocatoria ]) }}">
             {{ csrf_field() }} {{ method_field('PUT') }}
 <div class="row">
        <div class="col-md-2">
        </div>
        <div class="col-md-7">
                    <div class="box box-primary">
                                <div class="box-header with-border ">
                                    <h3 class="box-title">Datos de la Tabla</h3>
                                </div>
                                <div class="box-body">
                                </div>
                    </div>
                    <template>
                        {{$titulo=1}}
                   </template>
                    @foreach( $convocatoria->tabla->secciones as $seccion)
                    <div class="box box-primary">
                        <div class="box-header with-border ">
                                            <div class="table-responsive col-md-6 ">
                                                 <table class="table table " >
                                                            <tr>
                                                                <td> <p class="box-title text-red" style="font-size:20px">{{$titulo}}.{{$seccion->nombre}} </p></td>
                                                            </tr>
                                                 </table>
                                            </div>
                                            @if ($errors->any())
                                                <ul class="list-group">
                                                    @foreach ($errors->all() as $error)
                                                        <li class="list-group-item list-group-item-danger">
                                                            {{ $error }}
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                            <div class="table-responsive col-md-4 pull-right">
                                                    <table class="table table  " >
                                                            <tr>
                                                                <td>
                                                                </td>
                                                                <td> <div class="form-group  pull-right">
                                                                            <label > {{$seccion->valor}} </label>
                                                                            <small > puntos</small>
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
                                                                                
                                                                                @if( $subseccion->tieneIncisos($subseccion) === 0 )
                                                                                    <td>
                                                                                        <input type="text" name="subseccionN[]" class="hide" value="{{$subseccion->nombre }}"> 
                                                                                        <input type="number" name="subseccion[]"  max="{{ $subseccion->puntaje}}" class="form-control" placeholder="ingrese la nota" value="{{old('subseccion')}}" >
                                                                                        <input name="sumasubseccion" type="number" class="hide " value="{{ $sumasubseccion=$sumasubseccion+$subseccion->puntaje }}" >
                                                                                    </td>
                                                                                 @else
                                                                                 <td>
                                                                                    <input type="text" name="subseccionN[]" class="hide" value="{{$subseccion->nombre }}"> 
                                                                                    <input type="number" name="subseccion[]" class="hide" value="0"> 
                                                                                    <input name="sumasubseccion" type="number" class="hide " value="{{ $sumasubseccion=$sumasubseccion+$subseccion->puntaje }}" >
                                                                                 </td>
                                                                                 @endif
                                                                                <td> <div class="form-group  pull-right">
                                                                                        <label > {{$subseccion->puntaje}} </label>
                                                                                        <small > puntos</small>
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
                                                                                                                    @if( $inciso->tieneSubincisos($inciso) === 0 )
                                                                                                                         <td>
                                                                                                                            <input type="text" name="incisoN[]" class="hide" value="{{$inciso->nombre }}"> 
                                                                                                                            <input type="number" name="inciso[]"  max="{{ $inciso->puntaje}}" class="form-control" placeholder="ingrese la nota" value="{{old('inciso')}}" >
                                                                                                                            <input name="sumainciso" type="number" class="hide " value="{{  $sumainciso=$sumainciso+$inciso->puntaje }}" >
                                                                                                                        </td>
                                                                                                                        @else
                                                                                                                    
                                                                                                                         <td>
                                                                                                                            <input type="text" name="incisoN[]" class="hide" value="{{$inciso->nombre }}">
                                                                                                                            <input type="number" name="inciso[]" class="hide" value="0">  
                                                                                                                            <input name="sumainciso" type="number" class="hide " value="{{  $sumainciso=$sumainciso+$inciso->puntaje }}" >
                                                                                                                        </td>
                                                                                                                        @endif
                                                                                                                    <td> <div class="form-group  pull-right">
                                                                                                                            <label > {{$inciso->puntaje}} </label>   
                                                                                                                            <small > puntos</small>
                                                                                                                        </div>
                                                                                                                    </td>
                                                                                                                    
                                                                                                                </tr>
                                                                                                        </table>
                                                                                                </div>
                                                                                        </div>
                                                                                        <div class="box-body">
                                                                                                <template>
                                                                                                    {{$subin=1
                                                                                                    }}
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
                                                                                                                <div class="table-responsive col-md-4 ">
                                                                                                                        <table class="table table-bordered "  >
                                                                                                                                <tr>
                                                                                                                                    <td>
                                                                                                                                    <input type="text" name="subincisoN[]" class="hide" value="{{$subinciso->nombre }}"> 
                                                                                                                                    <input  type="number"  name="subinciso[]" max="{{ $inciso->puntaje}}" class="form-control" placeholder="ingrese la nota" value="{{old('subinciso[]')}}" >
                                                                                                                                    </td>
                                                                                                                                    <td> <div class="form-group  pull-right">
                                                                                                                                             
                                                                                                                                            <label > {{$subinciso->puntaje}} </label>   
                                                                                                                                            <small > puntos </small>
                                                                                                                                        </div>
                                                                                                                                    </td>
                                                                                                                                   
                                                                                                                                </tr>
                                                                                                                        </table>
                                                                                                                </div>
                                                                                                        </div>
                                                                                                <template>
                                                                                                    {{$subin++ 
                                                                                                    }}
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
                                                                                           
                </form>
         </div>  
         <div class="col-md-3">
                 <div class="box box-primary">
                        <div class="box-header with-border ">
                            <h3 class="box-title">Acciones</h3>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                    <button type='submit' class='btn btn-primary btn-block'>Aceptar</button>
                            </div> 
                            <div class="form-group">
                             <a href="javascript: history.go(-1)" class='btn btn-primary btn-block' > Atras </a>     
                            </div> 
                        </div>

         </div>
  </div>
         </form>

                   


 @endsection
 @push('scripts')

 <script>

 </script>


@endpush