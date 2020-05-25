@extends('admin.layout')

@section('header')
  <h1>
     Crear Nueva Convocatoria 
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li><a href="{{ route('admin.combocatorias.index') }}"><i class="fa fa-list"></i> Convocatorias</a></li>
    <li class="active"> crear convocatoria</li>
  </ol>
@endsection

@section('content')

<form  method="POST" action="{{ route('admin.combocatorias.store') }}">
{{ csrf_field() }}
                <div class="row">
                            <div class="col-md-6">
                                        <div class="box box-primary">
                                                <div class="box-header">
                                                    <h3 class="box-title">Crear una Convocatoria</h3>
                                                </div>
                                                <div class="box-body">
                                                        <div class="form-group {{ $errors->has('titulo') ? 'has-error' : '' }}">
                                                            <label> Titulo de la convocatoria</label>
                                                            <input name="titulo" class="form-control" placeholder="ingresa el titulo de la convocatoria">
                                                            {!! $errors->first('titulo','<span class=help-block>:message</span>') !!}
                                                        </div>
                                                        <div class="form-group {{ $errors->has('descripcion') ? 'has-error' : '' }} ">
                                                            <label> Descripcion de la convocatoria</label>
                                                            <input name="descripcion" class="form-control" placeholder="ingresa la descripcion de la convocatoria">
                                                            {!! $errors->first('descripcion','<span class=help-block>:message</span>') !!}
                                                        </div>
                                                                <div  class="form-group {{ $errors->has('tabla') ? 'has-error' : '' }}">
                                                                    <label> Tabla de calificacion de meritos </label>
                                                                    <select  name="tabla" class="form-control">
                                                                            <option value="1">tabla 1</option>
                                                                    </select>
                                                                    {!! $errors->first('tabla','<span class=help-block>:message</span>') !!}
                                                                </div>

                                                                <div class="form-group">
                                                                    <button href="#" class="btn btn-primary ">ver tabla</button>
                                                                    <button href="#" class="btn btn-primary ">añadir nueva tabla</button>
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
                                                                                <input name="fecha_fin" type="text" class="form-control pull-right" id="datepicker">
                                                                    </div>
                                                         </div>
                                                        <div class="form-group {{ $errors->has('facultad') ? 'has-error' : '' }}">
                                                            <label> Facultad </label>
                                                            <select name="facultad" class="form-control">
                                                                @foreach($facultades as $facultad)
                                                                            <option value="{{ $facultad->id }}">{{ $facultad->nombre}}</option>
                                                                @endforeach
                                                            </select>
                                                            {!! $errors->first('facultad','<span class=help-block>:message</span>') !!}
                                                        </div>
                                                        <div class="form-group {{ $errors->has('area') ? 'has-error' : '' }}">
                                                            <label> Area </label>
                                                            <select name="area" class="form-control">
                                                                @foreach($areas as $area)
                                                                            <option value="{{ $area->id }}">{{ $area->nombre}}</option>
                                                                @endforeach
                                                            </select>
                                                            {!! $errors->first('area','<span class=help-block>:message</span>') !!}
                                                        </div>
                                                        <div class="form-group {{ $errors->has('carreras') ? 'has-error' : '' }}">
                                                            <label> Carreras </label>
                                                            <select  name="carreras[]" class="form-control select2" multiple="multiple" data-placeholder="Selecciona una o mas carreras" style="width: 100%;">
                                                                @foreach($carreras as $carrera )
                                                                    <option value="{{ $carrera->id }}">{{ $carrera->nombre }}</option>
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
                                                                    <tr>
                                                                        <td><input type="text" name="requisito[]" placeholder="Ingrese requisito" class="form-control name_list" /></td>
                                                                        <td><button type="button" name="add" id="add" class="btn btn-primary">Añadir requisito </button></td>
                                                                    </tr>
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
                                                                    <tr>
                                                                        <td><input type="text" name="documentos[]" placeholder="Ingrese Documento" class="form-control name_list" /></td>
                                                                        <td><button type="button" name="add" id="add2" class="btn btn-primary">Añadir Documento </button></td>
                                                                    </tr>
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
                                                    <table class="table table-bordered" id="dynamic_field3">
                                                        <tr>
                                                            <td>
                                                            <label> Cantidad de auxiliares : Item </label>
                                                            <input type="number"  name="cantidad_aux[]" class="form-control name_list" placeholder="ingresa el numero de auxiliares"></input>
                                                            <label> Horas laborales : Item </label>
                                                            <input type="number"  name="horas[]" class="form-control name_list" placeholder="ingresa las horas asignadas"></input>
                                                            <label> Destino : Item </label>
                                                            <input  type="text" name="destino[]" class="form-control name list" placeholder="ingresa el destino del item"></input>
                                                            </td>
                                                            <td><button type="button" name="add" id="add3" class="btn btn-primary">Añadir Item</button></td>
                                                        </tr>
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
                                                            <button type="submit" class="btn btn-primary">CREAR CONVOCATORIA </button>
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
                    //Date picker
                    $('#datepicker').datepicker({
                    autoclose: true
            });
            
            </script>

            <script>
                $(document).ready(function(){
                    var i = 1;

                    $('#add').click(function () {
                        i++;
                        $('#dynamic_field').append('<tr id="row'+i+'">' +
                                                    '<td><input type="text" name="requisito[]" placeholder="Ingrese requisito" class="form-control name_list" /></td>' +
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
                                                    '<td><input type="text" name="documentos[]" placeholder="Ingrese documento" class="form-control name_list" /></td>' +
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
                                                    '<td> <label> Cantidad de auxiliares : Item  </label><input type="number"  name="cantidad_aux[]" class="form-control name_list" placeholder="ingresa el numero de auxiliares"></input> <label> Horas laborales : Item </label><input type="number"  name="horas[]" class="form-control name_list" placeholder="ingresa las horas asignadas"></input><label> Destino : Item  </label><input  type="text" name="destino[]" class="form-control name list" placeholder="ingresa el destino del item"></input>' +
                                                    '<td><button type="button" name="remove" id3="'+d+'" class="btn btn-danger btn_remove">X</button></td>' +
                                                    '</tr>');
                    });
                    
                    $(document).on('click', '.btn_remove', function () {
                        var id3 = $(this).attr('id3');
                    $('#row3'+ id3).remove();
                    });   
                })
            </script>

@endpush





