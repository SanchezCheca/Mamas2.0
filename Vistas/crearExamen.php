<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Crear Examen</title>
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
                                        <button type="submit" class=" waves-effect  btn btn-primary" name="volverEx" >Volver</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </header>


            <main class="row mt-5">
                <div class="col-md-7 mt-5 mx-auto">
                    <form class="border border-light p-5" action="../Controladores/controladorPrincipal.php" method="POST">

                        <p class="h4 mb-4 text-center">Crear Examen</p>
                        <div class="my-3">
                            <label for="exampleForm2">Nombre del examen: </label>
                            <input type="text" id="exampleForm2" name="nombreExamen" class="form-control ">
                        </div>

                        <div class="my-3">
                            <label for="exampleForm2">Fecha de inicio: </label>
                            <input type="datetime-local" id="exampleForm2" name="fechaInicio" class="form-control ">
                        </div>


                        <div class="my-3">
                            <label for="exampleForm2">Fin del examen: </label>
                            <input type="datetime-local" id="exampleForm2" name="fechaFin" class="form-control ">
                        </div>




                        <select name="opciones" class="browser-default custom-select mb-4 " id="select">
                            <option value="" disabled selected>Elige una Opción</option>
                            <option value="1">Activado</option>
                            <option value="2">Desactivado</option>

                        </select>
                        <button class="btn btn-info btn-block my-4" type="submit" name="crearExamen">Crear</button>


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
