<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
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
    <body style="height: 100%;">
        <main class="row align-items-center justify-content-center">

            <!-- Default form login -->
            <form class="text-center border border-light p-5 mt-5 col-md-4 mx-auto" method="POST" action="../controladorRecuperar.php">

                <h2 class=" mb-4 display-4">Recuperar Contaseña</h2>

                <!-- Email -->
                <input type="email" id="defaultLoginFormEmail" class="form-control mb-4" name="email" placeholder="E-mail">




                <!-- Sign in button -->
                <button class="btn btn-info btn-block my-4" type="submit" name="contrasena">Cambiar contraseña</button>

                <?php
                session_start();
                if (isset($_SESSION['mensaje'])) {
                    echo $_SESSION['mensaje'];
                    unset ($_SESSION['mensaje']);
                }
                ?>

                <p>
                    <a href="../index.php">Iniciar Sesión</a>
                </p>


                <!-- Social login -->


            </form>
            <!-- Default form login -->

        </main>
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
    </body>
</html>
