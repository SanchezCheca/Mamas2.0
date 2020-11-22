<?php
session_start();
require_once '../Auxiliar/AccesoADatos.php';




//---------------------VIENE DE FORMULARIO DE REGISTRO
if (isset($_REQUEST['registro'])) {
    $nombre = $_REQUEST['nombre'];
    $correo = $_REQUEST['correo'];
    $pass = $_REQUEST['pass'];
    
    if (AccesoADatos::insertarUsuario($correo, $nombre, $pass)) {
        $mensaje = 'Correcto';
        $_SESSION['mensaje'] = $mensaje;
    }
    header('Location: ../index.php');
}

//---------------------VIENE DE INICIO DE SESIÓN
if (isset($_REQUEST['inicioSesion'])) {
    $correo = $_REQUEST['correo'];
    $pass = $_REQUEST['pass'];
    
    $usuarioIniciado = AccesoADatos::getUsuario($correo, $pass);
    if ($usuarioIniciado != null) {
        $_SESSION['usuarioIniciado'] = $usuarioIniciado;
        $mensaje = 'Has iniciado sesión como ' . $usuarioIniciado->getNombre();
    } else {
        $mensaje = 'ERROR: Correo y/o contraseña incorrectos.';
    }
    
    $_SESSION['mensaje'] = $mensaje;
    header('Location: ../index.php');    
}