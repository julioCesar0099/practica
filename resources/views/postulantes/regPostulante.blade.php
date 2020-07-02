@extends('plantilla')

@section('seccion')


       <form action="{{route('postulantes.crear',[$codigoS,$convocatoria])}}" method="POST">
         {{csrf_field()}}
      
         
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
            <h4 class="">Documentos a presentar (obligatorio)</h4> 
                <div class="checkbox">
                  @foreach($convocatoria->documentos as $documento)
                    <input class="btn-block" type="checkbox" id="check1" name="documentos[]" value="{{$documento->id}}">{{$documento->detalle}}
                  @endforeach
                </div>

          </div>
            <div class="form-group ">
            <input class="" type="number" id="numHojas" name="num_Hojas">  N° de hojas a entregar
            </div>
            <div class="form-group">
               <a href="{{ url('/registroPost',$convocatoria) }}" class="btn btn-primary my-2 my-sm-0">Cancelar</a>
               <button class="btn btn-primary" type="submit" id="acept" name="aceptar" onclick="return confirm('Esta seguro?')">Aceptar</button>
               <a href="{{ url ('/registroPost/generar/'.$convocatoria->id) }}" class="btn btn-primary my-2 my-sm-0">Generar Rotulo</a>
            </div>
        </form>          

@endsection