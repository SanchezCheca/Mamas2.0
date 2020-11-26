<!DOCTYPE html>
<html>
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

        <!-- JS necesario -->
        <script src="../js/editarAula.js"></script>
    </head>
    <body onload="cargar()">
        <?php include '../Recursos/header.php'; ?>
        <div class="container">
            <?php
            if (isset($_SESSION['aula'])) {
                $aula = $_SESSION['aula'];
                $alumnosAula = $_SESSION['alumnosAula'];
                ?>
                <div class="row my-4">
                    <?php
                    //El usuario iniciado tiene que ser el profesor a cargo del aula
                    if ($usuarioIniciado->getRol() >= 1 && $aula->getIdProfesor() == $usuarioIniciado->getId()) {
                        if (isset($_REQUEST['editar'])) {
                            $editando = true;
                            ?>
                            <div class="col-12 d-flex justify-content-center">
                                <h2 class="h2-responsive">Editar aula</h2>
                            </div>

                            <!-- Formulario -->
                            <div class="col-12 d-flex justify-content-center">
                                <form name="editarAula" id="formularioAula" action="../Controladores/controladorPrincipal.php" method="POST">
                                    <div class="row">
                                        <div class="col-md-3"></div>
                                        <div class="col-12 col-md-6 d-flex justify-content-center mb-5">
                                            <input type="submit" class="btn btn-success" name="editarAula" value="Guardar cambios">
                                            <input type="reset" class="btn btn-warning" value="Restablecer">
                                            <input type="submit" class="btn btn-danger" value="Eliminar aula">
                                        </div>
                                        <div class="col-md-3"></div>
                                        <div class="col-md-3"></div>
                                        <div class="col-12 col-md-6 d-flex justify-content-center mb-2">
                                            <input type="text" name="nombre" value="<?php echo $aula->getNombre(); ?>" class="form-control">
                                        </div>
                                        <div class="col-md-3"></div>
                                    </div>

                                </form>
                            </div>

                            <div class="col-12 mt-3 d-flex justify-content-center">
                                <h4 class="h4-responsive">Alumnos</h4>
                            </div>

                            <!-- Tabla de alumnos -->
                            <div class="col-md-3"></div>
                            <div class="col-12 col-md-6">
                                <table class="table table-hover" id="tablaAlumnosAula">
                                    <caption>Alumnos del aula</caption>
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Correo</th>
                                            <th scope="col">ID</th>
                                            <th scope="col"></th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($alumnosAula as $o) {
                                            echo '<tr>';

                                            echo '<td>' . $o->getNombre() . '</td>';
                                            echo '<td>' . $o->getCorreo() . '</td>';
                                            echo '<td>' . $o->getId() . '</td>';
                                            echo '<td><div class="bg-danger text-light d-flex justify-content-center rounded retirar">Retirar</div></td>';

                                            echo '</tr>';
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                <table class="table table-hover" id="tablaRetirados">
                                    <caption>Alumnos retirados</caption>
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Correo</th>
                                            <th scope="col">Nombre</th>
                                            <th scope="col"></th></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-center">
                                    <button class="btn btn-info" onclick="masAlumnos()">+ Añadir más alumnos</button>
                                </div>
                            </div>
                            <div class="col-md-3"></div>
                            <?php
                        } else {
                            $mensaje = 'Ha ocurrido algún error.';
                            $_SESSION['mensaje'] = $mensaje;
                            header('Location: aulas.php');
                        }
                    } else {
                        $mensaje = 'Permiso denegado.';
                        $_SESSION['mensaje'] = $mensaje;
                        header('Location: ../index.php');
                    }
                    ?>


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
