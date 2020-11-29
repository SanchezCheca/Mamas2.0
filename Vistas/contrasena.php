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

        <!-- Mi CSS -->
        <link rel="stylesheet" href="../css/estilos.css">
        <link rel="stylesheet" href="../css/footerAbajo.css">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
              integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
                integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous"></script>

        <script src="https://www.google.com/recaptcha/api.js?render=6LdGnuoZAAAAAJ8DW3PDVk_1XBeLLqMYc41gNGPd"></script>
        <title>Mis aulas - Mamas 2.0</title>

        <!-- Recursos MDBootstrap -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/mdb.min.css">
        <link rel="stylesheet" href="../css/style.css">
        
        <title>Recuperar contraseña - Mamas 2.0</title>
    </head>
    <body style="height: 100%;">
        <?php include '../Recursos/header.php'; ?>
        <main class="row align-items-center justify-content-center">
            <!-- Default form login -->
            <form class="text-center border border-light p-5 mt-5 col-md-4 mx-auto" method="POST" action="../controladorRecuperar.php">
                <h2 class=" mb-4 display-4">Recuperar Contaseña</h2>
                <!-- Email -->
                <input type="email" id="defaultLoginFormEmail" class="form-control mb-4" name="email" placeholder="E-mail">
                <!-- Sign in button -->
                <button class="btn btn-info btn-block my-4" type="submit" name="contrasena">Cambiar contraseña</button>
                <p>
                    <a href="../index.php">Iniciar Sesión</a>
                </p>
            </form>
        </main>
       <?php include '../Recursos/footer.php'; ?>
    </body>
</html>
