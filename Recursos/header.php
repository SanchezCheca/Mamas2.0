<?php
//COMPRUEBA EL DIRECTORIO ACTUAL PARA ESTABLECER UNA RUTA ADECUADA A LOS ENLACES
$dir = $_SERVER['PHP_SELF'];

if (substr($dir, -9) == 'index.php') {
    //Estamos en inicio
    $ruta = '';
} else {
    //NO estamos en inicio
    $ruta = '../';
}

require_once $ruta . 'Modelo/Usuario.php';
require_once $ruta . 'Modelo/Aula.php';

session_start();

//---------------COMPRUEBA SI EL USUARIO HA INICIADO SESIÓN Y LO GUARDA
if (isset($_SESSION['usuarioIniciado'])) {
    $usuarioIniciado = $_SESSION['usuarioIniciado'];
}
?>

<!-- Navigation -->


<header>
    <div class="container">


        <!--Navbar -->
        <nav class="mb-1 navbar navbar-expand-lg navbar-dark default-color">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333"
                    aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pricing</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">Dropdown
                        </a>
                        <div class="dropdown-menu dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto nav-flex-icons">
                    <li class="nav-item">
                        <a class="nav-link waves-effect waves-light">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link waves-effect waves-light">
                            <i class="fab fa-google-plus-g"></i>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-default"
                             aria-labelledby="navbarDropdownMenuLink-333">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <!--/.Navbar -->
</header>
<!-- Espacio para esquivar la barra de navegación -->
<div class="row mt-5 mb-4"></div>

<!-- Mensajes de error/alerta -->
<div class="row bg-warning mensaje">
    <div class="col-12">
        <?php
        if (isset($_SESSION['mensaje'])) {
            echo $_SESSION['mensaje'];
            unset($_SESSION['mensaje']);
        }
        ?>
    </div>
</div>