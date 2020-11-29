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

        <title>Aula - Mamas 2.0</title>

    </head>
    <body>
        <div class="container-fluid principal p-0 m-0">
            <?php include '../Recursos/header.php'; ?>
            <main class="row col-12 align-items-center justify-content-center p-4">
                <?php
                if (isset($_SESSION['aula'])) {
                    $aula = $_SESSION['aula'];
                    $alumnosAula = $_SESSION['alumnosAula'];
                    ?>
                    <div class="row my-4 border border-light p-4">
                        <?php
                        //Si el usuario iniciado es el profesor a cargo del aula da la opción de editarla
                        if ($usuarioIniciado->getRol() >= 1 && $aula->getIdProfesor() == $usuarioIniciado->getId()) {
                            ?>
                            <div class="col-md-3"></div>
                            <div class="col-10 col-md-6 d-flex justify-content-center">
                                <h1 class="h1-responsive"><?php echo $aula->getNombre(); ?></h1>
                            </div>
                            <div class="col-2 col-md-1">
                                <form name="botonEditar" action="../Controladores/controladorPrincipal.php" method="POST">
                                    <input type="hidden" name="idAula" value="<?php echo $aula->getId(); ?>">
                                    <input type="submit" class="btn btn-grey" name="irAEditarAula" value="Editar">
                                </form>
                            </div>
                            <div class="col-md-2"></div>
                            <?php
                        } else {
                            ?>
                            <div class="col-12 d-flex justify-content-center">
                                <h1 class="h1-responsive"><?php echo $aula->getNombre(); ?></h1>
                            </div>
                            <?php
                        }
                        ?>
                        <div class="col-12 d-flex justify-content-center">
                            <p class="lead">Profesor a cargo: <a href="perfil.php?idUsuario=<?php echo $aula->getIdProfesor(); ?>" target="blank"><?php echo $aula->getNombreProfesor(); ?></a></p>
                        </div>
                        <div class="col-12 mt-3 d-flex justify-content-center">
                            <h4 class="h4-responsive">Alumnos</h4>
                        </div>

                        <!-- Tabla de alumnos -->
                        <div class="col-md-3"></div>
                        <div class="col-12 col-md-6">
                            <table class="table table-hover" id="tablaAlumnos">
                                <caption>Listado de alumnos</caption>
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Correo</th>
                                        <th scope="col">ID</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($alumnosAula as $o) {
                                        echo '<tr>';

                                        echo '<td>' . $o->getNombre() . '</td>';
                                        echo '<td>' . $o->getCorreo() . '</td>';
                                        echo '<td>' . $o->getId() . '</td>';

                                        echo '</tr>';
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                    <?php
                } else {
                    $mensaje = 'Ha ocurrido algun error';
                    $_SESSION['mensaje'] = $mensaje;
                    header('Location: ../Vistas/aulas.php');
                }
                ?>
            </main>
            <?php include '../Recursos/footer.php'; ?>
        </div>

    </body>
</html>
