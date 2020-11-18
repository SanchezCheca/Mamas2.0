<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  
  <title>Página principal</title>
    <!-- MDB icon -->
  <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Google Fonts Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <!-- Material Design Bootstrap -->
  <link rel="stylesheet" href="../css/mdb.min.css">
  <!-- Your custom styles (optional) -->
  <link rel="stylesheet" href="../css/style.css">
 
</head>

<body>
  <div class="container-fluid">
    <header
      class="row align-items-center navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar bg-primary">
      <div class="container">
        <!-- Navbar -->


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
                <a class=" waves-effect  btn btn-primary" href="../index.php" target="_blank">Inicio</a>
            </li>
            <li class="nav-item">
                <a class=" waves-effect btn btn-primary " href="registro.php" target="_blank">Registro</a>
            </li>

          </ul>


        </div>




      </div>
    </header>

    <main class="row align-items-center justify-content-center">

      <!-- Default form register -->
      <form class="text-center border border-light p-5 mt-5 align-self-center" action="#!">

        <h2 class=" mb-4 display-4">Sign up</h2>

        <div class="form-row mb-4">
          <div class="col">
            <!-- First name -->
            <input type="text" id="defaultRegisterFormFirstName" class="form-control" placeholder="First name">
          </div>
          <div class="col">
            <!-- Last name -->
            <input type="text" id="defaultRegisterFormLastName" class="form-control" placeholder="Last name">
          </div>
        </div>

        <!-- E-mail -->
        <input type="email" id="defaultRegisterFormEmail" class="form-control mb-4" placeholder="E-mail">

        <!-- Password -->
        <input type="password" id="defaultRegisterFormPassword" class="form-control" placeholder="Password"
          aria-describedby="defaultRegisterFormPasswordHelpBlock">
        <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
          At least 8 characters and 1 digit
        </small>


        <!-- Sign up button -->
        <button class="btn btn-info my-4 btn-block" type="submit">Sign in</button>




      </form>
    </main>
    <!-- Default form register -->






    <!-- Footer -->

    <footer class=" row  bg-primary fixed-bottom ">
      <div class="container">
        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">© 2020 Copyright:
          <a href="" class="text-light"> Daniel y Néstor</a>
        </div>
        <!-- Copyright -->
      </div>
    </footer>
    <!-- Footer -->



  </div>
      <!-- jQuery -->
  <script type="text/javascript" src="../js/jquery.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="../js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="../js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="../js/mdb.min.js"></script>
  <!-- Your custom scripts (optional) -->
  <script type="text/javascript"></script>
</body>

</html>