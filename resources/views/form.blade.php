<!DOCTYPE html>
<html>
 <head>
 <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ayudo</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <!-- Styles -->
  <style>
      
      .bg-primary {
      background-color: #164488!important;
      }
      .btn-outline-danger {
        color: #fff;
        border-color: #fff;
      }
      .btn-info {
      color: #fff;
      background-color: #164488;
      border-color: #164488;
      }
      a {
        color: #164488;
        text-decoration: none;
        background-color: transparent;
    }
  </style>
 </head>
 <body>
 <nav class="navbar navbar-expand-lg bg-primary navbar-dark">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="navbar-brand" href="{{ url('/') }}">
            <!--img src="../public/images/Logo_NeoSoft.png" width="30" height="30" class="d-inline-block align-top" -->
            Inicio
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/ayuda') }}">Ayuda</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('http://www.umss.edu.bo/') }}">UMSS</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('http://www.fcyt.umss.edu.bo/') }}">FCYT</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('http://websis.umss.edu.bo/') }}">WEBSIS</a>
      </li>
      
    </ul>
        <a href="{{ url('/login') }}" class="btn btn-outline-danger my-2 my-sm-0">Iniciar Sesion</a>
        
    </div>
</nav>

<div class="jumbotron text-center">
  <h1 class="display-4">{{ $title }}</h1>
    <p class = "lead">Explora la comunidad de ayuda para obtener más información</p> 
</div>
<div class="container p-3 my-3 border">   
<div class="container mt-3">
    <h2 class="font-weight-light" >Articulos:</h2>
    <div id="accordion">
    <div class="card">
      <div class="card-header">
        <a class="card-link" data-toggle="collapse" href="#collapseOne">
        {{ $articulos[0] }}
        </a>
      </div>
      <div id="collapseOne" class="collapse" data-parent="#accordion">
        <div class="card-body">
        Los estudiantes deberán registrar su postulación a través del portal web , dentro del plazo establecido en el cronograma de la convocatoria, siendo la inscripción virtual un requisito indispensable para ser considerado en el proceso de selección.
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header">
        <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
        {{ $articulos[1] }}
      </a>
      </div>
      <div id="collapseTwo" class="collapse" data-parent="#accordion">
        <div class="card-body">
          Veras boton "Postular" en Inicio, ingresa a tu CodSIS, llenas a la formulario de Registro de Postulante y finalizar boton "Generar Rotulo"
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header">
        <a class="collapsed card-link" data-toggle="collapse" href="#collapseThree">
        {{ $articulos[2] }}
        </a>
      </div>
      <div id="collapseThree" class="collapse" data-parent="#accordion">
        <div class="card-body">
          Después de completar examen evaluadas en un curso, tu nota se mostrará en la pestaña de Progreso.Ahí verás una lista de todas las notas.
        </div>
      </div>
    </div>
  </div>
</div>
</div> 

<!-- REPORTE-->
<div class="container p-3 my-3 border">
<div class="container mt-3">
    @if ($message = Session::get('success'))
   <div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
      <strong>{{ $message }}</strong>
   </div>
   @endif
   <h1 style="text-align:center;"> <tutofox/> </h1>
   <h2 class="font-weight-light">Reporte:</h3>
   @if (count($errors) > 0)
    <div class="alert alert-danger">
     <button type="button" class="close" data-dismiss="alert">×</button>
     <ul>
      @foreach ($errors->all() as $error)
       <li>{{ $error }}</li>
      @endforeach
     </ul>
    </div>
   @endif
   
   <form method="post" action="{{url('send')}}">
    {{ csrf_field() }}
    
    <div class="form-group">
     <label>Comentario:</label>
     <textarea name="message" rows="5" class="form-control" required></textarea>
    </div>
    <div class="form-group">
     <input type="submit" name="send" class="btn btn-info" value="Enviar" />
    </div>
   </form>

  </div>
  </div>
 </body>
</html>