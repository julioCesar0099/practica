@extends('plantilla')

@section('seccion')


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de postulacion</title>
</head>
    <body>
       <form action="{{route('postulantes.crear')}}" method="POST">
         {{csrf_field()}}
         <input type="hidden" name="id_est" value="{{$codigoS->id}}">

         @if(session('mensaje'))
            <div class="aler alert-success">
               {{session('mensaje')}}
            </div>
         @endif

         @if($errors->any())
            <div class="alert alert-danger">
               <ul>
                  @foreach($errors->all() as $error)
                     <li>{{$error}}</li>
                   @endforeach
               </ul>      
            </div>
         @endif  
         <h4>{{$codigoS->nombre." ".$codigoS->apellidoP}}</h4>
        <div class="form-group">
            <h4 class="mt-4">Seleccione Area</h4>
             <div class="form-group btn">
                    <select name="areas" id="inputAreas_id" value="" class="form-control">
                    <option value="">Escoja el area</option>
                     @foreach ($areas as $area)
                     <option value="{{$area->nombre}}">{{$area['nombre']}}</option>
                     @endforeach ()
                     </select>
                </div>           
         </div>
         <div class="form-group">
            <h4 class="">Seleccione item</h4>
            <div class="form-group btn">
                    <select name="items" id="inputItems_id" value="" class="form-control">
                    <option value="">Escoja el item</option>
                     @foreach ($items as $item)
                     <option value="{{$item->nombre}}">{{$item['nombre']}}</option>
                     @endforeach ()
                     </select>
            </div>           
          </div>
          <div class="form-group">
            <h4 class="">Documentos a presentar (obligatorio)</h4> 
                <div class="checkbox">
                    <input type="checkbox" id="check1" name="documento_1" value="1"> Certificado de condicion de estudiante expedido
                </div>
                <div class="checkbox">
                    <input type="checkbox" id="check2" name="documento_2" value="2"> Kardex Actualizado
                 </div>
                 <div class="checkbox">
                    <input type="checkbox" id="check3" name="documento_3" value="3"> Fotocopia de carnet de identidad
                 </div>
                 <div class="checkbox">
                    <input type="checkbox"  id="check4" name="documento_4" value="4"> Certificado expedido por la biblioteca de la Fcyt
                 </div>
                 <div class="checkbox">
                    <input type="checkbox" id="check5" name="documento_5" value="5"> Curriculum vitae
                 </div>
                 <div class="checkbox">
                    <input type="checkbox" id="check6"name="documento_6" value="6"> Documentacion que respalde el curriculum
                 </div>
                 <div class="checkbox">
                    <input type="checkbox" id="check7" name="documento_7" value="7"> Documentacion (sobre manila)
                 </div>        
          </div>
            <div class="form-group ">
            <input class="" type="number" id="numHojas" name="num_Hojas">  N° de hojas a entregar
            </div>
            <div class="form-group">
               <a href="{{ url('/registroPost') }}" class="btn btn-primary my-2 my-sm-0">Cancelar</a>
               <button class="btn btn-primary" type="submit" id="acept" name="aceptar" onclick="return confirm('Esta seguro?')">Aceptar</button>
               <a href="#" class="btn btn-primary my-2 my-sm-0">Generar Rotulo</a>
            </div>
        </form>          
    </body>
</html>

@endsection