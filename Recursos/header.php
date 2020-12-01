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

<header>
    <nav class="px-5 navbar navbar-expand-lg navbar-dark primary-color-dark">
        <a class="navbar-brand" href="<?php echo $ruta . 'index.php'; ?>">Mamás2.0</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333"
                aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
            <?php
            //Pinta la barra completa si ha iniciado sesion
            if (isset($usuarioIniciado)) {
                ?>
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $ruta . 'index.php'; ?>">Inicio
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $ruta . 'Vistas/aulas.php'; ?>">Aulas</a>
                    </li>
                    <li class="nav-item">
                        <form name="irAExamenes" action="<?php echo $ruta . 'Controladores/controladorPrincipal.php'; ?>" method="POST">
                            <input class="nav-link" type="submit" name="irAExamenes" value="Exámenes">
                        </form>
                    </li>
                    <?php
                    //Si es administrador, muestra enlace al CRUD de usuarios
                    if ($usuarioIniciado->getRol() == 2) {
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo $ruta . 'Vistas/administracionUsuario.php'; ?>">ADMIN</a>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
                <ul class="navbar-nav ml-auto nav-flex-icons">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-default"
                             aria-labelledby="navbarDropdownMenuLink-333">
                            <a class="dropdown-item" href="<?php echo $ruta . 'Vistas/perfil.php'; ?>">Mi perfil</a>
                            <a class="dropdown-item" href="<?php echo $ruta . 'Controladores/controladorPrincipal.php?cerrarSesion=1'; ?>">Cerrar sesión</a>
                        </div>
                    </li>
                </ul>
                <?php
            }
            ?>
        </div>
    </nav>

    <!--/.Navbar -->
</header>

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