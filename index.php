<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <a href="Vistas/registro.php">Formulario de registro</a>
        <br>
        <a href="Vistas/inicioSesion.php">Inicio de sesión</a>
        
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
        <form name="prueba" action="index.php" method="POST">
            <input type="text" name="nombre">
            <input type="submit" name="enviar" value="Enviar">
        </form>
    </body>
</html>
