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
        <script>
            // Material Select Initialization
            $(document).ready(function () {
                $('.mdb-select').materialSelect();
            });
        </script>

    </head>
    <body>
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
   

 

        <!--Blue select-->
        <select class="mdb-select md-form colorful-select dropdown-primary">
            <option value="1">Option 1</option>
            <option value="2">Option 2</option>
            <option value="3">Option 3</option>
            <option value="4">Option 4</option>
            <option value="5">Option 5</option>
        </select>
        <label class="mdb-main-label">Blue select</label>
        <!--/Blue select-->

    




    <?php include '../Recursos/footer.php'; ?>
    
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
