<?php
session_start();
require_once '../Auxiliar/AccesoADatos.php';
require_once '../Modelo/Usuario.php';

if(isset($_REQUEST['cargar'])){
    $usuarios= AccesoADatos::getUsuarios();
    $_SESSION['usuarios']=$usuarios;
    header('Location: ../Vistas/administracionUsuario.php');
    
}
