<?php
/**
 * Aula. Se guarda id, nombre, profesor, alumnos y exámenes
 *
 * @author daniel
 */
class Aula {
    
    //--------------------------PROPIEDADES
    private $id;
    private $nombre;
    private $idProfesor;
    private $alumnos;
    private $examenes;
    
    //--------------------------CONSTRUCTOR
    function __construct($id, $nombre, $idProfesor) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->idProfesor = $idProfesor;
    }
    
    //--------------------------GETTER
    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getIdProfesor() {
        return $this->idProfesor;
    }
    
    function getAlumnos() {
        return $this->alumnos;
    }
    
    function setAlumnos($alumnos) {
        $this->alumnos = $alumnos;
    }

    //--------------------------TO STRING
    public function __toString() {
        return '[AULA] ID: ' . $this->id . ' Nombre: ' . $this->nombre . ' IdProfesor: ' . $this->idProfesor;
    }
    
}
