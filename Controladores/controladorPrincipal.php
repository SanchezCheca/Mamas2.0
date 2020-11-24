<?php

session_start();
require_once '../Auxiliar/AccesoADatos.php';




//---------------------VIENE DE FORMULARIO DE REGISTRO
if (isset($_REQUEST['registro'])) {
      $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
    $recaptcha_secret = '6LdGnuoZAAAAAE00TDbdo-XCFJXmNRMRsGtgksZl';
    $recaptcha_response = $_POST['recaptcha_response'];
    $recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
    $recaptcha = json_decode($recaptcha);
     if ($recaptcha->score >= 0.7) {
           $nombre = $_REQUEST['nombre'];
    $correo = $_REQUEST['correo'];
    $pass = $_REQUEST['pass'];

    if (AccesoADatos::insertarUsuario($correo, $nombre, $pass)) {
        $mensaje = 'Correcto se ha registrado';
        
    }
     }else{
         $mensaje = 'No ha funcionado el captcha(eres un robot)';
    }
    $_SESSION['mensaje'] = $mensaje;
    header('Location: ../index.php');
}


//---------------------REGISTRO USUARIO

if (isset($_REQUEST['registroUser'])) {
    $nombre = $_REQUEST['nombre'];
    $correo = $_REQUEST['correo'];
    $pass = $_REQUEST['pass'];

    if (AccesoADatos::insertarUsuario($correo, $nombre, $pass)) {
        $mensaje = 'Correcto';
        $_SESSION['mensaje'] = $mensaje;
    }
    header('Location: ../Vistas/administracionUsuario.php');
}




//---------------------VIENE DE INICIO DE SESIÓN
if (isset($_REQUEST['iniciosesion'])) {
    $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
    $recaptcha_secret = '6LdGnuoZAAAAAE00TDbdo-XCFJXmNRMRsGtgksZl';
    $recaptcha_response = $_POST['recaptcha_response'];
    $recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
    $recaptcha = json_decode($recaptcha);
    if ($recaptcha->score >= 0.7) {
        $correo = $_REQUEST['correo'];
        $pass = $_REQUEST['pass'];

        $usuarioIniciado = AccesoADatos::getUsuario($correo, $pass);
        if ($usuarioIniciado != null) {
            $_SESSION['usuarioIniciado'] = $usuarioIniciado;
            $mensaje = 'Has iniciado sesión como ' . $usuarioIniciado->getNombre();
        } else {
            $mensaje = 'ERROR: Correo y/o contraseña incorrectos.';
        }
    }else{
         $mensaje = 'No ha funcionado el captcha(eres un robot)';
    }

    $_SESSION['mensaje'] = $mensaje;
    header('Location: ../index.php');
}


