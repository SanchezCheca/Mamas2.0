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

    </head>

    <body onload="validacionRegistro()">
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
                <form class="text-center border border-light p-5 mt-5 align-self-center" action="../Controladores/controladorPrincipal.php" novalidate>

                    <h2 class=" mb-4 display-4">Registro</h2>

                    <div class="form-row mb-4">
                        <div class="col">
                            <!-- First name -->
                            <input type="text" id="nombre" class="form-control" name="nombre" pattern="^([A-Za-zÀ-ú]$"  placeholder="Nombre" required>
                            <div id="nombreError" >

                            </div>

                        </div>

                    </div>

                    <!-- E-mail -->
                    <input type="email" id="mail" class="form-control mb-4" name="correo" placeholder="E-mail" required>
                    <div id="mailError" >

                    </div>


                    <!-- Password -->
                    <input type="password" id="defaultRegisterFormPassword" class="form-control" name="pass" placeholder="Contraseña"
                           aria-describedby="defaultRegisterFormPasswordHelpBlock">
                    <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
                        8 caracteres y un digito
                    </small>


                    <!-- Sign up button -->
                    <button class="btn btn-info my-4 btn-block" type="submit" name="registro">Registrarse</button>




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
        <script src="../js/validacion.js"></script>
    </body>

</html>