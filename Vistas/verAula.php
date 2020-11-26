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

        <title>Mis aulas - Mamas 2.0</title>

    </head>
    <body>
        <?php include '../Recursos/header.php'; ?>
        <div class="container">
            <?php
            if (isset($_SESSION['aula'])) {
                $aula = $_SESSION['aula'];
                ?>
                <div class="row my-4">
                    <div class="col-12 d-flex justify-content-center">
                        <h3>Aula: <?php echo $aula->getNombre(); ?></h3>
                    </div>
                    <div class="col-12 d-flex justify-content-center">
                        <p>Profesor a cargo: <a href="verPerfil.php?perfil=<?php echo $aula->getIdProfesor(); ?>"><?php //Nombre del profesor ?></a></p>
                    </div>
                </div>
                <?php
            } else {
                $mensaje = 'Ha ocurrido algun error';
                $_SESSION['mensaje'] = $mensaje;
                header('Location: ../Vistas/aulas.php');
            }
            ?>
        </div>
        <?php include '../Recursos/footer.php'; ?>
    </body>
</html>
