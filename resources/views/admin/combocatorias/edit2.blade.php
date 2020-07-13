@extends('admin.layout')

@section('header')
  <h1>
    Editar Convocatoria de Laboratorios
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li><a href="{{ route('admin.combocatorias.index') }}"><i class="fa fa-list"></i> Convocatorias</a></li>
    <li class="active"> crear convocatoria</li>
  </ol>
@endsection

@section('content')

        <form  method="POST" action="{{ route('admin.combocatorias.update',$combocatoria) }}">
            {{ csrf_field() }} {{ method_field('PUT') }}
                        <div class="row">
                                    <div class="col-md-6">
                                                <div class="box box-primary">
                                                        <div class="box-header">
                                                            <h3 class="box-title">Crear una Convocatoria</h3>
                                                        </div>
                                                        <div class="box-body">
                                                                <div class="form-group {{ $errors->has('tituloLab') ? 'has-error' : '' }}">
                                                                    <label> Titulo de la convocatoria</label>
                                                                    <input autocomplete="off" name="tituloLab" class="form-control" placeholder="ingresa el titulo de la convocatoria" value="{{old('tituloLab' ,$combocatoria->titulo )}}">
                                                                    {!! $errors->first('tituloLab','<span class=help-block>:message</span>') !!}
                                                                </div>
                                                                <div class="form-group {{ $errors->has('descripcion') ? 'has-error' : '' }} ">
                                                                    <label> Descripcion de la convocatoria</label>
                                                                    <input autocomplete="off" name="descripcion" class="form-control" placeholder="ingresa la descripcion de la convocatoria" value="{{old('descripcion' ,$combocatoria->descripcion )}}">
                                                                    {!! $errors->first('descripcion','<span class=help-block>:message</span>') !!}
                                                                </div>
                                                                        <div  class="form-group {{ $errors->has('tabla') ? 'has-error' : '' }}">
                                                                            <label> Tabla de calificacion de meritos </label>
                                                                            <select  name="tabla" class="form-control">
                                                                                        <option value=""> Selecciona un tabla de meritos</option>
                                                                                         @foreach($tablasDoc as $tabla)
                                                                                            <option  value="{{$tabla->id}}" 
                                                                                                     {{ old('tabla',$combocatoria->tabla_id) == $tabla->id  ? 'selected' :'' }}  > 
                                                                                                    {{$tabla->nombre}}</option>
                                                                                        @endforeach
                                                                            </select>
                                                                            {!! $errors->first('tabla','<span class=help-block>:message</span>') !!}
                                                                        </div>
                                                                        <div class="form-group">

                                                                        <a href="{{ route('admin.tablas.indexAsig')}}" class="btn btn-xm btn-primary"> inspeccionar</a>
                                                                        </div>
                                                        </div>
                                            </div>
                                    </div>
                                    <div class="col-md-6">
                                                        <div class="box box-primary">
                                                            <div class="box-header">
                                                            </div>
                                                        <div class="box-body">
                                                                <div class="form-group">
                                                                        <label>fecha final</label>
                                                                            <div class="input-group date">
                                                                                    <div class="input-group-addon">
                                                                                        <i class="fa fa-calendar"></i>
                                                                                    </div>
                                                                                        <input autocomplete="off" name="fecha_fin" type="text" class="form-control pull-right" id="datepicker" value="{{old('fecha_fin' ,$combocatoria->fecha_fin->format('m/d/Y'))}}" readonly>
                                                                            </div>
                                                                </div>
                                                                <div class="form-group {{ $errors->has('facultad') ? 'has-error' : '' }}">
                                                                    <label> Facultad </label>
                                                                    <select  name="facultad" class="form-control">
                                                                            <option value=""> selecione un facultad</option>
                                                                         @foreach($facultades as $facultad)
                                                                                    <option value="{{ $facultad->id }}"  {{ old('facultad',$combocatoria->facultad_id) == $facultad->id  ? 'selected' :'' }} >{{ $facultad->nombre}}</option>
                                                                         @endforeach
                                                                              
                                                                   
                                                                    </select>
                                                                    {!! $errors->first('facultad','<span class=help-block>:message</span>') !!}
                                                                </div>
                                                                        <div class="form-group {{ $errors->has('area') ? 'has-error' : '' }}">
                                                                            <label> Area </label>
                                                                            <select  name="area" class="form-control">
                                                                            <option value=""> Selecion un Area</option>
                                                                                     @foreach($areas as $area)
                                                                                            <option value="{{ $area->id }}"  {{ old('area',$combocatoria->area_id) == $area->id  ? 'selected' :'' }} >
                                                                                            
                                                                                            {{ $area->nombre}}</option>
                                                                                    @endforeach
                                                                            </select>
                                                                            {!! $errors->first('area','<span class=help-block>:message</span>') !!}
                                                                        </div>
                                                                        <div class="form-group {{ $errors->has('carreras') ? 'has-error' : '' }}">
                                                                            <label> Carreras </label>
                                                                            <select  name="carreras[]" class="form-control select4" multiple="multiple" data-placeholder="Selecciona una o mas carreras" style="width: 100%;">
                                                                                     @foreach($carreras as $carrera )
                                                                                        <option  value="{{ $carrera->id }}" {{ collect(old('carreras',$combocatoria->carreras->pluck('id')))->contains($carrera->id)  ? 'selected' :'' }}   >
                                                                                        {{ $carrera->nombre }}</option>
                                                                                    @endforeach
                                                                            </select>
                                                                            {!! $errors->first('carreras','<span class=help-block>:message</span>') !!}
                                                                        </div>
                                                                
                                                        </div>
                                            </div>
                                    </div>
                        </div>

                        <div class="row">
                                <div class="col-md-6">
                                        <div class="box box-primary">
                                                    <div class="box-header">
                                                        <h3 class="box-title">Requisitos de la convocatoria</h3>
                                                    </div>
                                                    <div class="box-body">
                                                                <div class="table-responsive">
                                                                        <table class="table table-bordered" id="dynamic_field">
                                                                          <template>
                                                                                 {{$i=1 ,
                                                                                  $d=count($combocatoria->requisitos), 
                                                                                  $a= $d-1,
                                                                                  $c= $d-$a 
                                                                                  }}
                                                                        </template>
                                                                         @if ($d === 0 )
                                                                            <tr>
                                                                                         <td><h4> Añadir nuevo requisito</h4></td>
                                                                                            <td><button type="button" name="add" id="add" class="btn btn-primary"><i class="fa fa-plus"></i> </button></td>
                                                                            </tr>
                                                                            @else
                                                                                    @foreach($combocatoria->requisitos as $requisito)
                                                                                        @if ($c === 1)
                                                                                        <tr>
                                                                                            <td><h4> Añadir nuevo requisito</h4></td>
                                                                                            <td><button type="button" name="add" id="add" class="btn btn-primary"><i class="fa fa-plus"></i> </button></td>
                                                                                         </tr>
                                                                                         <tr id="row{{$i}}"> 
                                                                                            <td><input  autocomplete="off" type="text" name="requisito[]" placeholder="Ingrese documento" class="form-control name_list" value="{{old('requisito' ,$requisito->detalle )}}"></td>
                                                                                            <td><button type="button" name="remove" id="{{$i}}" class="btn btn-danger btn_remove">X</button></td>
                                                                                        
                                                                                        </tr>
                                                                                    
                                                                                        @else
                                                                                        <tr>
                                                                                        <tr id="row{{$i}}"> 
                                                                                            <td><input  autocomplete="off" type="text" name="requisito[]" placeholder="Ingrese documento" class="form-control name_list" value="{{old('requisito' ,$requisito->detalle )}}"></td>
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
                                                    </div>        
                                        </div>
                                </div>
                                <div class="col-md-6">   
                                        <div class="box box-primary">
                                            <div class="box-header">
                                                <h3 class="box-title">Documentos a presentar de la convocatoria</h3>
                                            </div>
                                                    <div class="box-body">
                                                                <div class="table-responsive">
                                                                        <table class="table table-bordered" id="dynamic_field2">
                                                                        <template>
                                                                                 {{$i=1 ,
                                                                                  $d= count($combocatoria->documentos), 
                                                                                  $a= $d-1,
                                                                                  $c= $d-$a 
                                                                                  }}
                                                                        </template>
                                                                             @if ($d === 0 )
                                                                            <tr>
                                                                                <td><h4>Añadir nuevo Documento</h4></td>
                                                                                <td><button type="button" name="add" id="add2" class="btn btn-primary"><i class="fa fa-plus"></i>  </button></td>
                                                                            </tr>
                                                                            @else
                                                                                @foreach($combocatoria->documentos as $documento)
                                                                                    @if ($c === 1 )
                                                                                    <tr>
                                                                                        <td><h4>Añadir nuevo Documento</h4></td>
                                                                                        <td><button type="button" name="add" id="add2" class="btn btn-primary"><i class="fa fa-plus"></i>  </button></td>
                                                                                    </tr>
                                                                                    <tr id="row2{{$i}}"> 
                                                                                        <td><input  autocomplete="off" type="text" name="documentos[]" placeholder="Ingrese documento" class="form-control name_list" value="{{old('documento' ,$documento->detalle )}}"></td>
                                                                                        <td><button type="button" name="remove" id2="{{$i}}" class="btn btn-danger btn_remove">X</button></td>
                                                                                    
                                                                                    </tr>
                                                                                    @else
                                                                                   
                                                                                    <tr id="row2{{$i}}"> 
                                                                                        <td><input  autocomplete="off" type="text" name="documentos[]" placeholder="Ingrese documento" class="form-control name_list" value="{{old('documento' ,$documento->detalle )}}"></td>
                                                                                        <td><button type="button" name="remove" id2="{{$i}}" class="btn btn-danger btn_remove">X</button></td>
                                                                                    
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
                                                    </div>        
                                        </div>
                                </div>
                        </div>

                        <div class="row">
                                <div class="col-md-6">
                                        <div class="box box-primary">
                                                    <div class="box-header">
                                                        <h3 class="box-title">Items de la convocatoria</h3>
                                                    </div>
                                                    <div class="box-body">
                                                    <div class="table-responsive">
                                                            <table class="table table-bordered" id="dynamic_field6">
                                                                         <template>
                                                                                 {{$i=1 ,
                                                                                  $d=count($combocatoria->itemlabs), 
                                                                                  $a= $d-1,
                                                                                  $c= $d-$a 
                                                                                  }}
                                                                        </template>
                                                                        @if ($d === 0 )
                                                                            <tr>
                                                                                     <td>
                                                                                        <h4>Agregar Item </h4>
                                                                                        </td>
                                                                                        <td><button type="button" name="add" id="add6" class="btn btn-primary">Añadir Item</button></td>
                                                                            </tr>
                                                                            @else
                                                                                @foreach($combocatoria->itemlabs as $item)
                                                                                    @if ($c === 1)
                                                                                    <tr>
                                                                                         <td>
                                                                                        <h4>Agregar Item </h4>
                                                                                        </td>
                                                                                        <td><button type="button" name="add" id="add6" class="btn btn-primary">Añadir Item</button></td>
                                                                                     </tr>
                                                                                     <tr id="row6{{$i}}"> 
                                                                                        <td>
                                                                                            <label> Cantidad de auxiliares  </label>
                                                                                            <input type="number"  name="cantidad_aux[]" class="form-control name_list" placeholder="ingresa el numero de auxiliares" value="{{old('cantidad_aux' ,$item->cantidad_aux )}}"></input>
                                                                                            <label> Horas laborales  </label>
                                                                                            <input type="number"  name="horas[]" class="form-control name_list" placeholder="ingresa las horas asignadas"  value="{{old('horas' ,$item->horas )}}"></input>
                                                                                            <label> Nombe de la auxiliatura </label>
                                                                                            <input  autocomplete="off" type="text" name="nombre[]" class="form-control name list" placeholder="ingresa el nombre de la auxiliatura" value="{{old('nombre',$item->nombre )}}"></input>
                                                                                            <label> Codigo de la Auxiliatura </label>
                                                                                            <input autocomplete="off" type="text" name="codigo[]" class="form-control name list" placeholder="ingresa el codigo de la  auxiliatura" value="{{old('codigo' ,$item->codigo)}}"></input>
                                                                                            </td>
                                                                                            <td><button type="button" name="remove" id6="{{$i}}" class="btn btn-danger btn_remove">X</button></td>
                                                                                        
                                                                                    </tr>
                                                                                
                                                                                    @else
                                                                                    
                                                                                    <tr id="row6{{$i}}"> 
                                                                                        <td>
                                                                                            <label> Cantidad de auxiliares  </label>
                                                                                            <input type="number"  name="cantidad_aux[]" class="form-control name_list" placeholder="ingresa el numero de auxiliares" value="{{old('cantidad_aux' ,$item->cantidad_aux )}}"></input>
                                                                                            <label> Horas laborales  </label>
                                                                                            <input type="number"  name="horas[]" class="form-control name_list" placeholder="ingresa las horas asignadas"  value="{{old('horas' ,$item->horas )}}"></input>
                                                                                            <label> Nombe de la auxiliatura </label>
                                                                                            <input  autocomplete="off" type="text" name="nombre[]" class="form-control name list" placeholder="ingresa el nombre de la auxiliatura" value="{{old('nombre',$item->nombre )}}"></input>
                                                                                            <label> Codigo de la Auxiliatura </label>
                                                                                            <input autocomplete="off" type="text" name="codigo[]" class="form-control name list" placeholder="ingresa el codigo de la  auxiliatura" value="{{old('codigo' ,$item->codigo)}}"></input>
                                                                                            </td>
                                                                                            <td><button type="button" name="remove" id6="{{$i}}" class="btn btn-danger btn_remove">X</button></td>
                                                                                        
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
                                                        
                                                    </div>        
                                        </div>
                                </div>
                                <div class="col-md-6">
                                        <div class="box box-primary">
                                                <div class="box-header">
                                                        <h3 class="box-title">Acciones para la convocatoria</h3>
                                                </div>
                                                <div class="box-body">
                                                            <div class="form-group">
                                                                    <button  class="btn btn-primary">ACTUALIZAR CONVOCATORIA </button>
                                                                    <a href="{{ route('admin.combocatorias.index')}}" class="btn btn-primary">ATRAS</a>
                                                                    
                                                            </div>
                                                        
                                                </div>        
                                        </div>
                                </div>
                        </div>
