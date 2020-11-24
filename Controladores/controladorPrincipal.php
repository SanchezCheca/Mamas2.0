<?php

require_once '../Auxiliar/AccesoADatos.php';
require_once '../Modelo/Usuario.php';
require_once '../Modelo/Aula.php';

session_start();

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

//---------------------VIENE DE INICIO DE SESIÓN
if (isset($_REQUEST['iniciosesion'])) {
    $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
    $recaptcha_secret = '6LdGnuoZAAAAAE00TDbdo-XCFJXmNRMRsGtgksZl';
    $recaptcha_response = $_POST['recaptcha_response'];
    $recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
    $recaptcha = json_decode($recaptcha);
    if ($recaptcha->score <= 0.7) {
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
         $mensaje = 'No ha funcionado el captcha (eres un robot).';
    }

    $_SESSION['mensaje'] = $mensaje;
    header('Location: ../index.php');
}


//---------------------CERRAR SESIÓN
if (isset($_REQUEST['cerrarSesion'])) {
    unset($_SESSION['usuarioIniciado']);
    $mensaje = 'Has cerrado la sesión.';
    $_SESSION['mensaje'] = $mensaje;
    header('Location: ../index.php');
}

//---------------------BOTON "Ir a crear aula"
if (isset($_REQUEST['irACrearAula'])) {
    //Hace una consulta a BD y guarda en la sesión un vec. asoc. con todos los alumnos disponibles
    require_once '../Auxiliar/AccesoADatos.php';
    $alumnos = AccesoADatos::getListaAlumnos();
    $listaAlumnos = json_decode($alumnos);
    $_SESSION['listaAlumnos'] = $listaAlumnos;
    
    header('Location: ../Vistas/crearAula.php');
}

//---------------------BOTON "Crear Aula"
if (isset($_REQUEST['crearAula'])) {
    $nombre = $_REQUEST['nombre'];
    $alumnos = $_REQUEST['alumnosAula'];
    $mensaje = '';
    $hayError = false;

    if (isset($_SESSION['usuarioIniciado'])) {
        $usuarioIniciado = $_SESSION['usuarioIniciado'];
    } else {
        $mensaje = 'Ha ocurrido algún error.';
        $_SESSION['mensaje'] = $mensaje;
        header('Location: ../Vistas/aulas.php');
    }
    
    $idAula = AccesoADatos::addAula($usuarioIniciado->getId(), $nombre);

    if ($idAula != null) {
        foreach ($alumnos as $valor) {
            if (!$hayError) {
                AccesoADatos::asignarAlumnoAula($idAula, $valor);
            }
        }

        $mensaje = 'Se ha creado el aula "' . $nombre . '" con ' . count($alumnos) . ' alumno(s).';
        $_SESSION['mensaje'] = $mensaje;
        header('Location: ../Vistas/aulas.php');
    } else {
        $mensaje = 'Ha ocurrido algún error.';
        $_SESSION['mensaje'] = $mensaje;
        header('Location: ../Vistas/aulas.php');
    }
}