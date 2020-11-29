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
                    <a class=" waves-effect  btn btn-primary" href="<?php echo $ruta . 'index.php' ?>">Inicio</a>
                </li>
                <?php
                if (isset($usuarioIniciado)) {
                    //Si ha iniciado sesión
                    ?>
                    <li class="nav-item">
                        <a class=" waves-effect  btn btn-primary" href="<?php echo $ruta . 'Vistas/examen.php'; ?>">Exámenes</a>
                    </li>
                    <li class="nav-item">
                        <a class=" waves-effect  btn btn-primary" href="<?php echo $ruta . 'Vistas/aulas.php'; ?>">Aulas</a>
                    </li>
                    <?php
                    //Muestra enlace al CRUD de usuarios
                    if ($usuarioIniciado->getRol() == 2) {
                        ?>
                    <li>
                        <a class="waves-effect btn btn-primary" href="<?php echo $ruta . 'Vistas/administracionUsuario.php'; ?>">Administrar usuarios</a>
                    </li>
                        <?php
                    }

                    //Muestra opciones de perfil
                    ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Perfil
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Mi perfil</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?php echo $ruta . 'Controladores/controladorPrincipal.php?cerrarSesion=!'; ?>">Cerrar sesión</a>
                        </div>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </div>

    </div>
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