</form>
 



                

@endsection

@push('styles')


         <!-- Select2 -->
        <link rel="stylesheet" href="/adminlte/plugins/select2/select2.min.css">
          <!-- bootstrap datepicker -->
         <link rel="stylesheet" href="/adminlte/plugins/datepicker/datepicker3.css">
         
        



@endpush


@push('scripts')

            <!-- Select2 -->
            <script src="/adminlte/plugins/select2/select2.full.min.js"></script>
            <!-- bootstrap datepicker -->
            <script src="/adminlte/plugins/datepicker/bootstrap-datepicker.js"></script>
            
            
            <script>  
                    
                    $(".select2").select2();
                    $(".select4").select2();
                    //Date picker
                    $('#datepicker').datepicker({
                    startDate: 'today',
                    autoclose: true});

                    $('#datepicker2').datepicker({
                    startDate: 'today',
                    autoclose: true});
            
            </script>        
            <script>

                        $(document).ready(function(){
                            var i = 1;

                            $('#add').click(function () {
                                i++;
                                $('#dynamic_field').append('<tr id="row'+i+'">' +
                                                            '<td><input autocomplete="off" type="text" name="requisito[]" placeholder="Ingrese requisito" class="form-control name_list" /></td>' +
                                                            '<td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td>' +
                                                            '</tr>');
                            });
                            
                            $(document).on('click', '.btn_remove', function () {
                                var id = $(this).attr('id');
                            $('#row'+ id).remove();
                            });   
                        })

                        $(document).ready(function(){
                            var c = 1;

                            $('#add2').click(function () {
                                c++;
                                $('#dynamic_field2').append('<tr id="row2'+c+'">' +
                                                            '<td><input  autocomplete="off" type="text" name="documentos[]" placeholder="Ingrese documento" class="form-control name_list" /></td>' +
                                                            '<td><button type="button" name="remove" id2="'+c+'" class="btn btn-danger btn_remove">X</button></td>' +
                                                            '</tr>');
                            });
                            
                            $(document).on('click', '.btn_remove', function () {
                                var id2 = $(this).attr('id2');
                            $('#row2'+ id2).remove();
                            });   
                        })

                        $(document).ready(function(){
                            var d = 1;

                            $('#add3').click(function () {
                                d++;
                                $('#dynamic_field3').append('<tr id="row3'+d+'">' +
                                                            '<td> <label> Cantidad de auxiliares </label><input type="number"  name="cantidad_aux[]" class="form-control name_list" placeholder="ingresa el numero de auxiliares"></input> <label> Horas laborales </label><input type="number"  name="horas[]" class="form-control name_list" placeholder="ingresa las horas asignadas"></input><label> Destino   </label><input autocomplete="off" type="text" name="destino[]" class="form-control name list" placeholder="ingresa el destino del item"></input>' +
                                                            '<td><button type="button" name="remove" id3="'+d+'" class="btn btn-danger btn_remove">X</button></td>' +
                                                            '</tr>');
                            });
                            
                            $(document).on('click', '.btn_remove', function () {
                                var id3 = $(this).attr('id3');
                            $('#row3'+ id3).remove();
                            });   
                        })



                        $(document).ready(function(){
                            var i = 1;

                            $('#add4').click(function () {
                                i++;
                                $('#dynamic_field4').append('<tr id="row4'+i+'">' +
                                                            '<td><input autocomplete="off" type="text" name="requisito[]" placeholder="Ingrese requisito" class="form-control name_list" /></td>' +
                                                            '<td><button type="button" name="remove" id4="'+i+'" class="btn btn-danger btn_remove">X</button></td>' +
                                                            '</tr>');
                            });
                            
                            $(document).on('click', '.btn_remove', function () {
                                var id4 = $(this).attr('id4');
                            $('#row4'+ id4).remove();
                            });   
                        })


                        $(document).ready(function(){
                            var c = 1;

                            $('#add5').click(function () {
                                c++;
                                $('#dynamic_field5').append('<tr id="row5'+c+'">' +
                                                            '<td><input autocomplete="off" type="text" name="documentos[]" placeholder="Ingrese documento" class="form-control name_list" /></td>' +
                                                            '<td><button type="button" name="remove" id5="'+c+'" class="btn btn-danger btn_remove">X</button></td>' +
                                                            '</tr>');
                            });
                            
                            $(document).on('click', '.btn_remove', function () {
                                var id5 = $(this).attr('id5');
                            $('#row5'+ id5).remove();
                            });   
                        })


                        $(document).ready(function(){
                            var d = 1;

                            $('#add6').click(function () {
                                d++;
                                $('#dynamic_field6').append('<tr id="row6'+d+'">' +
                                                            '<td> <label> Cantidad de auxiliares  </label><input type="number"  name="cantidad_aux[]" class="form-control name_list" placeholder="ingresa el numero de auxiliares"></input> <label> Horas laborales  </label><input type="number"  name="horas[]" class="form-control name_list" placeholder="ingresa las horas asignadas"></input><label> Nombre de la Auxiliatura </label><input autocomplete="off" type="text" name="nombre[]" class="form-control name list" placeholder="ingresa el Nombre de la auxiliatura"></input><label> Codigo de la Auxiliatura </label><input autocomplete="off" type="text" name="codigo[]" class="form-control name list" placeholder="ingresa el codigo de la auxiliatura"></input>' +
                                                            '<td><button type="button" name="remove" id6="'+d+'" class="btn btn-danger btn_remove">X</button></td>' +
                                                            '</tr>');
                            });
                            
                            $(document).on('click', '.btn_remove', function () {
                                var id6 = $(this).attr('id6');
                            $('#row6'+ id6).remove();
                            });   
                        })
            </script>
           

@endpush





