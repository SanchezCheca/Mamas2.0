<?php
session_start();
?>

<!-- Navigation -->
<header class="row align-items-center navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar bg-primary">
    <!-- Navbar -->
    <div class="container">
        <!-- Brand -->
        <h2>Mamás2.0</h2>
        <!-- Collapse -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Links -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <!-- Left -->
            <ul class="navbar-nav mr-auto ml-5 ">
                <li class="nav-item ">
                    <a class=" waves-effect  btn btn-primary" href="Vistas/inicioSesion.php">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class=" waves-effect btn btn-primary " href="registro.html">Registro</a>
                </li>
            </ul>
        </div>

    </div>
</header>
<!-- Mensajes de error/alerta -->
<div class="bg-warning mensaje">
    <div class="col-12">
        <?php
        if (isset($_SESSION['mensaje'])) {
            echo $_SESSION['mensaje'];
            unset($_SESSION['mensaje']);
        }
        ?>
    </div>
</div>