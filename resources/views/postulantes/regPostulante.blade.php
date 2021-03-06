@extends('plantilla')

@section('seccion')

<div class="container-fluid">
       <form action="{{route('postulantes.crear',[$codigoS,$convocatoria])}}" method="POST">
         {{csrf_field()}}
      
         
          <!-- @if(session('mensaje'))
            <div class="aler alert-success">
               {{session('mensaje')}}
            </div>
         @endif -->

         @if($errors->any())
            <div class="alert alert-danger">
               <ul>
                  @foreach($errors->all() as $error)
                     <li>{{$error}}</li>
                   @endforeach
               </ul>      
            </div>
         @endif  

         
         <br>
         <br>
         <h5>{{$codigoS->nombre." ".$codigoS->apellidoP}}</h5>
         <br> 
        <div class="form-group">
            <div class="form-group btn">              
            <h5>Area: {{$convocatoria->area->nombre}}</h5>
            </div>
                               
         </div>
         <div class="form-group">
            <h5>Seleccione item</h5>
            <div class="form-group btn">
               <select name="items" class="form-control">
               
                    <option value="">Escoja el item</option>
                    @if($convocatoria ->tipo === 'Asignatura')
                        @foreach ($convocatoria->items as $item)
                           <option value="{{$item->destino}}">{{$item->destino}}</option>
                        @endforeach 
                     @else
                        @foreach ($convocatoria ->itemlabs as $item)
                           <option value="{{$item->nombre}}">{{$item->nombre}}</option>
                        @endforeach 
                     @endif
               </select>
            </div>                       
         </div>
          <div class="form-group">
            <h5 class="">Documentos a presentar</h5> 
                <div class="">
                <ul>
                  @foreach($convocatoria->documentos as $documento)
                   <li> <p class="" style="text-align: justify" name="documentos[]" value="{{$documento->id}}">{{$documento->detalle}}</p></li>
                  @endforeach
                  <h5><input type="checkbox" name="aceptar" value="1"> Acepta presentar todos los documentos</h5>
                <ul>
                </div>

          </div>
          
            <div class="form-group ">
            <input class="" type="number" name="num_Hojas">  N° de hojas a entregar
            </div>
            <p style="color:red;">*Primero presione ACEPTAR y Luego presione GENERAR ROTULO</p>
            <br><br>
            <div class="d-flex justify-content-center">
            <div class="form-group">
               <a href="{{ url('/registroPost',$convocatoria) }}" class="btn btn-primary my-2 my-sm-0">Cancelar</a>
               @if($i==1)
                  <button class="btn btn-primary" type="submit"  onclick="return confirm('¿Esta seguro?')">Aceptar</button>
                  <a href="{{ url ('/registroPost/generar/'.$codigoS->id,$convocatoria) }}" class="btn btn-primary my-2 my-sm-0 disabled" >Generar Rotulo</a>
               @else
                  <button class="btn btn-primary" type="submit"  onclick="return confirm('¿Esta seguro?')" disabled>Aceptar</button>
                  <a href="{{ url ('/registroPost/generar/'.$codigoS->id,$convocatoria) }}" class="btn btn-primary my-2 my-sm-0 " >Generar Rotulo</a>
               @endif
            </div>
            </div>
        </form>          
</div>
@endsection
