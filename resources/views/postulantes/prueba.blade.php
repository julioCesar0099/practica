<h1>{{$convocatoria->area->nombre}}</h1>
<h1>{{$codigoS}}</h1>
@foreach($convocatoria->items as $item)
<h1>{{$item->destino}}</h1>
@endforeach

