<!DOCTYPE html>
<html>
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Mi CSS -->
        <link rel="stylesheet" href="../css/estilos.css">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/miestilo.css">

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

        <title>Exámenes - Mamas 2.0</title>
    </head>

    <body>
        <?php
        require_once '../Modelo/Examen.php';
        ?>
        <div class="container-fluid principal p-0 m-0">
            <?php include '../Recursos/header.php'; ?>
            <main class="row col-12 align-items-center justify-content-center p-4">
                <div class="col-md-12">
                    <form action="../Controladores/controladorCRUD.php" method="POST" name="anadir" class="row">
                        <button type="submit" name="anadirExamen" class="col-md-3 mx-auto btn btn-rounded btn-primary  mb-5   marginmio"><i class="fas fa-plus pr-2" style="font-size: 20px" aria-hidden="true"></i>Añadir Examen</button>
                    </form>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <?php
                        if (isset($_SESSION['listaExamenes'])) {
                            $listaExamenes = $_SESSION['listaExamenes'];
                            for ($i = 0; $i < sizeof($listaExamenes); $i++) {
                                $examenAux = $listaExamenes[$i];
                                ?>

                                <form action="../Controladores/controladorPrincipal.php" name="examen" method="POST" class="col-md-6">
                                    <div class="card mt-5 mx-2 unique-color">
                                        <div class="card-header">
                                            <input type="hidden" name="idExamen" value="<?php $examenAux->getId() ?>">
                                            <input class="float-left" type="text" id="nombreExamen" name="nombreExamen" value="<?php echo $examenAux->getNombre() ?>" readonly>
                                            <?php
                                            if ($examenAux->getOpcion() == 1) {
                                                ?>
                                                <select class="float-right" name="opcion">
                                                    <option value="1" selected>Activado</option>
                                                    <option value="2">Desactivado</option>
                                                </select>
                                                <?php
                                            } else {
                                                ?>

                                                <select class="float-right" name="opcion">
                                                    <option value="1">Activado</option>
                                                    <option  value="2" selected>Desactivado</option>
                                                </select>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                        <div class="card-body">
                                            <p class="card-text text-white">Fecha inicio:  <input type="text" id="fi" name="fechaInicio" value="<?php echo $examenAux->getFechaInicio() ?>" readonly> </p> 
                                            <p class="card-text text-white">Fecha de entrega: <input type="text" id="ff" name="fechaFin" value="<?php echo $examenAux->getFechaFin() ?>" readonly> </p>
                                            <button type="submit" class="btn btn-primary " name="verExamen"><i class="fas fa-plus pr-2" style="font-size: 20px" aria-hidden="true"></i>Añadir preguntas</button>
                                            <button type="submit" class="btn btn-primary" name="verExamen"><i class="fas fa-trash-alt pr-2" style="font-size: 20px" aria-hidden="true"></i>Borrar examen</button>
                                        </div>
                                    </div>
                                </form>
                                <?php
                            }
                        }
                        ?>
                    </div>
                </div>

            </main>

            <?php include '../Recursos/footer.php'; ?>
        </div>

    </body>


    <!-- jQuery -->
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="../js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="../js/mdb.min.js"></script>
    <!-- Your custom scripts (optional) -->
    <script type="text/javascript"></script>
</html>
