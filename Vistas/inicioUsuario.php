<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
            integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
            crossorigin="anonymous"></script>
        <title>Página principal</title>
        <link rel="stylesheet" href="estilos.css">
   </head>
<body style="min-height: 100%;">
    <div class="container">
        <header class="row align-items-center navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar bg-primary ">

            <!-- Navbar -->
            
              <div class="container">
        
                <!-- Brand -->
              
                  <h2>Mamás2.0</h2>
               
        
                <!-- Collapse -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                  aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
        
                <!-- Links -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
        
                  <!-- Left -->
                  <ul class="navbar-nav mr-auto ml-5 ">
                    <li class="nav-item ">
                      <a class=" waves-effect  btn btn-primary" href="Inicio.html" target="_blank">Inicio</a>
                    </li>
                    <li class="nav-item">
                      <a class=" waves-effect btn btn-primary " href="" target="_blank">Mis aulas</a>
                    </li>
                    <li class="nav-item">
                        <a class=" waves-effect btn btn-primary " href="" target="_blank">Examenes</a>
                      </li>
                      <li class="nav-item dropdown">
                        <a class=" dropdown-toggle btn btn-primary" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Filtrar</a>
                        <div class="dropdown-menu " >
                          <a class="dropdown-item text-primary" href="#">Todos</a>
                          <a class="dropdown-item text-primary" href="#">En Curso</a>
                          <a class="dropdown-item text-primary" href="#">Realizados</a>
                        </div>
                      </li>
                    
                  </ul>
         
        
                </div>
        
              </div>
           
          
            
        
          </header>

          <main class="row mt-5 bg-primary">
            
            <div class="container">
            <div class="card mt-5">
              <div class="card-header  ">
                <h4 class="float-left">Examen 1 JSP</h4>
                <input class="float-right " type="text" id="id" readonly> 
              </div>
              <div class="card-body">
              
                <p class="card-text">Fecha inicio:  <input type="text" id="fi" readonly> </p> 
                <p class="card-text">Fecha de entrega: <input type="text" id="ff" readonly> </p>
                <a href="#!" class="btn btn-primary">Resolver</a>
              </div>
            </div>
         

            <div class="card mt-5 ">
              <div class="card-header  ">
                <h4 class="float-left">Examen 2 HTML</h4>
                <input class="float-right " type="text" id="cerrado" readonly> 
              </div>
              <div class="card-body ">
              
                <p class="card-text">Fecha inicio:  <input type="text" id="fini" readonly> </p> 
                <p class="card-text">Fecha de entrega: <input type="text" id="ffi" readonly> </p>
                <a href="#!" class="btn btn-primary">Ver Corrección</a>
              </div>
            </div>
          </div>
          </main>

    </div>
</body>
</html>