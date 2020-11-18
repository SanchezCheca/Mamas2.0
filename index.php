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
        session_start();
        if (isset($_SESSION['mensaje'])) {
            echo $_SESSION['mensaje'];
            unset($_SESSION['mensaje']);
        }
        ?>
        <form name="prueba" action="index.php" method="POST">
            <input type="text" name="nombre">
            <input type="submit" name="enviar" value="Enviar">
        </form>
    </body>
</html>
