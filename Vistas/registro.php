<!DOCTYPE html>
<html lang="es">

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

    <body>
        <div class="container-fluid">
            <?php include '../Recursos/header.php'; ?>

            <main class="row align-items-center justify-content-center">
                <!-- Default form register -->
                <form name="registro" class="text-center border border-light p-5 mt-5 align-self-center" action="../Controladores/controladorPrincipal.php" method="POST">
                    <h2 class=" mb-4 display-4">Crear cuenta</h2>
                    <input type="text" name="nombre" id="defaultRegisterFormFirstName" class="form-control mb-4" placeholder="Nombre">
                    <!-- E-mail -->
                    <input type="email" name="correo" id="defaultRegisterFormEmail" class="form-control mb-4" placeholder="E-mail">
                    <!-- Contraseña -->
                    <input type="password" name="pass" id="defaultRegisterFormPassword" class="form-control" placeholder="Contraseña"
                           aria-describedby="defaultRegisterFormPasswordHelpBlock">
                    <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
                        Al menos 8 caracteres y un dígito
                    </small>
                    <input type="password" name="repitePass" id="defaultRegisterFormPassword" class="form-control" placeholder="Repite la contraseña"
                           aria-describedby="defaultRegisterFormPasswordHelpBlock" name="pass">
                    <!-- Sign up button -->
                    <input type="submit" name="registro" value="Crear cuenta" class="btn btn-info my-4 btn-block">
                    <p>¿Ya tienes cuenta?
                        <a href="../index.php">Iniciar sesión</a>
                    </p>

                </form>
            </main>

            <?php include '../Recursos/footer.php'; ?>
        </div>
    </body>
</html>