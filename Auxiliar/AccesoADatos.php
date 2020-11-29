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
                //Contraseña correcta, carga las aulas del alumno/profesor
                $aulas = null;
                if ($rol == 0) {
                    //El usuario es un alumno
                    $consultaAulas = 'SELECT * FROM aulas WHERE id IN (SELECT idAula FROM aula_alumno WHERE idAlumno = ' . $id . ')';

                    if ($resultadoAulas = self::$conexion->query($consultaAulas)) {
                        while ($filaAula = $resultadoAulas->fetch_assoc()) {
                            $idAula = $filaAula['id'];
                            $idProfesor = $filaAula['idProfesor'];
                            $nombreAula = $filaAula['nombre'];

                            //Recupera el NOMBRE del profesor a cargo
                            $consultaExtra = 'SELECT nombre FROM usuarios WHERE id=' . $idProfesor;
                            $resultadoExtra = self::$conexion->query($consultaExtra);
                            $nombreProfesor = null;
                            if ($filaExtra = $resultadoExtra->fetch_assoc()) {
                                $nombreProfesor = $filaExtra['nombre'];
                            }

                            $aula = new Aula($idAula, $nombreAula, $idProfesor, $nombreProfesor);
                            $aulas[] = $aula;
                        }
                    }
                } else {
                    //El usuario es un profesor
                    $consultaAulas = 'SELECT * FROM aulas WHERE idProfesor = ' . $id;
                    $resultadoAulas = self::$conexion->query($consultaAulas);

                    while ($filaAula = $resultadoAulas->fetch_assoc()) {
                        $idAula = $filaAula['id'];
                        $nombreAula = $filaAula['nombre'];

                        $aula = new Aula($idAula, $nombreAula, $id, $nombre);
                        $aulas[] = $aula;
                    }
                }

                $usuario = new Usuario($id, $rol, $correo, $nombre, $activo, $aulas);
            }
        }
        $result->free();

        self::closeDB();

        return $usuario;
    }

    /**
     * Devuelve las aulas a las que pertenece (alumno) o que administra (profesor)
     * según el rol e id del usuario
     * @param type $idAlumno
     */
    public static function getAulas($rol, $id) {
        //Contraseña correcta, carga las aulas del alumno/profesor
        $aulas = null;
        self::new();
        if ($rol == 0) {
            //El usuario es un alumno
            $consultaAulas = 'SELECT * FROM aulas WHERE id = (SELECT idAula FROM aula_alumno WHERE idAlumno = ' . $id . ')';
            $resultadoAulas = self::$conexion->query($consultaAulas);

            while ($filaAula = $resultadoAulas->fetch_assoc()) {
                $idAula = $filaAula['id'];
                $idProfesor = $filaAula['idProfesor'];
                $nombreAula = $filaAula['nombre'];

                self::closeDB();
                self::new();

                //Recupera el NOMBRE del profesor a cargo
                $consultaExtra = 'SELECT nombre FROM usuarios WHERE id=' . $idProfesor;
                $resultadoExtra = self::$conexion->query($consultaExtra);
                $nombreProfesor = null;
                if ($filaExtra = $resultadoExtra->fetch_assoc()) {
                    $nombreProfesor = $filaExtra['nombre'];
                }

                $aula = new Aula($idAula, $nombreAula, $idProfesor, $nombreProfesor);
                $aulas[] = $aula;
            }
        } else {
            //El usuario es un profesor
            $consultaAulas = 'SELECT * FROM aulas WHERE idProfesor=' . $id;
            $resultadoAulas = self::$conexion->query($consultaAulas);

            while ($filaAula = $resultadoAulas->fetch_assoc()) {
                $idAula = $filaAula['id'];
                $nombreAula = $filaAula['nombre'];

                self::closeDB();
                self::new();

                //Recupera el NOMBRE del profesor a cargo
                $consultaExtra = 'SELECT nombre FROM usuarios WHERE id=' . $id;
                $resultadoExtra = self::$conexion->query($consultaExtra);
                $nombreProfesor = null;
                if ($filaExtra = $resultadoExtra->fetch_assoc()) {
                    $nombreProfesor = $filaExtra['nombre'];
                }

                $aula = new Aula($idAula, $nombreAula, $id, $nombreProfesor);
                $aulas[] = $aula;
            }
        }
        self::closeDB();
        return $aulas;
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

            //RECUPERA LAS AULAS
            $aulas = null;
            if ($rol == 0) {
                //El usuario es un alumno
                $consultaAulas = 'SELECT * FROM aulas WHERE id = (SELECT idAula FROM aula_alumno WHERE idAlumno = ' . $id . ')';
                $resultadoAulas = self::$conexion->query($consultaAulas);

                while ($filaAula = $resultadoAulas->fetch_assoc()) {
                    $idAula = $filaAula['id'];
                    $idProfesor = $filaAula['idProfesor'];
                    $nombreAula = $filaAula['nombre'];

                    //Recupera el NOMBRE del profesor a cargo
                    $consultaExtra = 'SELECT nombre FROM usuarios WHERE id=' . $idProfesor;
                    $resultadoExtra = self::$conexion->query($consultaExtra);
                    $nombreProfesor = null;
                    if ($filaExtra = $resultadoExtra->fetch_assoc()) {
                        $nombreProfesor = $filaExtra['nombre'];
                    }

                    $aula = new Aula($idAula, $nombreAula, $idProfesor, $nombreProfesor);
                    $aulas[] = $aula;
                }
            } else {
                //El usuario es un profesor
                $consultaAulas = 'SELECT * FROM aulas WHERE idProfesor = ' . $id;
                $resultadoAulas = self::$conexion->query($consultaAulas);

                while ($filaAula = $resultadoAulas->fetch_assoc()) {
                    $idAula = $filaAula['id'];
                    $nombreAula = $filaAula['nombre'];

                    $aula = new Aula($idAula, $nombreAula, $id, $nombre);
                    $aulas[] = $aula;
                }
            }

            $usuario = new Usuario($id, $rol, $correo, $nombre, $activo, $aulas);
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


        //ENCRIPTA LA CONTRASEÑA
        $passEncriptada = crypt($pass);

        self::new();
        $query = 'INSERT INTO usuarios VALUES(default, 0, "' . $correo . '", "' . $passEncriptada . '", "' . $nombre . '", 0)';
        if (!self::$conexion->query($query)) {
            $resultado = 'Error al insertar: ' . mysqli_error(self::$conexion);
            $resultado = false;
        } else {
            $resultado = true;
        }
        self::closeDB();

        return $resultado;
    }

    /**
     * Devuelve, en formato json, todos los alumnos activos (id, correo, nombre)
     */
    public static function getListaAlumnos() {
        $alumnos = null;

        self::new();
        $query = 'SELECT * FROM usuarios WHERE rol=0 AND activo=1';
        $resultado = self::$conexion->query($query);

        while ($fila = $resultado->fetch_assoc()) {
            $id = $fila['id'];
            $correo = $fila['correo'];
            $nombre = $fila['nombre'];

            $alumnos[] = array('id' => $id, 'correo' => $correo, 'nombre' => $nombre);
        }

        $alumnos = json_encode($alumnos);
        return $alumnos;
    }

    /**
     * Crea un nuevo aula con el id de profesor y el nombre que recibe como parametro
     * Devuelve el id del aula creada
     */
    public static function addAula($id, $nombre) {
        $resultado = null;

        self::new();
        $query = 'INSERT INTO aulas VALUES(id, ' . $id . ', "' . $nombre . '")';
        self::$conexion->query($query);

        $query = 'SELECT id FROM aulas ORDER BY id DESC LIMIT 1';
        $resultado = self::$conexion->query($query);

        if ($fila = $resultado->fetch_assoc()) {
            $resultado = $fila['id'];
        }

        self::closeDB();

        return $resultado;
    }

    /**
     * Actualiza el nombre de un aula dada
     * @param type $idAula
     * @param type $nombre
     * @return type
     */
    public static function editarAula($idAula, $nombre) {
        $resultado = null;

        self::new();
        $query = 'UPDATE aulas SET nombre="' . $nombre . '" WHERE id=' . $idAula;
        $resultado = self::$conexion->query($query);
        self::closeDB();

        return $resultado;
    }

    /**
     * Asigna el alumno con id $idAlumno al aula con id $idAula
     */
    public static function asignarAlumnoAula($idAula, $idAlumno) {
        $resultado = true;

        self::new();
        $query = 'INSERT INTO aula_alumno VALUES(' . $idAula . ', ' . $idAlumno . ')';
        if (!self::$conexion->query($query)) {
            $resultado = 'Error al insertar: ' . mysqli_error(self::$conexion);
        }
        self::closeDB();

        return $resultado;
    }

    /**
     * Retira a un alumno con id $idAlumno del aula con id $idAula
     */
    public static function retirarAlumnoAula($idAula, $idAlumno) {
        $resultado = true;

        self::new();
        $query = 'DELETE FROM aula_alumno WHERE idAula=' . $idAula . ' AND idAlumno=' . $idAlumno;
        if (!self::$conexion->query($query)) {
            $resultado = 'Error al eliminar: ' . mysqli_error(self::$conexion);
        }
        self::closeDB();

        return $resultado;
    }

    /**
     * Devuelve un vector con todos los alumnos que pertenecen al aula definida por su id
     * @param type $idAula
     */
    public static function getAlumnosDeAula($idAula) {
        $alumnos = [];

        self::new();
        $query = 'SELECT id, nombre, correo FROM usuarios WHERE id IN (SELECT idAlumno FROM aula_alumno WHERE idAula=' . $idAula . ') ORDER BY nombre';
        if ($resultado = self::$conexion->query($query)) {
            while ($fila = $resultado->fetch_assoc()) {
                $id = $fila['id'];
                $nombre = $fila['nombre'];
                $correo = $fila['correo'];

                $alumnos[] = new Usuario($id, null, $correo, $nombre, null, null); //Devuelve solo los valores importantes para mostrar una lista
            }
        }
        $resultado->free();
        self::closeDB();
        return $alumnos;
    }

    /**
     * Recupera un aula por su id
     * @param type $id
     */
    public static function getAula($id) {
        $aula = null;
        $query = 'SELECT * FROM aulas WHERE id=' . $id;

        self::new();
        $resultado = self::$conexion->query($query);
        if ($fila = $resultado->fetch_assoc()) {
            $id = $fila['id'];
            $idProfesor = $fila['idProfesor'];
            $nombre = $fila['nombre'];

            //Recupera el NOMBRE del profesor a cargo
            $consultaExtra = 'SELECT nombre FROM usuarios WHERE id=' . $idProfesor;
            $resultadoExtra = self::$conexion->query($consultaExtra);
            $nombreProfesor = null;
            if ($filaExtra = $resultadoExtra->fetch_assoc()) {
                $nombreProfesor = $filaExtra['nombre'];
            }

            $aula = new Aula($id, $nombre, $idProfesor, $nombreProfesor);
        }
        $resultado->free();
        self::closeDB();
        return $aula;
    }

    /**
     * Devuelve todos los usuarios con rol 0 (alumno), activos y que NO se encuentren en el aula con id $idAula
     * @param type $idAula
     */
    public static function getAlumnosExceptoAula($idAula) {
        self::new();
        $usuarios = [];

        $query = 'SELECT * FROM usuarios WHERE '
                . 'rol=0 AND '
                . 'activo=1 AND '
                . 'id NOT IN (SELECT idAlumno FROM aula_alumno WHERE idAula=' . $idAula . ')';
        if ($resultado = self::$conexion->query($query)) {
            while ($fila = $resultado->fetch_assoc()) {
                $id = $fila['id'];
                $correo = $fila['correo'];
                $nombre = $fila['nombre'];

                $usuario = new Usuario($id, 0, $correo, $nombre, 1, null);
                $usuarios[] = $usuario;
            }
            $resultado->free();
        }

        self::closeDB();
        return $usuarios;
    }

    /**
     * Elimina el aula con id dado
     * @param type $idAula
     */
    public static function eliminarAula($idAula) {
        self::new();

        $query = 'DELETE FROM aulas WHERE id=' . $idAula;
        self::$conexion->query($query);

        self::closeDB();
    }

    /**
     * Edita el nombre y correo del perfil en cuestion
     * @param type $id
     * @param type $nombre
     * @param type $correo
     */
    public static function editarPerfil($id, $nombre, $correo) {
        self::new();

        $query = 'UPDATE usuarios SET nombre="' . $nombre . '", correo="' . $correo . '" WHERE id=' . $id;
        self::$conexion->query($query);

        self::closeDB();
    }

    public static function getUsuarios() {
        self::new();
        $usuarios = [];
        $query = "Select id, rol, correo, nombre, activo from usuarios";
        if ($resultado = self::$conexion->query($query)) {
            while ($fila = $resultado->fetch_assoc()) {
                $id = $fila['id'];
                $rol = $fila['rol'];
                $correo = $fila['correo'];
                $nombre = $fila['nombre'];
                $activo = $fila['activo'];
                $usuario = new Usuario($id, $rol, $correo, $nombre, $activo, null);
                $usuarios[] = $usuario;
            }
        }
        self::closeDB();
        return $usuarios;
    }

    public static function eliminarUsuario($id) {
        $resultado = false;



        self::new();
        $query = "Delete from usuarios where id = " . $id;
        if (self::$conexion->query($query)) {
            $resultado = true;
        }
        self::closeDB();

        return $resultado;
    }

    public static function editarUsuario($id, $nombre, $email, $rol, $activado) {
        $resultado = false;



        self::new();
        $query = "Update  usuarios set rol = " . $rol . ", correo= '" . $email . "', nombre= '" . $nombre . "', activo=" . $activado .
                " where id=" . $id;
        if (self::$conexion->query($query)) {
            $resultado = true;
        }
        self::closeDB();

        return $resultado;
    }

    public static function cambiarPassword($email) {
        $resultado = false;
        $passEncriptada = crypt('1234');


        self::new();
        $query = "Update  usuarios set pass = '" . $passEncriptada . "' where correo= '" . $email . "'";
        if (self::$conexion->query($query)) {
            $resultado = true;
        }
        self::closeDB();

        return $resultado;
    }

}
