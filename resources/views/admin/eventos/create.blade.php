@extends('admin.layout')



@section('header')
  <h1>
    Convocatoria
    <small>Creacion de nuevo evento</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li class="active">convocatoria</li>
  </ol>
  
@endsection

@section('content')

        <form  method="POST" action="{{url('/admin/eventos/guardar/'.$combocatoria->id)}}">
        {{ csrf_field() }}
            <div class="col-md-8 col-md-offset-2">
                 <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Nuevos eventos</h3>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dynamic_field2">
                                <tr>
                                    <td>
                                        <label>detalle</label>
                                        <input autocomplete="off" class="form-control" type="text" name="detalle" id="detalle" value="" Placeholder="ingresar detalle del evento">
                                        {!! $errors->first('detalle','<div class="invalid-feedback alert alert-danger">:message</div>')!!}
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <label>Ingresar fechas entre:</label>
                                                <label>{{$combocatoria->fecha_inicio->format('d - M - Y')}}</label>
                                                <label> y </label>
                                                <label>{{$combocatoria->fecha_fin->format('d - M - Y')}}</label>
                                                
                                                <div class="input-group date">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                    </div>
                                                    
                                                    <input autocomplete="off" name="fecha" type="text" class="form-control pull-right" id="0" Placeholder="ingresar la fecha del evento">
                                                    {!! $errors->first('fecha','<div class="invalid-feedback alert alert-danger">:message</div>')!!}
                                                </div>
                                            </div>
                                        </td>
                                    <td>
                                </tr>
                            </table>
                        </div>
                        <div class="form-group col-md-offset-5">
                        <a href="{{url('/admin/eventos/'.$combocatoria->id)}}"  class="btn btn-primary" ><i class="">Atras</i></a>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </div>     
                </div>
            </div>
        </form>
        
@endsection

@push('scripts')
            
            <!-- Select2 -->
            <script src="/adminlte/plugins/select2/select2.full.min.js"></script>
            <!-- bootstrap datepicker -->
            <script src="/adminlte/plugins/datepicker/bootstrap-datepicker.js"></script>
            
            
            <script>  
                    
                    $(".select2").select2();
                    $(".select4").select2();
                    //Date picker
                    $('#0').datepicker({

                    
                    autoclose: true});




                    $('#1').datepicker({
                    startDate: 'today',
                    autoclose: true});

                    $('#2').datepicker({
                    startDate: 'today',
                    autoclose: true});
                    $('#3').datepicker({
                    startDate: 'today',
                    autoclose: true});
                    $('#4').datepicker({
                    startDate: 'today',
                    autoclose: true});
                    $('#5').datepicker({
                    startDate: 'today',
                    autoclose: true});
            
            </script>        
            <script>

                        $(document).ready(function(){
                            var c = 1;

                            $('#add2').click(function () {
                                c++;
                                $('#dynamic_field2').append('<tr id="row2'+c+'">' +
                                                            '<td><label>detalle</label><input  autocomplete="off" type="text" name="eventos[]" placeholder="Ingrese detalle de eventos" class="form-control name_list" /></td>' +
                                                            '<td><label>detalle</label><div class="input-group date"><div class="input-group-addon"><i class="fa fa-calendar"></i></div><input autocomplete="off" name="fecha" type="text" class="form-control pull-right" id="'+c+'"></div>' +
                                                            '<td><div><label>eliminar</div></label><button type="button" name="remove" id2="'+c+'" class="btn btn-danger btn_remove">X</button></td>' +
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