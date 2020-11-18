<!DOCTYPE html>


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
        <?php include 'Recursos/header.php';?>
        
        
        <!-- CUERPO -->
        <main class="row align-items-center justify-content-center">
            <!-- Default form login -->
            <form class="text-center border border-light p-5 mt-5 col-md-4 mx-auto" action="#!">

                <h2 class=" mb-4 display-4">Iniciar sesión</h2>

                <!-- Email -->
                <input type="email" id="defaultLoginFormEmail" class="form-control mb-4" placeholder="E-mail">

                <!-- Password -->
                <input type="password" id="defaultLoginFormPassword" class="form-control mb-4" placeholder="Contraseña">

                <!-- Sign in button -->
                <button class="btn btn-info btn-block my-4" type="submit">Iniciar sesión</button>
                <!-- Register -->
                <p>¿No tienes cuenta?
                    <a href="registro.html">Registrarme</a>
                </p>

            </form>
        </main>

        <?php include 'Recursos/footer.php'; ?>
    </body>
</html>