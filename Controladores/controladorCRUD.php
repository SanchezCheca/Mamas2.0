<?php
session_start();

if(isset($_REQUEST['cargar'])){
    $usuarios= AccesoADatos::getUsuarios();
    
}
