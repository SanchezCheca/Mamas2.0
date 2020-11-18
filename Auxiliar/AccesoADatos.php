<?php

/**
 * Gestiona la Base de Datos.
 * Utiliza la clase mysqli
 *
 * @author daniel
 */

require_once 'Variables.php';

class AccesoADatos {

    private static $conexion;

    /**
     * Crea una nueva conexión a BD
     */
    public static function new() {
        // Utilizando la forma procedimental.
        self::$conexion = new mysqli(Variables::$HOST, Variables::$USUARIO, Variables::$PASS, Variables::$BD);

        if (self::$conexion->connect_errno) {
            print "Fallo al conectar a MySQL: " . mysqli_connect_error();
        }
    }

    /**
     * Cierra la conexión a BD
     */
    public static function closeDB() {
        self::$conexion->close();
    }

    /**
     * Devuelve un objeto Usuario si existe y la combinación correo-pass es correcta
     * Si no, devuelve null
     * @param type $correo
     * @param type $pass
     * @return \Usuario
     */
    public static function getUsuario($correo, $pass) {
        $usuario = null;

        self::new();
        $consulta = "SELECT * FROM usuarios WHERE correo=?";
        $stmt = self::$conexion->prepare($consulta);
        $stmt->bind_param("s", $val1);
        $val1 = $correo;
        $stmt->execute();
        $result = $stmt->get_result();

        if ($fila = $result->fetch_assoc()) {
            $id = $fila['id'];
            $rol = $fila['rol'];
            $correo = $fila['correo'];
            $nombre = $fila['nombre'];
            $activo = $fila['activo'];
            
            $passEncriptada = $fila['pass'];

            //COMPRUEBA QUE LA CONTRASEÑA SEA CORRECTA
            if (hash_equals($passEncriptada, crypt($pass, $passEncriptada))) {
                //Contraseña correcta, se crea el objeto
                $usuario = new Usuario($id, $rol, $correo, $nombre, $activo);
            }

        }
        $result->free();
        self::closeDB();

        return $usuario;
    }

    /**
     * Devuelve un usuario a partir de su id
     * @param type $id
     * @return \Usuario
     */
    public static function getUsuarioPorId($id) {
        $usuario = null;

        self::new();
        $consulta = "SELECT * FROM usuarios WHERE id=?";
        $stmt = self::$conexion->prepare($consulta);
        $stmt->bind_param("s", $val1);
        $val1 = $id;
        $stmt->execute();
        $result = $stmt->get_result();

        if ($fila = $result->fetch_assoc()) {
            $id = $fila['id'];
            $rol = $fila['rol'];
            $correo = $fila['correo'];
            $nombre = $fila['nombre'];
            $activo = $fila['activo'];

            $usuario = new Usuario($id, $rol, $correo, $nombre, $activo);
        }
        $result->free();
        self::closeDB();

        return $usuario;
    }

    /**
     * Devuelve true si existe el usuario cuyo correo recibe por parámetro
     * @param type $correo
     * @return boolean
     */
    public static function isUsuario($correo) {
        $existe = false;

        self::new();
        $consulta = "SELECT * FROM usuarios WHERE correo='" . $correo . "';";

        $resultado = self::$conexion->query($consulta);
        if ($fila = $resultado->fetch_assoc()) {
            $existe = true;
        }
        self::closeDB();

        return $existe;
    }

    /**
     * Inserta un usuario en la BD encriptando la contraseña. Devuelve el éxito de la operación
     * @param type $correo
     * @param type $nombre
     * @param type $pass
     */
    public static function insertarUsuario($correo, $nombre, $pass) {
        $resultado = true;
        
        //ENCRIPTA LA CONTRASEÑA
        $passEncriptada = crypt($pass);
        
        self::new();
        $query = 'INSERT INTO usuarios VALUES(id, 0, "' . $correo . '", "' . $passEncriptada . '", "' . $nombre . '", 0)';
        if (!self::$conexion->query($query)) {
            $resultado = 'Error al insertar: ' . mysqli_error(self::$conexion);
        }
        self::closeDB();
        
        return $resultado;
    }

//    public static function insertUser($correo, $nombre, $pass) {
//        $resultado = true;
//
//        self::new();
//        $query = 'INSERT INTO usuarios VALUES(id, 0, "' . $nombre . '", "' . $correo . '", "' . $pass . '")';
//
//        if (!self::$conexion->query($query)) {
//            $resultado = "Error al insertar: " . mysqli_error(self::$conexion) . '<br/>';
//        }
//        self::closeDB();
//
//        return $resultado;
//    }
}
