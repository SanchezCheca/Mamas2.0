<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Añadir preguntas</title>
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
        <script>
            function allowDrop(ev) {
                ev.preventDefault();
            }

            function drag(ev) {
                ev.dataTransfer.setData("text", ev.target.id);
            }

            function drop(ev) {
                ev.preventDefault();
                var data = ev.dataTransfer.getData("text");
                ev.target.appendChild(document.getElementById(data));
            }
        </script>
    </head>
    <body>
        <?php
        require_once '../Modelo/Pregunta.php';
        require_once '../Modelo/Examen.php';
        session_start();

        if (isset($_SESSION['preguntaNumerico'])) {
            $tipoNumerico = $_SESSION['preguntaNumerico'];
        }
        if (isset($_SESSION['preguntaTexto'])) {
            $tipoTexto = $_SESSION['preguntaTexto'];
        }
        if (isset($_SESSION['preguntaOpciones'])) {
            $tipoOpciones = $_SESSION['preguntaOpciones'];
        }
        if (isset($_SESSION['idExamen'])) {
            $id = $_SESSION['idExamen'];
        }
        if (isset($_SESSION['tituloExamen'])) {
            $titulo = $_SESSION['tituloExamen'];
        }
        ?>

        <div class="container">
            <header class="row align-items-center navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar bg-primary">

                <!-- Navbar -->

                <div class="container">

                    <div class="col-md-6">
                        <!-- Brand -->

                        <h2 class="font-weight-bold"><?php echo $titulo ?></h2>
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
                                        <button type="submit" class=" waves-effect  btn btn-primary" name="volverEx" >Volver</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>


            </header>


            <main class="row mt-5">
                <div class="col-md-12 vh-80 d-flex flex-column justify-content-center ">
                    <div class="container row">

                        <div class="accordion col-md-6" id="accordionExample275">

                            <?php
                            if (isset($tipoTexto)) {
                                ?>

                                <div class="card z-depth-0 bordered">
                                    <div class="card-header" id="headingOne2">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne2"
                                                    aria-expanded="true" aria-controls="collapseOne2">
                                                Preguntas de tipo texto
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapseOne2" class="collapse" aria-labelledby="headingOne2"
                                         data-parent="#accordionExample275">
                                        <div class="card-body" ondrop="drop(event)" ondragover="allowDrop(event)">
                                            <?php
                                            for ($i = 0; $i < sizeof($tipoTexto); $i++) {
                                                $preguntaTextoAux = $tipoTexto[$i];
                                                ?>
                                            <input id="texto-"<?php echo $i?> type="text" name="pregunta" readonly value="<?php echo $preguntaTextoAux->getCuerpo() ?>" draggable="true" ondragstart="drag(event)">
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>

                                <?php
                            }
                            ?>

                            <?php
                            if (isset($tipoNumerico)) {
                                ?>

                                <div class="card z-depth-0 bordered">
                                    <div class="card-header" id="headingTwo2">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                                    data-target="#collapseTwo2" aria-expanded="false" aria-controls="collapseTwo2">
                                                Preguntas tipo numerico
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapseTwo2" class="collapse" aria-labelledby="headingTwo2"
                                         data-parent="#accordionExample275">
                                        <div class="card-body" ondrop="drop(event)" ondragover="allowDrop(event)">
                                            <?php
                                            for ($i = 0; $i < sizeof($tipoNumerico); $i++) {
                                                $preguntaNumAux = $tipoNumerico[$i];
                                                ?>
                                                <input id="numerico-"<?php echo $i?> type="text" name="pregunta" readonly value="<?php echo $preguntaNumAux->getCuerpo() ?>"draggable="true" ondragstart="drag(event)">
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>

                                <?php
                            }
                            ?>

                            <?php
                            if (isset($tipoOpciones)) {
                                ?>
                                <div class="card z-depth-0 bordered">
                                    <div class="card-header" id="headingThree2">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                                    data-target="#collapseThree2" aria-expanded="false" aria-controls="collapseThree2">
                                                Preguntas de opciones
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapseThree2" class="collapse" aria-labelledby="headingThree2"
                                         data-parent="#accordionExample275">
                                        <div class="card-body" ondrop="drop(event)" ondragover="allowDrop(event)">
                                            <?php
                                            for ($i = 0; $i < sizeof($tipoOpciones); $i++) {
                                                $preguntaOpcAux = $tipoOpciones[$i];
                                                ?>
                                                <input id="opciones-"<?php echo $i?> type="text" name="pregunta" readonly value="<?php echo $preguntaOpcAux->getCuerpo() ?>" draggable="true" ondragstart="drag(event)">
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>

                                <?php
                            }
                            ?>
                        </div>

                        <!-- Formulario Añadir pregunta. -->
                        <div class="col-md-6">
                            <h3><?php echo $titulo ?></h3>
                            <form action="../Controladores/controladorPrincipal.php" method="POST">
                                <div id="div1" ondrop="drop(event)" ondragover="allowDrop(event)" style="height: 150px; border: 1px double black;">

                                </div>
                                <button type="submit" class="btn blue-gradient w-100" name="addPregunta">Añadir</button>
                            </form>
                        </div>

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
