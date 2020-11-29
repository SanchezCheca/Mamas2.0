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

        <!-- Recursos MDBootstrap -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/mdb.min.css">
        <link rel="stylesheet" href="../css/style.css">

        <title>Editar aula - Mamas 2.0</title>

        <!-- JS necesario -->
        <script src="../js/editarAula.js"></script>
    </head>
    <body onload="cargar()">
        <div class="container-fluid principal p-0 m-0">
            <?php include '../Recursos/header.php'; ?>
            <main class="row col-12 align-items-center justify-content-center p-4">
                <?php
                //Viene del boton 'EDITAR' de la vista 'verAula.php'
                if (isset($_SESSION['todosAlumnosExceptoAula'])) {
                    $aula = $_SESSION['aula'];
                    $alumnosAula = $_SESSION['alumnosAula'];
                    $todosAlumnosExceptoAula = $_SESSION['todosAlumnosExceptoAula'];
                    ?>
                    <div class="row my-4 border border-light p-4">

                        <?php
                        //El usuario iniciado tiene que ser el profesor a cargo del aula
                        if ($usuarioIniciado->getRol() >= 1 && $aula->getIdProfesor() == $usuarioIniciado->getId()) {
                            ?>
                            <!-- Formulario -->
                            <div class="col-12 d-flex justify-content-center">
                                <form name="editarAula" id="formularioAula" action="../Controladores/controladorPrincipal.php" method="POST">
                                    <input type="hidden" name="idAula" value="<?php echo $aula->getId(); ?>">
                                    <div class="row">
                                        <!-- Botones de control -->
                                        <div class="col-md-3"></div>
                                        <div class="col-12 col-md-6 d-flex justify-content-center mb-5" id="contenedorFormulario">
                                            <input type="submit" class="btn btn-success" name="editarAula" value="Guardar cambios">
                                            <input type="submit" class="btn btn-warning" name="cancelarEdicionAula" value="Cancelar">
                                            <button id="eliminarAula" class="btn btn-danger">Eliminar Aula</button>
                                            <div class="row" id="estamosSeguros">
                                                <div class="col-6">
                                                    <input type="submit" name="eliminarAula" class="btn btn-danger" value="SI">
                                                </div>
                                                <div class="col-6">
                                                    <button id="noEstoySeguro" class="btn btn-primary">NO</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3"></div>

                                        <!-- Texto Titulo -->
                                        <div class="col-md-3"></div>
                                        <div class="col-12 col-md-6 d-flex justify-content-center mb-2">
                                            <h4 class="h4-responsive">Nombre</h4>
                                        </div>
                                        <div class="col-md-3"></div>

                                        <!-- Input del nombre del aula -->
                                        <div class="col-md-3"></div>
                                        <div class="col-12 col-md-6 d-flex justify-content-center mb-2">
                                            <input type="text" name="nombre" value="<?php echo $aula->getNombre(); ?>" class="form-control">
                                        </div>
                                        <div class="col-md-3"></div>
                                    </div>

                                </form>
                            </div>

                            <div class="col-12 mt-3 d-flex justify-content-center">
                                <h4 class="h4-responsive">Alumnos del aula</h4>
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
                                <h4 class="h4-responsive text-center" id="tituloAlumnos">Añadir alumnos</h4>
                                <div id="cajaTablaAlumnos">
                                    <table class="table table-hover" id="tablaAlumnos">
                                        <caption>Todos los alumnos</caption>
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
                                            foreach ($todosAlumnosExceptoAula as $o) {
                                                echo '<tr>';

                                                echo '<td>' . $o->getNombre() . '</td>';
                                                echo '<td>' . $o->getCorreo() . '</td>';
                                                echo '<td>' . $o->getId() . '</td>';
                                                echo '<td><div class="bg-success text-light d-flex justify-content-center rounded annadir">Añadir</div></td>';

                                                echo '</tr>';
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="d-flex justify-content-center">
                                    <button class="btn btn-info" id="botonAdd">+ Añadir más alumnos</button>
                                </div>
                            </div>
                            <div class="col-md-3"></div>
                            <?php
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
            </main>
            <?php include '../Recursos/footer.php'; ?>    
        </div>

    </body>
</html>
