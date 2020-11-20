<!DOCTYPE html>

<html lang="es">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Mi CSS -->
        <link rel="stylesheet" href="../css/estilos.css">

        <!-- JS necesario -->
        <script type="text/javascript" src="../js/aulas.js"></script>


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
    <body onload="cargar()">
        <div class="container">
            <?php include '../Recursos/header.php'; ?>

            <?php
            //Añade botón crearAula si se trata de un profesor
            if ($usuarioIniciado->getRol() >= 1) {
                //Hace una consulta a BD y guarda en la sesión un vec. asoc. con todos los alumnos disponibles para ser usado por el js
                require_once '../Auxiliar/AccesoADatos.php';
                $alumnos = AccesoADatos::getListaAlumnos();
                $listaAlumnos = json_decode($alumnos);
                ?>

                <!-- Caja para añadir alumnos --> 
                <div class="row justify-content-center" id="cajaGeneral">
                    <div class="col-sm-3"></div>
                    <div class="col-12 col-sm-6" id="cajaCrear">
                        <!-- Esta tabla permanecerá oculta hasta pulsar el boton "añadir alumnos" -->
                        <table class="table table-hover" id="tablaAlumnos">
                            <caption>Listado de alumnos</caption>
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Correo</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col"></th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($listaAlumnos as $o) {
                                    echo '<tr>';

                                    echo '<td>' . $o->id . '</td>';
                                    echo '<td>' . $o->correo . '</td>';
                                    echo '<td>' . $o->nombre . '</td>';
                                    echo '<td><div class="bg-info text-light d-flex justify-content-center rounded annadir">Añadir</div></td>';

                                    echo '</tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-sm-3"></div>

                    <!-- Formulario aceptar -->
                    <div class="col-12 d-flex justify-content-center py-2">
                        <form id="formularioAula" name="crearAula" action="../Controladores/controladorPrincipal.php" method="POST">

                            <input type="text" name="nombre" class="form-control" placeholder="Nombre del Aula">
                            <input type="submit" class="btn btn-success" name="crearAula" value="Crear Aula">
                        </form>
                    </div>

                    <!-- Boton añadir alumnos -->
                    <div class="col-12 d-flex justify-content-center py-2" id="botonAdd">
                        <button class="btn btn-info" id="anadirAlumnos">Añadir alumnos</button>
                    </div>

                </div>

                <!-- Boton nueva aula -->
                <div class="col-12 m-3 d-flex justify-content-center">
                    <button class="btn btn-primary" id="botonNueva">+ Nueva Aula</button>
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
