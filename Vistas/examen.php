<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Examenes</title>
        <!-- MDB icon -->
        <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
        <!-- Google Fonts Roboto -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <!-- Material Design Bootstrap -->
        <link rel="stylesheet" href="../css/mdb.min.css">
        <!-- Your custom styles (optional) -->
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/miestilo.css">
    </head>

    <body>
        <?php
        require_once '../Modelo/Examen.php';
        session_start();
        ?>
        <div class="container">
            <header class="row align-items-center navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar bg-primary">

                <!-- Navbar -->

                <div class="container">
                    <div class="col-md-6">
                        <!-- Brand -->

                        <h2 class="font-weight-bold">Examenes</h2>
                    </div>
                    <div class="col-md-6">
                        <!-- Collapse -->
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <!-- Links -->
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">

                            <!-- Left -->
                            <ul class="navbar-nav ml-auto  offset-3 ">
                                <li class="nav-item">
                                    <form action="../Controladores/controladorCRUD.php" method="POST" name="volver">
                                        <button type="submit" class=" waves-effect  btn btn-primary" name="creaPreguntas" >Crear Preguntas</button>
                                        <button type="submit" class=" waves-effect  btn btn-primary" name="volver" >Volver</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </header>


            <main class="row ">

                <div class="col-md-8 mx-auto mt-5 vh-80 d-flex flex-column justify-content-center align-items-center">

                    <form action="../Controladores/controladorCRUD.php" method="POST" name="anadir">

                        <button type="submit" name="anadirExamen" class="btn btn-rounded btn-primary  mb-5   marginmio"><i class="fas fa-plus pr-2" style="font-size: 20px" aria-hidden="true"></i>Añadir Examen</button>

                    </form>
                </div>
                <div class="container">
                    <?php
                    if (isset($_SESSION['listaExamenes'])) {
                        $listaExamenes = $_SESSION['listaExamenes'];
                        for ($i = 0; $i < sizeof($listaExamenes); $i++) {
                            $examenAux = $listaExamenes[$i];
                            ?>


                            <div class="card mt-5">
                                <div class="card-header">
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
                                    <p class="card-text">Fecha inicio:  <input type="text" id="fi" name="fechaInicio" value="<?php echo $examenAux->getFechaInicio() ?>" readonly> </p> 
                                    <p class="card-text">Fecha de entrega: <input type="text" id="ff" name="fehcaFin" value="<?php echo $examenAux->getFechaFin() ?>" readonly> </p>
                                    <a href="<?php echo $ruta . 'anadirPreguntas.php'; ?>" class="btn btn-primary">Ver Examen</a>
                                </div>
                            </div>

                            <?php
                        }
                    }
                    ?>
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
