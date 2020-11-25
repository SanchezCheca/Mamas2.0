<!DOCTYPE html>


<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Mi CSS -->
        <link rel="stylesheet" href="css/estilos.css">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
              integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
                integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous"></script>
        <title>Mis aulas - Mamas 2.0</title>

        <!-- Recursos MDBootstrap -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/mdb.min.css">
        <link rel="stylesheet" href="css/style.css">

        <script>


            grecaptcha.ready(function () {
                grecaptcha.execute('6LdGnuoZAAAAAJ8DW3PDVk_1XBeLLqMYc41gNGPd', {action: 'iniciosesion'}).then(function (token) {
                    var recaptchaResponse = document.getElementById('recaptchaResponse');
                    recaptchaResponse.value = token;
                });
            });

        </script>


        <title>Página principal</title>
    </head>
    <body style="height: 100%;" onload="validacion()">
        <div class="container-fluid">


            <?php include 'Recursos/header.php'; ?>

            <main class="row align-items-center justify-content-center">

                <!-- Default form login -->
                <form class="text-center border border-light p-5 mt-5 col-md-4 mx-auto" action="Controladores/controladorPrincipal.php" method="POST" novalidate>

                    <h2 class=" mb-4 display-4">Iniciar Sesión</h2>

                    <!-- Email -->
                    <input type="email" id="mail" class="form-control mb-4" name="correo" placeholder="E-mail" required>
                    <div id="mailError" >

                    </div>

                    <!-- Password -->
                    <input type="password" id="password" name="pass" class="form-control mb-4" placeholder="Password">

                    <!-- Sign in button -->
                    <button class="btn btn-info btn-block my-4" name="iniciosesion" type="submit">Iniciar Sesión</button>

                    <!-- Register -->
                    <p>¿No eres miembro?
                        <a href="Vistas/registro.php">Registrar</a>
                    </p>
                    <p>
                        <a href="Vistas/contrasena.php">¿Has olvidado tu contraseña?</a>
                    </p>

                    <!-- Social login -->

                    <input type="hidden" name="recaptcha_response" id="recaptchaResponse">
                </form>
                <!-- Default form login -->

            </main>


            <!-- Footer -->
            <?php include 'Recursos/footer.php'; ?>

            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
                    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
                    integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
            crossorigin="anonymous"></script>
            <script src="js/validacion.js"></script> 

            <!-- jQuery -->
            <script type="text/javascript" src="js/jquery.min.js"></script>
            <!-- Bootstrap tooltips -->
            <script type="text/javascript" src="js/popper.min.js"></script>
            <!-- Bootstrap core JavaScript -->
            <script type="text/javascript" src="js/bootstrap.min.js"></script>
            <!-- MDB core JavaScript -->
            <script type="text/javascript" src="js/mdb.min.js"></script>


        </div>
    </body>

</html>