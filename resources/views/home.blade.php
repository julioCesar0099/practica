<!DOCTYPE html>
<html lang="en">
<head>
  <title>Inicio</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">


    <link rel="stylesheet" href="css/normalize.css">
		<link rel="stylesheet" href="css/framework.css">
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/responsive.css">
		<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    
    
    <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
    
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
 
  <style>
    img {
      display: block;
      margin-left: auto;
      margin-right: auto;
    
    }
    
    .dos , .tres {
        
      object-fit: contain;   
      width: 35vw;
      height: 250px;   
    }
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
    .fecha{
      color: red;
    }
  </style>
</head>
<body>
      <nav class="navbar navbar-expand-sm bg-primary navbar-dark">
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
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
         @include('carrusel.carrusel')
      </div>

      

 
      <div class="container-fluid">
        <div class="row">
          <div class="col-8">
            @yield('content')
          </div>
          <div class="col">
            <div class="card col-12" style="width: 32rem ">
             <div class="card-body" style="height: 50rem ">
            @yield('contenido')
            </div>
          </div>
            
          </div>
          
          <div class="container"  >
            
                {{$convocatorias->render("pagination::bootstrap-4")}}
          </div>
          </div>

        </div>
      </div>

<div class="jumbotron text-center" style="margin-bottom:0">
  <p>2020@NeoSoft</p>
</div>

</body>
</html>
