x<!DOCTYPE html>


<html lang="es">
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
        <title>Página principal</title>
    </head>
    <body style="height: 100%;">
        <?php include 'Recursos/header.php'; ?>

        <?php
        //---------DA LA OPCIÓN DE INICIAR SESIÓN SI NO LO HA HECHO
        if (isset($usuarioIniciado)) {
            ?>
        <div class="row mt-5"></div>
        <div class="row my-4">
            <div class="col-12 d-flex justify-content-center">
                <h4>Hola, <?php echo $usuarioIniciado->getNombre(); ?></h4>
            </div>
        </div>
        <?php
        } else {
            ?>
            <!-- CUERPO -->
            <div class="row mt-5"></div>
            <div class="col-12 mt-3 p-3 d-flex justify-content-center">
                <h4>¡Hola! Tienes que iniciar sesión para acceder</h4>
            </div>
            <main class="row align-items-center justify-content-center">

                <!-- login -->
                <form class="text-center border border-light col-md-4 mx-auto" action="Controladores/controladorPrincipal.php" method="POST">

                    <h2 class="mb-4 display-4">Iniciar sesión</h2>

                    <!-- Email -->
                    <input type="email" name="correo" id="defaultLoginFormEmail" class="form-control mb-4" placeholder="E-mail">

                    <!-- Password -->
                    <input type="password" name="pass" id="defaultLoginFormPassword" class="form-control mb-4" placeholder="Contraseña">

                    <!-- Sign in button -->
                    <input type="submit" name="inicioSesion" class="btn btn-info btn-block my-4" value="Iniciar sesión">
                    <!-- Register -->
                    <p>¿No tienes cuenta?
                        <a href="Vistas/registro.php">Registrarme</a>
                    </p>

                </form>
            </main>
            <?php
        }
        ?>

        <?php include 'Recursos/footer.php'; ?>
    </body>
</html>