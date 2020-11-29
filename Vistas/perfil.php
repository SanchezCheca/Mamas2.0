<!DOCTYPE html>
<html>
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Mi CSS -->
        <link rel="stylesheet" href="../css/estilos.css">
        <link rel="stylesheet" href="../css/footerAbajo.css">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
              integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
                integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous"></script>

        <script src="https://www.google.com/recaptcha/api.js?render=6LdGnuoZAAAAAJ8DW3PDVk_1XBeLLqMYc41gNGPd"></script>
        <title>Mis aulas - Mamas 2.0</title>

        <!-- Recursos MDBootstrap -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/mdb.min.css">
        <link rel="stylesheet" href="../css/style.css">

        <title>Perfil - Mamas 2.0</title>
    </head>
    <body>
        <?php include '../Recursos/header.php'; ?>

        <?php
        //Comprueba si se está viendo un usuario en particular. Si no, se muestra el usuario iniciado
        if (isset($_REQUEST['idUsuario'])) {
            $idUsuario = $_REQUEST['idUsuario'];
            require_once '../Auxiliar/AccesoADatos.php';
            $usuario = AccesoADatos::getUsuarioPorId($idUsuario);
            
            //Si ha venido desde fuera a ver su propio perfil lo puede editar
            if (isset($usuarioIniciado) && $usuarioIniciado->getId() == $idUsuario) {
                $editable = true;
            } else {
                $editable = false;
            }
        } else if (isset($usuarioIniciado)) {
            $usuario = $usuarioIniciado;
            $editable = true;
        } else {
            $mensaje = 'Ha ocurrido algun error';
            $_SESSION['mensaje'] = $mensaje;
            header('Location: ../index.php');
        }
        ?>

        <div class="container">
            <div class="row my-4">
                <div class="col-md-3"></div>
                <div class="col-12 col-md-6 border border-light">
                    <div class="row">
                        <div class="col-12 py-2">
                            <h3 class="h3-responsive text-center mt-4"><?php echo $usuario->getNombre(); ?></h3>
                        </div>
                        <div class="col-12 text-center py-2">
                            <p><b>Correo: </b><?php echo $usuario->getCorreo(); ?></p>
                        </div>
                        <div class="col-12 text-center py-2">
                            <p><b>Rol: </b><?php
                                if ($usuario->getRol() == 0) {
                                    echo 'Alumno';
                                } else {
                                    echo 'Profesor';
                                }
                                ?></p>
                        </div>
                        <?php
                        if ($editable) {
                            ?>
                            <div class="col-12 text-center py-4">
                                <form name="botonEditar" action="../Controladores/controladorPrincipal.php" method="POST">
                                    <input type="submit" class="btn btn-grey" name="irAEditarPerfil" value="Editar">
                                    <input type="submit" class="btn btn-info" name="irARecuperarPass" value="Recuperar contraseña">
                                </form>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
        <?php include '../Recursos/footer.php'; ?>
    </body>
</html>
