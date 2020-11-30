<?php

require_once '../Auxiliar/AccesoADatos.php';
require_once '../Modelo/Usuario.php';

session_start();

if (isset($_REQUEST['cargar'])) {
    $usuarios = AccesoADatos::getUsuarios();
    $_SESSION['usuarios'] = $usuarios;
    header('Location: ../Vistas/administracionUsuario.php');
    //die();
}



if (isset($_REQUEST['eliminar'])) {
    $id = $_REQUEST['id'];


    if (AccesoADatos::eliminarUsuario($id)) {
         $usuarios = AccesoADatos::getUsuarios();
    $_SESSION['usuarios'] = $usuarios;
        header('Location: ../Vistas/administracionUsuario.php');
    }
    die();
}

if (isset($_REQUEST['editar'])) {
    $id = $_REQUEST['id'];
    $nombre = $_REQUEST['nombre'];
    $email = $_REQUEST['email'];
    $rol = $_REQUEST['rol'];
    $activado = $_REQUEST['activado'];

    if (AccesoADatos::editarUsuario($id, $nombre, $email, $rol, $activado)) {
         $usuarios = AccesoADatos::getUsuarios();
    $_SESSION['usuarios'] = $usuarios;
        header('Location: ../Vistas/administracionUsuario.php');
    }
    die();
}
if (isset($_REQUEST['cerrarSesion'])) {
    header('Location: ../index.php');
}

if (isset($_REQUEST['anadir'])) {
    header('Location: ../Vistas/registroAdmin.php');
}

if (isset($_REQUEST['creaPreguntas'])) {
     header('Location: ../Vistas/creaPreguntas.php');
}



if (isset($_REQUEST['anadirExamen'])) {
         header('Location: ../Vistas/crearExamen.php');

}

if (isset($_REQUEST['volverEx'])) {
         header('Location: ../Vistas/examen.php');

}
if (isset($_REQUEST['volver'])) {
         header('Location: ../index.php');

}