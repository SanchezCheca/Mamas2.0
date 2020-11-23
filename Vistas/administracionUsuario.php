<!DOCTYPE html>


<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->

        <title>Página principal</title>
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
    <body style="height: 100%;">

        <?php
//El require debe ir antes, para que sepa a que clase pertenece, sino, cuando pase por el session, recoge los datos, pero al no estar antes el require, no sabe de que clase son
        require_once '../Modelo/Usuario.php';
        session_start();
        ?>

        <!-- Navigation -->
        <header class="row align-items-center navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar bg-primary">

            <!-- Navbar -->

            <div class="container">
                <div class="col-md-6">
                    <!-- Brand -->

                    <h2 class="font-weight-bold">Administración de Usuarios</h2>
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
                                <form action="../Controladores/controladorCRUD.php" method="POST" name="administrador">
                                    <button type="submit" class=" waves-effect  btn btn-primary" name="cargar" >Cargar Usuarios</button>
                                </form>
                            </li>
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



        <main class="row ">

            <div class="col-md-8 mx-auto mt-5 vh-80 d-flex flex-column justify-content-center align-items-center">

                <form action="../Controladores/controladorCRUD.php" method="POST" name="anadir">

                    <button type="submit" name="anadir" class="btn btn-rounded btn-primary  mb-5 fixed-top  marginmio"><i class="fas fa-user-plus pr-2" style="font-size: 20px" aria-hidden="true"></i>Añadir Alumno</button>

                </form>
                <div class="table-responsive text-nowrap ">
                    <table class="table ">
                        <thead>
                            <tr>
                                <th scope="col"> <i class="fas fa-id-card pr-2" style="font-size: 30px"></i>  Id</th>
                                <th scope="col"><i class="fas fa-user-graduate pr-2" style="font-size: 30px" ></i>Nombre</th>
                                <th scope="col"> <i class="fas fa-envelope-open-text pr-2" style="font-size: 30px"></i>Email</th>
                                <th scope="col"><i class="fas fa-dice pr-2" style="font-size: 30px"></i>Rol</th>
                                <th scope="col"><i class="fas fa-check pr-2" style="font-size: 30px"></i>Activado</th>
                                <th scope="col"><i class="fas fa-user pr-2" style="font-size: 30px"></i>Editar/Eliminar</th>

                        </thead>
                        <tbody>
                            <?php
                            if (isset($_SESSION['usuarios'])) {
                                $usuarios = $_SESSION['usuarios'];
                                for ($i = 0; $i < sizeof($usuarios); $i++) {

                                    $aux = $usuarios[$i];
                                    ?>
                                <form action="../Controladores/controladorCRUD.php" method="POST" name="usuarios">
                                    <tr>
                                        <th scope="row"><input type="text" name="id" value="<?php echo $aux->getId() ?>" readonly></th>
                                        <td><input type="text" name="nombre" value="<?php echo $aux->getNombre() ?>"></td>
                                        <td><input type="text" name="email" value="<?php echo $aux->getCorreo() ?>"></td>
                                        <td><input type="text" name="rol" value="<?php echo $aux->getRol() ?>"></td>
                                        <td><input type="text" name="activado" value="<?php echo $aux->getActivo() ?>"></td>
                                        <td>
                                            <button type="submit" name="editar" class="btn-floating btn-lg  boton bg-primary"><i class="fas fa-user-edit"></i></button>
                                            <button type="submit" name="eliminar" class="btn-floating btn-lg  boton bg-primary"><i class="fas fa-user-times"></i></button>
                                        </td>

                                    </tr>
                                </form>
        <?php
    }
}
?>



                        </tbody>
                    </table>


                </div>

            </div>


        </main>




        <!-- Footer -->

        <footer class=" row  bg-primary fixed-bottom vh-10 ">
            <div class="container">
                <!-- Copyright -->
                <div class="footer-copyright text-center py-3">© 2020 Copyright:
                    <a href="" class="text-light"> Daniel y Néstor</a>
                </div>
                <!-- Copyright -->
            </div>
        </footer>
        <!-- Footer -->


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


    </body>
</html>