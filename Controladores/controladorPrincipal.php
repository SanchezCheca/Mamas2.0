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
    } else {
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
    } else {
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

    //Asegura que no se ha perdido la sesion del usuario
    if (isset($_SESSION['usuarioIniciado'])) {
        $usuarioIniciado = $_SESSION['usuarioIniciado'];
    } else {
        $mensaje = 'Ha ocurrido algún error.';
        $_SESSION['mensaje'] = $mensaje;
        header('Location: ../Vistas/aulas.php');
    }

    //Crea el aula y mete a los alumnos seleccionados
    $idAula = AccesoADatos::addAula($usuarioIniciado->getId(), $nombre);

    if ($idAula != null) {
        foreach ($alumnos as $valor) {
            if (!$hayError) {
                AccesoADatos::asignarAlumnoAula($idAula, $valor);
            }
        }

        $mensaje = 'Se ha creado el aula "' . $nombre . '" con ' . count($alumnos) . ' alumno(s).';

        //Actualiza las aulas del usuario
        $aula = new Aula($idAula, $nombre, $usuarioIniciado->getId(), $usuarioIniciado->getNombre());
        $aulasUsuario = $usuarioIniciado->getAulas();

        if ($aulasUsuario != null) {
            $aulasUsuario[] = $aula;
        } else {
            $aulasUsuario = $aula;
        }
        $usuarioIniciado->setAulas($aulasUsuario);

        $_SESSION['mensaje'] = $mensaje;
        header('Location: ../Vistas/aulas.php');
    } else {
        $mensaje = 'Ha ocurrido algún error.';
        $_SESSION['mensaje'] = $mensaje;
        header('Location: ../Vistas/aulas.php');
    }
}

/**
 * ---------------------BOTON "Ver Aula"
 * Recupera el aula a ver y la guarda en la sesión.
 * Recupera los alumnos de ese aula y a la sesión.
 * Va a 'ver aula'.
 */
if (isset($_REQUEST['verAula'])) {
    $idAula = $_REQUEST['idAula'];

    $aula = AccesoADatos::getAula($idAula);
    $_SESSION['aula'] = $aula;

    $alumnosAula = AccesoADatos::getAlumnosDeAula($idAula);
    $_SESSION['alumnosAula'] = $alumnosAula;

    header('Location: ../Vistas/verAula.php');
}

/**
 * Lleva a 'Editar Aula'
 */
if (isset($_REQUEST['irAEditarAula'])) {
    $idAula = $_REQUEST['idAula'];
    $todosAlumnosExceptoAula = AccesoADatos::getAlumnosExceptoAula($idAula);
    $_SESSION['todosAlumnosExceptoAula'] = $todosAlumnosExceptoAula;

    header('Location: ../Vistas/editarAula.php');
}

/**
 * Devuelve a 'ver aula'
 */
if (isset($_REQUEST['cancelarEdicionAula'])) {
    header('Location: ../Vistas/verAula.php');
}

/**
 * ---------------------VIENE DE EDITAR AULA
 */
if (isset($_REQUEST['editarAula'])) {
    if (isset($_REQUEST['idAula']) && isset($_SESSION['usuarioIniciado'])) {
        $usuarioIniciado = $_SESSION['usuarioIniciado'];
        $idAula = $_REQUEST['idAula'];
        $nombre = $_REQUEST['nombre'];

        if (isset($_REQUEST['alumnosRetirados'])) {
            $alumnosRetirados = $_REQUEST['alumnosRetirados'];
            foreach ($alumnosRetirados as $idAlumno) {
                AccesoADatos::retirarAlumnoAula($idAula, $idAlumno);
            }
        }

        if (isset($_REQUEST['alumnosAdded'])) {
            $alumnosAdded = $_REQUEST['alumnosAdded'];
            foreach ($alumnosAdded as $idAlumno) {
                AccesoADatos::asignarAlumnoAula($idAula, $idAlumno);
            }
        }

        AccesoADatos::editarAula($idAula, $nombre);

        //Actualiza el aula
        $aula = AccesoADatos::getAula($idAula);
        $_SESSION['aula'] = $aula;
        //Actualiza las aulas del usuario
        $aulasUsuario = AccesoADatos::getAulas($usuarioIniciado->getRol(), $usuarioIniciado->getId());
        $usuarioIniciado->setAulas($aulasUsuario);

        $mensaje = 'Has actualizado el aula. ' . count($alumnosAdded) . ' alumnos añadidos y ' . count($alumnosRetirados) . ' retirados.';
        $_SESSION['mensaje'] = $mensaje;
        header('Location: ../Vistas/verAula.php');
    } else {
        $mensaje = 'Ha ocurrido algún error';
        $_SESSION['mensaje'] = $mensaje;
        header('Location: ../index.php');
    }
}

/**
 * VIENE DE EDITAR AULA, QUERIENDO ELIMINARLA
 */
if (isset($_REQUEST['eliminarAula'])) {
    if (isset($_REQUEST['idAula']) && isset($_SESSION['usuarioIniciado'])) {
        $usuarioIniciado = $_SESSION['usuarioIniciado'];
        $idAula = $_REQUEST['idAula'];
        $nombre = $_REQUEST['nombre'];
        
        AccesoADatos::eliminarAula($idAula);
        
        //Actualiza las aulas del usuario
        $aulasUsuario = AccesoADatos::getAulas($usuarioIniciado->getRol(), $usuarioIniciado->getId());
        $usuarioIniciado->setAulas($aulasUsuario);
        
        $mensaje = 'Has eliminado el aula "' . $nombre . '".';
        $_SESSION['mensaje'] = $mensaje;
        header('Location: ../Vistas/aulas.php');
        
    } else {
        $mensaje = 'Ha ocurrido algún error';
        $_SESSION['mensaje'] = $mensaje;
        header('Location: ../index.php');
    }
}

/**
 * VIENE DE 'EDITAR PERFIL' EN LA VISTA 'PERFIL'
 */
if (isset($_REQUEST['irAEditarPerfil'])) {
    header('Location: ../Vistas/editarPerfil.php');
}

/**
 * VIENE DE 'RECUPERAR CONTRASEÑA' EN LA VISTA 'PERFIL'
 */
if (isset($_REQUEST['irARecuperarPass'])) {
    header('Location: ../Vistas/contrasena.php');
}

/**
 * VIENE DE 'CANCELAR' EN LA VISTA 'EDITAR PERFIL'
 */
if (isset($_REQUEST['cancelarEditarPerfil'])) {
    header('Location: ../Vistas/perfil.php');
}

/**
 * VIENE DE 'EDITAR PERFIL'
 */
if (isset($_REQUEST['editarPerfil'])) {
    if (isset($_SESSION['usuarioIniciado'])) {
        $usuarioIniciado = $_SESSION['usuarioIniciado'];
        $nombre = $_REQUEST['nombre'];
        $correo = $_REQUEST['correo'];
        
        AccesoADatos::editarPerfil($usuarioIniciado->getId(), $nombre, $correo);
        
        //Actualiza el usuario
        $usuarioIniciado = AccesoADatos::getUsuarioPorId($usuarioIniciado->getId());
        $_SESSION['usuarioIniciado'] = $usuarioIniciado;
        
        $mensaje = 'Has modificado tu perfil';
        $_SESSION['mensaje'] = $mensaje;
        header('Location: ../Vistas/perfil.php');
    } else {
        $mensaje = 'Ha ocurrido algún error';
        $_SESSION['mensaje'] = $mensaje;
        header('Location: ../index.php');
    }
}