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

        <!-- Recursos MDBootstrap -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/mdb.min.css">
        <link rel="stylesheet" href="../css/style.css">

        <title>Mis aulas - Mamas 2.0</title>

    </head>
    <body>
        <div class="container-fluid principal p-0 m-0">
            <?php include '../Recursos/header.php'; ?>
            <main class="row col-12 align-items-center justify-content-center p-4">
                <?php
                //Añade botón crearAula si se trata de un profesor
                if ($usuarioIniciado->getRol() >= 1) {
                    ?>
                    <!-- Boton nueva aula -->

                    <div class="col-12 m-1 d-flex justify-content-center">
                        <form name="irACrearAula" action="../Controladores/controladorPrincipal.php" method="POST">
                            <input type="submit" class="btn btn-primary" name="irACrearAula" value="+ Nueva Aula">
                        </form>
                    </div>
                    <?php
                }
                ?>

                <!-- Lista de aulas -->
                <?php
                //Se pintan las aulas a las que pertenece el alumno/profesor
                if ($usuarioIniciado->getAulas() == null) {
                    ?>
                    <div class="col-12 my-3 d-flex justify-content-center">
                        <p>No hay aulas que mostrar.</p>
                    </div>
                    <?php
                } else {
                    foreach ($usuarioIniciado->getAulas() as $aula) {
                        ?>
                        <div class="col-12 col-sm-6 bg-warning rounded p-2 my-2">
                            <h4><?php echo $aula->getNombre(); ?></h4>
                            <p>Profesor: <?php echo $aula->getNombreProfesor(); ?></p>
                            <form name="verAula" action="../Controladores/controladorPrincipal.php" method="POST">
                                <input type="hidden" name="idAula" value="<?php echo $aula->getId(); ?>">
                                <input type="submit" class="btn secondary-color-dark" name="verAula" value="Ver">
                            </form>
                        </div>
                        <?php
                    }
                }
                ?>
            </main>
            <?php include '../Recursos/footer.php'; ?>
        </div>

    </body>
</html>
