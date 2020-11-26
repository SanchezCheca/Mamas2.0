<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <!-- Bootstrap CSS -->

        <title>Crear Preguntas</title>
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
        session_start();
        ?>
        <div class="container">
            <header class="row align-items-center navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar bg-primary">

                <!-- Navbar -->

                <div class="container">
                    <div class="col-md-6">
                        <!-- Brand -->

                        <h2 class="font-weight-bold">Crear Preguntas</h2>
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
                            <ul class="navbar-nav mr-auto  offset-3">

                                <li class="nav-item ">
                                    <form action="../Controladores/controladorCRUD.php" method="POST" name="volver">
                                        <button type="submit" class=" waves-effect  btn btn-primary" name="cerrarSesion" >Cerrar Sesión</button>
                                    </form>
                                </li>

                            </ul>


                        </div>

                    </div>


                </div>

            </header>

            <main>


                <div class="container mt-5 mx-auto align-items-center justify-content-center d-flex flex-column vh-80" >
                    <div class="row col-md-8 mt-5 ">
                        <form action="../Controladores/controladorPrincipal.php" method="POST" name="pregunta">
                            <select class="browser-default custom-select" name="preguntas"  onchange="this.form.submit()">
                                <?php
                                if (!isset($_SESSION['tipopregunta'])) {
                                    ?>
                                    <option disabled selected>Selecciona una opción</option>
                                    <option value="1">Numerico</option>
                                    <option value="2">Desarrollo</option>
                                    <option value="3">Opciones</option>
                                    <?php
                                } else {

                                    $tipo = $_SESSION['tipopregunta'];
                                    switch ($tipo) {
                                        case 1:
                                            ?>
                                            <option value="1" selected>Numerico</option>
                                            <option value="2">Desarrollo</option>
                                            <option value="3">Opciones</option>

                                            <?php
                                            break;
                                        case 2:
                                            ?>
                                            <option value="1" >Numerico</option>
                                            <option value="2" selected>Desarrollo</option>
                                            <option value="3">Opciones</option>
                                            <?php
                                            break;
                                        case 3:
                                            ?>
                                            <option value="1" >Numerico</option>
                                            <option value="2" >Desarrollo</option>
                                            <option value="3" selected>Opciones</option>
                                        <?php
                                    }
                                    ?>

                                    <?php
                                }
                                ?>

                            </select>
                        </form>
                    </div>










                </div>


                <div class="row">
                    
                    <form action="../Controladores/controladorPrincipal.php" name="formularioPreguntas">
                        <div class="w-100 text-center mt-3">
                            <h3>Pregunta</h3>
                            <textarea id="ta_resp_texto" name="titulo" placeholder="Enunciado de la pregunta" rows="5" class="w-50"></textarea>
                        </div>
                        <?php
                        if (isset($_SESSION['tipopregunta'])) {
                            $tipo = $_SESSION['tipopregunta'];
                            switch ($tipo) {

                                case 1:
                                    ?>
                                  <div class="w-100 text-center">
                                        <h3>Respuesta</h3>
                                        <input type="number" id="num" name="numerico" class="w-50">
                                    </div>
                                    <?php
                                    break;


                                
                                case 3:
                                    ?>
                                    <div class="w-100 text-center">
                                        <h3>Seleccione las respuestas correctas</h3>
                                        <label class="mr-2"><input type="checkbox" id="comboA" name="comboa">
                                            <input type="text" name="inputa"></label>
                                        <label class="ml-2"><input type="checkbox" id="comboB" name="combob">
                                            <input type="text" name="inputb"></label>
                                    </div>
                                    <div class="w-100 text-center">
                                        <label class="mr-2"><input type="checkbox" id="comboC" name="comboc">
                                            <input type="text" name="inputc"></label>
                                        <label class="ml-2"><input type="checkbox" id="comboD" name="combod">
                                            <input type="text" name="inputd"></label>
                                    </div>
                                    <?php
                                    break;
                            }
                        } else {
                            $_SESSION['tipo'] = 'texto';
                            ?>
                            <div class="w-100 text-center">
                                <h3>Respuesta</h3>
                                <textarea id="resp" name="respu" rows="5" class="w-50"></textarea>
                            </div>
                            <?php
                        }
                        ?>
                        <input type="number" name="valor" placeholder="Valor de la pregunta"> 
                        <div class="w-100 text-center mt-3">
                            <button type="submit" name="anadirPregunta" class="btn btn-outline-success">Añadir pregunta</button>
                        </div>
                        
                    </form>




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
