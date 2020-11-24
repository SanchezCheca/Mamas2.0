<?php

require_once '../Auxiliar/AccesoADatos.php';
require_once '../Modelo/Usuario.php';
require_once '../Modelo/Aula.php';

session_start();

//---------------------VIENE DE FORMULARIO DE REGISTRO
if (isset($_REQUEST['registro'])) {
    $nombre = $_REQUEST['nombre'];
    $correo = $_REQUEST['correo'];
    $pass = $_REQUEST['pass'];

    if (AccesoADatos::isUsuario($correo)) {
        $mensaje = 'ERROR: El correo ya está registrado.';
    } else {
        if (AccesoADatos::insertarUsuario($correo, $nombre, $pass)) {
            $mensaje = 'Se ha registrado el usuario ' . $nombre;
        } else {
            $mensaje = 'Ha ocurrido algún error.';
        }
    }

    $_SESSION['mensaje'] = $mensaje;

    header('Location: ../index.php');
}

//---------------------VIENE DE INICIO DE SESIÓN
if (isset($_REQUEST['inicioSesion'])) {
    $correo = $_REQUEST['correo'];
    $pass = $_REQUEST['pass'];

    $usuarioIniciado = AccesoADatos::getUsuario($correo, $pass);
    if ($usuarioIniciado != null) {
        //Inicio de sesión correcto, se comprueba si es una cuenta activa
        if ($usuarioIniciado->getActivo() == 0) {
            $mensaje = 'Tu cuenta aún no ha sido activada, tienes que esperar.';
        } else {
            $_SESSION['usuarioIniciado'] = $usuarioIniciado;
            $mensaje = 'Has iniciado sesión como ' . $usuarioIniciado->getNombre();
        }
    } else {
        $mensaje = 'ERROR: Correo y/o contraseña incorrectos.';
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