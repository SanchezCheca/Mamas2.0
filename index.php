<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        if (isset($_REQUEST['enviar'])) {
            $texto = $_REQUEST['nombre'];
            $textoEncriptado = crypt($texto);
            
            echo 'Texto: ' . $texto . '<br>';
            echo 'Texto encriptado: ' . $textoEncriptado . '<br>';
            
            if (hash_equals($textoEncriptado, crypt($texto, $textoEncriptado))) {
                echo 'La contraseña es correcta!';
            } else {
                echo 'esto falla';
            }
        }
        ?>
    </body>
</html>
