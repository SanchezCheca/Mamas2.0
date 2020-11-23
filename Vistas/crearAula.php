<!DOCTYPE html>
<html>
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
            <?php include '../Recursos/header.php'; ?>;
            <?php
            if (isset($_SESSION['listaAlumnos'])) {
                $listaAlumnos = $_SESSION['listaAlumnos'];
            }
            ?>
            <!-- Formulario aceptar -->
            <div class="row">
                <div class="col-12 d-flex justify-content-center py-2">
                    <form id="formularioAula" name="crearAula" action="../Controladores/controladorPrincipal.php" method="POST">
                        <div class="form-group d-flex justify-content-center">
                            <input type="text" name="nombre" class="form-control" placeholder="Nombre del Aula">
                            <input type="submit" class="btn btn-success" name="crearAula" value="Crear Aula">
                        </div>
                    </form>
                </div>
            </div>

            <!-- Caja para añadir alumnos --> 
            <div class="row justify-content-center" id="cajaGeneral">
                <div class="col-sm-3"></div>
                <div class="col-12 col-sm-6" id="cajaCrear">
                    <h4>Añadir alumnos</h4>
                    <table class="table table-hover" id="tablaAdded">
                        <caption>Alumnos añadidos</caption>
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
            </div>

            <?php include '../Recursos/footer.php'; ?>
        </div>
    </body>
</html>
