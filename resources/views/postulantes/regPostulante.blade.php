@extends('plantilla')

@section('seccion')


       <form action="{{route('postulantes.crear',[$codigoS,$convocatoria])}}" method="POST">
         {{csrf_field()}}
      
         
          <!-- @if(session('flash'))
            <div class="aler alert-success">
               {{session('flash')}}
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
         @endif    -->
         <h3>{{$codigoS->nombre." ".$codigoS->apellidoP}}</h3>
         <br> 
        <div class="form-group">
            <h1>Area</h1> 
            <div class="form-group btn">              
            <h2>{{$convocatoria->area->nombre}}</h2>
            </div>
                               
         </div>
         <div class="form-group">
            <h4>Seleccione item</h4>
            <div class="form-group btn">
               <select name="items" class="form-control">
                    <option value="">Escoja el item</option>
                     @foreach ($convocatoria->items as $item)
                     <option value="{{$item->destino}}">{{$item->destino}}</option>
                     @endforeach 
               </select>
            </div>                       
         </div>
          <div class="form-group">
            <h4 class="">Documentos a presentar</h4> 
                <div class="">
                  @foreach($convocatoria->documentos as $documento)
                    <p class="" style="text-align: justify" name="documentos[]" value="{{$documento->id}}">{{$documento->detalle}}</p>
                  @endforeach
                  <h4><input type="checkbox" name="aceptar" value="1"> Acepta presentar todos los documentos</h4>
                </div>

          </div>
            <div class="form-group ">
            <input class="" type="number" name="num_Hojas">  N° de hojas a entregar
            </div>
            <div class="form-group">
               <a href="{{ url('/registroPost',$convocatoria) }}" class="btn btn-primary my-2 my-sm-0">Cancelar</a>
               <button class="btn btn-primary" type="submit"  onclick="return confirm('Esta seguro?')">Aceptar</button>
               <a href="#" class="btn btn-primary my-2 my-sm-0">Generar Rotulo</a>
            </div>
        </form>          

@endsection