<!DOCTYPE html>

<html>
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Mi CSS -->
        <link rel="stylesheet" href="../css/estilos.css">
        
        <!-- JS necesario -->
        <script src="../js/aulas.js"></script>

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
    </head>
    <body>
        <div class="container">
            <?php include '../Recursos/header.php'; ?>

            <?php
            //Añade botón crearAula si se trata de un profesor
            
            //Hace una consulta a BD y guarda en la sesión un vec. asoc. con todos los alumnos disponibles para ser usado por el js
            require_once '../Auxiliar/AccesoADatos.php';
            $alumnos = AccesoADatos::getListaAlumnos();
            $_SESSION['alumnos'] = $alumnos;
            echo $alumnos;
            
            if ($usuarioIniciado->getRol() >= 1) {
                ?>
                <div class="row">
                    <div class="col-12 m-3 d-flex justify-content-center">
                        <button onclick="nuevaAula()" class="btn btn-primary" id="botonNueva">+ Nueva Aula</button>
                    </div>
                </div>
                <?php
            }
            ?>

            <!-- Lista de aulas -->
            <div class="row">
                <?php
                //Se pintan las aulas a las que pertenece el alumno/profesor
                if ($usuarioIniciado->getAulas() == null) {
                    ?>
                    <div class="col-12 d-flex justify-content-center">
                        <p>No hay aulas que mostrar.</p>
                    </div>
                    <?php
                } else {
                    foreach ($usuarioIniciado->getAulas() as $aula) {
                        ?>
                        <div class="col-12 bg-warning rounded p-2">
                            <h4><?php echo $aula->getNombre(); ?></h4>
                            <p>Id del profesor a cargo: <?php echo $aula->getIdProfesor(); ?></p>
                            <form name="verAula" action="../Controladores/controladorPrincipal" method="POST">
                                <input type="hidden" name="idAula" value="<?php echo $aula->getId(); ?>">
                                <input type="submit" class="btn btn-secondary" name="verAula" value="Ver aula">
                            </form>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>

            <?php include '../Recursos/footer.php'; ?>
        </div>
    </body>
</html>
