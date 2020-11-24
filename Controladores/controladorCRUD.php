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

