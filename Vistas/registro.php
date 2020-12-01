<!DOCTYPE html>
<html lang="es">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Mi CSS -->
        <link rel="stylesheet" href="../css/estilos.css">

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
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/mdb.min.css">
        <link rel="stylesheet" href="../css/style.css">
        
        <script src="https://www.google.com/recaptcha/api.js?render=6LdGnuoZAAAAAJ8DW3PDVk_1XBeLLqMYc41gNGPd"></script>
        
        <script>
            grecaptcha.ready(function () {
                grecaptcha.execute('6LdGnuoZAAAAAJ8DW3PDVk_1XBeLLqMYc41gNGPd', {action: 'registro'}).then(function (token) {
                    var recaptchaResponse = document.getElementById('recaptchaResponse');
                    recaptchaResponse.value = token;
                });
            });
        </script>
        <title>Registro</title>
    </head>
    <body onload="validacionRegistro()">
        <div class="container-fluid principal p-0 m-0">
            <?php include '../Recursos/header.php'; ?>
            <main class="row col-12 align-items-center justify-content-center p-4">

                <!-- Default form register -->
                <form id="registro" class="text-center border border-light p-5 mt-5 align-self-center" action="../Controladores/controladorPrincipal.php" method="POST" novalidate>

                    <h2 class=" mb-4 display-4">Registrarse</h2>

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


                    <input type="hidden" name="recaptcha_response" id="recaptchaResponse">

                </form>
            </main>
            <?php include '../Recursos/footer.php'; ?>
        </div>
        
        <script src="../js/validacion.js"></script>
    </body>
</html>